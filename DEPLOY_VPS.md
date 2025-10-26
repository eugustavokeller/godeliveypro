# 🚀 Guia de Deploy - CatchMe na VPS

Este guia apresenta o passo a passo para fazer deploy do CatchMe em uma VPS usando Docker.

## 📋 Pré-requisitos

- VPS com Ubuntu 20.04 ou superior
- Acesso root ou sudo
- Domínio configurado apontando para o IP da VPS
- Docker e Docker Compose instalados

## 🔧 1. Preparar o Servidor

### 1.1. Atualizar o Sistema

```bash
sudo apt update && sudo apt upgrade -y
```

### 1.2. Instalar Docker

```bash
# Instalar pré-requisitos
sudo apt install -y apt-transport-https ca-certificates curl gnupg lsb-release

# Adicionar chave GPG do Docker
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg

# Adicionar repositório do Docker
echo "deb [arch=amd64 signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null

# Instalar Docker
sudo apt update
sudo apt install -y docker-ce docker-ce-cli containerd.io docker-compose-plugin

# Verificar instalação
docker --version
docker compose version
```

### 1.3. Adicionar usuário ao grupo Docker (opcional)

```bash
sudo usermod -aG docker $USER
# Faça logout e login novamente para aplicar
```

## 📦 2. Clonar e Configurar o Projeto

### 2.1. Clonar o Repositório

```bash
cd /var/www
sudo git clone https://github.com/seu-usuario/catchme.git
cd catchme
```

### 2.2. Configurar Variáveis de Ambiente

```bash
# Criar arquivo .env a partir do exemplo
cp .env.production.example .env

# Editar o arquivo .env
nano .env
```

Configure as seguintes variáveis:

```env
APP_NAME="CatchMe"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://seu-dominio.com

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=catchme
DB_USERNAME=catchme_user
DB_PASSWORD=senha_forte_aqui

# IMPORTANTE: Gere uma chave de aplicação
# Execute: php artisan key:generate (após subir os containers)

DB_PASSWORD=senha_forte_aqui
DB_ROOT_PASSWORD=senha_root_aqui

# Permitir proxies confiáveis
TRUSTED_PROXIES=*
```

### 2.3. Criar Diretórios Necessários

```bash
# Criar diretórios para SSL e logs
mkdir -p nginx/ssl nginx/logs

# Criar diretórios de storage
mkdir -p storage/logs storage/framework/sessions storage/framework/views storage/framework/cache
mkdir -p storage/app/photos
```

## 🔐 3. Configurar SSL com Let's Encrypt

### 3.1. Instalar Certbot

```bash
sudo apt install -y certbot python3-certbot-nginx
```

### 3.2. Gerar Certificado SSL

**IMPORTANTE**: Configure o DNS do seu domínio para apontar para o IP da VPS antes de prosseguir!

```bash
# Gerar certificado (substitua pelo seu domínio)
sudo certbot certonly --standalone -d seu-dominio.com -d www.seu-dominio.com
```

Os certificados serão salvos em:

- `/etc/letsencrypt/live/seu-dominio.com/fullchain.pem`
- `/etc/letsencrypt/live/seu-dominio.com/privkey.pem`

### 3.3. Copiar Certificados para o Projeto

```bash
# Copiar certificados para nginx/ssl
sudo cp /etc/letsencrypt/live/seu-dominio.com/fullchain.pem nginx/ssl/cert.pem
sudo cp /etc/letsencrypt/live/seu-dominio.com/privkey.pem nginx/ssl/key.pem
sudo chmod 644 nginx/ssl/cert.pem nginx/ssl/key.pem
```

### 3.4. Configurar Renovação Automática

```bash
# Adicionar tarefa cron para renovar automaticamente
sudo crontab -e
```

Adicione a linha:

```
0 2 1 * * certbot renew --quiet --deploy-hook "cd /var/www/catchme && cp /etc/letsencrypt/live/seu-dominio.com/fullchain.pem nginx/ssl/cert.pem && cp /etc/letsencrypt/live/seu-dominio.com/privkey.pem nginx/ssl/key.pem && docker-compose -f docker-compose.prod.yml restart nginx"
```

## ⚙️ 4. Configurar Nginx

### 4.1. Atualizar Configuração do Nginx

Edite o arquivo `nginx/site.conf`:

```bash
nano nginx/site.conf
```

Substitua `example.com` pelo seu domínio:

```nginx
server_name seu-dominio.com www.seu-dominio.com;
```

## 🚀 5. Deploy da Aplicação

### 5.1. Dar Permissões ao Script de Deploy

```bash
chmod +x deploy.sh
```

### 5.2. Executar Deploy

```bash
./deploy.sh
```

O script irá:

- Construir as imagens Docker
- Subir os containers
- Executar migrations
- Criar link de storage
- Otimizar a aplicação
- Limpar caches

### 5.3. Gerar Chave da Aplicação

```bash
docker-compose -f docker-compose.prod.yml exec app php artisan key:generate
```

### 5.4. Verificar Status

```bash
# Verificar status dos containers
docker-compose -f docker-compose.prod.yml ps

# Ver logs
docker-compose -f docker-compose.prod.yml logs -f
```

## 🔧 6. Comandos Úteis

### Gerenciar Containers

```bash
# Parar containers
docker-compose -f docker-compose.prod.yml down

# Iniciar containers
docker-compose -f docker-compose.prod.yml up -d

# Reiniciar containers
docker-compose -f docker-compose.prod.yml restart

# Ver logs
docker-compose -f docker-compose.prod.yml logs -f app
```

### Comandos Laravel

```bash
# Executar migrations
docker-compose -f docker-compose.prod.yml exec app php artisan migrate

# Limpar cache
docker-compose -f docker-compose.prod.yml exec app php artisan cache:clear

# Recriar caches
docker-compose -f docker-compose.prod.yml exec app php artisan config:cache
docker-compose -f docker-compose.prod.yml exec app php artisan route:cache
docker-compose -f docker-compose.prod.yml exec app php artisan view:cache

# Acessar shell do container
docker-compose -f docker-compose.prod.yml exec app bash

# Ver logs da aplicação
docker-compose -f docker-compose.prod.yml exec app tail -f storage/logs/laravel.log
```

### Backup do Banco de Dados

```bash
# Backup
docker-compose -f docker-compose.prod.yml exec -T db mysqldump -u catchme_user -p'seu_password' catchme > backup_$(date +%Y%m%d_%H%M%S).sql

# Restore
cat backup.sql | docker-compose -f docker-compose.prod.yml exec -T db mysql -u catchme_user -p'seu_password' catchme
```

## 🔐 7. Segurança Adicional

### 7.1. Configurar Firewall

```bash
# Instalar UFW
sudo apt install -y ufw

# Permitir SSH
sudo ufw allow 22/tcp

# Permitir HTTP e HTTPS
sudo ufw allow 80/tcp
sudo ufw allow 443/tcp

# Ativar firewall
sudo ufw enable

# Verificar status
sudo ufw status
```

### 7.2. Desabilitar Acesso SSH por Senha (Recomendado)

```bash
# Gerar chave SSH no seu computador local (não na VPS)
ssh-keygen -t rsa -b 4096

# Copiar chave pública para a VPS
ssh-copy-id usuario@ip-da-vps

# Editar configuração SSH
sudo nano /etc/ssh/sshd_config
```

Altere:

```
PasswordAuthentication no
PubkeyAuthentication yes
```

```bash
# Reiniciar SSH
sudo systemctl restart sshd
```

## 📊 8. Monitoramento

### Ver Uso de Recursos

```bash
# Uso de recursos dos containers
docker stats

# Espaço em disco
df -h

# Logs do sistema
journalctl -xe
```

### Logs da Aplicação

```bash
# Logs do Laravel
tail -f storage/logs/laravel.log

# Logs do Nginx
tail -f nginx/logs/catchme_access.log

# Logs dos containers
docker-compose -f docker-compose.prod.yml logs -f
```

## 🔄 9. Atualizações

Para atualizar a aplicação:

```bash
cd /var/www/catchme

# Puxar últimas mudanças
git pull origin main

# Reconstruir containers
docker-compose -f docker-compose.prod.yml build --no-cache

# Reiniciar containers
docker-compose -f docker-compose.prod.yml up -d

# Executar migrations
docker-compose -f docker-compose.prod.yml exec app php artisan migrate --force

# Otimizar
docker-compose -f docker-compose.prod.yml exec app php artisan config:cache
docker-compose -f docker-compose.prod.yml exec app php artisan route:cache
docker-compose -f docker-compose.prod.yml exec app php artisan view:cache
```

## 🆘 10. Troubleshooting

### Container não inicia

```bash
# Verificar logs
docker-compose -f docker-compose.prod.yml logs

# Verificar status
docker-compose -f docker-compose.prod.yml ps
```

### Erro de permissões

```bash
# Dar permissões corretas
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

### Banco de dados não conecta

```bash
# Verificar se o MySQL está rodando
docker-compose -f docker-compose.prod.yml logs db

# Testar conexão
docker-compose -f docker-compose.prod.yml exec app php artisan tinker
# No tinker: DB::connection()->getPdo();
```

## 📝 Notas Importantes

1. **APP_KEY**: Sempre gere uma chave nova para produção
2. **DB_PASSWORD**: Use senhas fortes e únicas
3. **SSL**: Renove certificados automaticamente
4. **Backup**: Configure backups regulares do banco de dados
5. **Monitoramento**: Monitore logs regularmente
6. **Segurança**: Mantenha o sistema e dependências atualizadas

## 🎉 Sucesso!

Seu CatchMe está rodando em produção! 🚀

Para acessar, abra seu navegador em: `https://seu-dominio.com`
