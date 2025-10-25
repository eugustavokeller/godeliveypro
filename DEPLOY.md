# 🚀 Guia de Deploy em Produção

Este guia fornece instruções detalhadas para fazer deploy do CatchMe Location Tracker em um servidor de produção.

## 📋 Pré-requisitos

- Servidor Ubuntu 22.04 ou superior
- Acesso root ou sudo
- Domínio configurado apontando para o IP do servidor
- Portas 80, 443 e 22 abertas no firewall

## 🔧 Passo 1: Preparar Servidor

### 1.1 Atualizar Sistema

```bash
sudo apt update && sudo apt upgrade -y
```

### 1.2 Instalar Dependências

```bash
sudo apt install -y \
    software-properties-common \
    curl \
    git \
    unzip \
    mysql-server \
    nginx \
    php8.2-fpm \
    php8.2-cli \
    php8.2-mysql \
    php8.2-mbstring \
    php8.2-xml \
    php8.2-curl \
    php8.2-zip \
    php8.2-gd \
    php8.2-intl
```

### 1.3 Configurar MySQL

```bash
sudo mysql_secure_installation

# Criar banco de dados e usuário
sudo mysql -u root -p

CREATE DATABASE catchme CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'catchme_user'@'localhost' IDENTIFIED BY 'senha_forte_aqui';
GRANT ALL PRIVILEGES ON catchme.* TO 'catchme_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

## 📦 Passo 2: Instalar Aplicação

### 2.1 Clonar Repositório

```bash
cd /var/www
sudo git clone <url-do-repositorio> catchme
cd catchme
```

### 2.2 Instalar Composer

```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer
```

### 2.3 Instalar Dependências

```bash
# Dependências PHP
composer install --no-dev --optimize-autoloader

# Dependências Node.js
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt install -y nodejs
npm install
npm run build
```

## ⚙️ Passo 3: Configurar Aplicação

### 3.1 Arquivo .env

```bash
sudo cp .env.example .env
sudo nano .env
```

Configure:

```env
APP_NAME="CatchMe Location Tracker"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://seu-dominio.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=catchme
DB_USERNAME=catchme_user
DB_PASSWORD=senha_forte_aqui

FILESYSTEM_DRIVER=public

# Gerar chave
php artisan key:generate
```

### 3.2 Executar Migrations

```bash
php artisan migrate --force
php artisan storage:link
```

### 3.3 Otimizar Aplicação

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 🌐 Passo 4: Configurar Nginx

### 4.1 Copiar Configuração

```bash
sudo cp nginx/site.conf /etc/nginx/sites-available/catchme
sudo ln -s /etc/nginx/sites-available/catchme /etc/nginx/sites-enabled/
```

### 4.2 Editar Configuração

```bash
sudo nano /etc/nginx/sites-available/catchme
```

Altere `server_name` para seu domínio.

### 4.3 Testar Configuração

```bash
sudo nginx -t
```

## 🔒 Passo 5: Instalar SSL

### 5.1 Instalar Certbot

```bash
sudo apt install certbot python3-certbot-nginx
```

### 5.2 Gerar Certificado

```bash
sudo certbot --nginx -d seu-dominio.com -d www.seu-dominio.com
```

Certbot vai:

- Gerar certificado SSL
- Configurar renovação automática
- Atualizar configuração do Nginx

### 5.3 Verificar Renovação

```bash
sudo certbot renew --dry-run
```

## 🔐 Passo 6: Configurar Permissões

```bash
sudo chown -R www-data:www-data /var/www/catchme
sudo chmod -R 755 /var/www/catchme
sudo chmod -R 775 /var/www/catchme/storage
sudo chmod -R 775 /var/www/catchme/bootstrap/cache
```

## 🔥 Passo 7: Configurar Firewall

```bash
sudo ufw allow 'Nginx Full'
sudo ufw allow ssh
sudo ufw enable
sudo ufw status
```

## 🚀 Passo 8: Reiniciar Serviços

```bash
sudo systemctl restart nginx
sudo systemctl restart php8.2-fpm
sudo systemctl enable nginx
sudo systemctl enable php8.2-fpm
```

## 📊 Passo 9: Verificar Funcionamento

```bash
# Verificar status dos serviços
sudo systemctl status nginx
sudo systemctl status php8.2-fpm

# Testar endpoints
curl https://seu-dominio.com/api/whoami
```

## 🔄 Passo 10: Configurar Backup Automático

### 10.1 Script de Backup

Crie `/usr/local/bin/backup-catchme.sh`:

```bash
#!/bin/bash
BACKUP_DIR="/backups/catchme"
DATE=$(date +%Y%m%d_%H%M%S)

mkdir -p $BACKUP_DIR

# Backup do banco de dados
mysqldump -u catchme_user -p'senha' catchme > $BACKUP_DIR/db_$DATE.sql

# Backup de arquivos
tar -czf $BACKUP_DIR/files_$DATE.tar.gz /var/www/catchme/storage

# Backup de logs
cp /var/www/catchme/storage/logs/proofs.log $BACKUP_DIR/proofs_$DATE.log

# Manter apenas backups dos últimos 30 dias
find $BACKUP_DIR -name "*.sql" -mtime +30 -delete
find $BACKUP_DIR -name "*.tar.gz" -mtime +30 -delete
find $BACKUP_DIR -name "*.log" -mtime +30 -delete
```

```bash
sudo chmod +x /usr/local/bin/backup-catchme.sh
```

### 10.2 Configurar Cron

```bash
sudo crontab -e
```

Adicione linha para executar backup diariamente às 2h:

```
0 2 * * * /usr/local/bin/backup-catchme.sh
```

## ✅ Verificação Final

1. ✅ Aplicação acessível via HTTPS
2. ✅ Certificado SSL válido
3. ✅ Banco de dados conectado
4. ✅ Storage link criado
5. ✅ Permissões corretas
6. ✅ Logs funcionando
7. ✅ Backups configurados

## 🐛 Troubleshooting

### Erro 502 Bad Gateway

```bash
# Verificar logs
sudo tail -f /var/log/nginx/error.log
sudo tail -f /var/log/php8.2-fpm.log

# Verificar se PHP-FPM está rodando
sudo systemctl status php8.2-fpm
```

### Erro de Permissão

```bash
sudo chown -R www-data:www-data /var/www/catchme
sudo chmod -R 775 /var/www/catchme/storage
```

### Erro de Conectividade MySQL

```bash
# Testar conexão
mysql -u catchme_user -p catchme

# Verificar configuração
sudo nano /var/www/catchme/.env
```

## 📞 Suporte

Para problemas durante o deploy:

- Verifique logs em `/var/log/nginx/`
- Verifique logs do Laravel em `storage/logs/`
- Teste endpoints individualmente

---

**Deploy concluído com sucesso! 🎉**
