# 🐳 CatchMe - Docker Setup

Este projeto está configurado para rodar com Docker em ambiente de produção.

## 📁 Arquivos Criados

### Para Produção:

- **`docker-compose.prod.yml`** - Configuração Docker Compose para produção
- **`Dockerfile`** - Imagem da aplicação com PHP 8.2 + Node.js
- **`.dockerignore`** - Arquivos ignorados no build
- **`deploy.sh`** - Script automatizado de deploy
- **`DEPLOY_VPS.md`** - Guia completo de deploy na VPS
- **`.env.production.example`** - Exemplo de variáveis de ambiente para produção

### Arquivos Modificados:

- **`nginx/site.conf`** - Configuração do Nginx atualizada

## 🚀 Quick Start

### Desenvolvimento Local

```bash
# Subir containers
docker-compose up -d

# Instalar dependências (se necessário)
docker-compose exec app composer install
docker-compose exec app npm install

# Executar migrations
docker-compose exec app php artisan migrate

# Gerar chave da aplicação
docker-compose exec app php artisan key:generate
```

### Produção na VPS

Consulte o guia completo: **`DEPLOY_VPS.md`**

Resumo rápido:

```bash
# 1. Configure o arquivo .env (IMPORTANTE: banco de dados externo)
cp docker.env.example .env
nano .env
# Configure as credenciais do seu banco de dados externo

# 2. Configure SSL
sudo certbot certonly --standalone -d seu-dominio.com

# 3. Execute o deploy
./deploy.sh

# 4. Gere a chave da aplicação
docker-compose exec app php artisan key:generate
```

## 📦 Estrutura dos Containers

```
┌─────────────────┐
│   Nginx:80,443  │  ← Servidor web (reverso proxy)
└────────┬────────┘
         │
┌────────┴────────┐
│  App (PHP-FPM)  │  ← Aplicação Laravel
└────────┬────────┘
         │
┌────────┴────────┐
│  DB (MySQL)     │  ← Banco de dados
└─────────────────┘
```

## 🔧 Comandos Úteis

### Desenvolvimento (docker-compose.yml)

```bash
# Iniciar
docker-compose up -d

# Ver logs
docker-compose logs -f

# Parar
docker-compose down

# Executar comandos
docker-compose exec app php artisan ...
```

### Produção (docker-compose.prod.yml)

```bash
# Iniciar
docker-compose -f docker-compose.prod.yml up -d

# Ver logs
docker-compose -f docker-compose.prod.yml logs -f

# Parar
docker-compose -f docker-compose.prod.yml down

# Executar comandos
docker-compose -f docker-compose.prod.yml exec app php artisan ...
```

## 📝 Configuração

### Variáveis de Ambiente Importantes

Edite o arquivo `.env`:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://seu-dominio.com

DB_HOST=db
DB_DATABASE=catchme
DB_USERNAME=catchme_user
DB_PASSWORD=senha_forte_aqui

DB_PASSWORD=senha_forte_aqui
DB_ROOT_PASSWORD=senha_root_aqui
```

### Nginx

Edite `nginx/site.conf` e configure:

- `server_name` com seu domínio
- Certificados SSL em `nginx/ssl/`

## 🔐 SSL/HTTPS

### Desenvolvimento (Self-signed)

```bash
mkdir -p nginx/ssl
openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
  -keyout nginx/ssl/key.pem \
  -out nginx/ssl/cert.pem \
  -subj "/C=BR/ST=SP/L=SaoPaulo/O=CatchMe/CN=localhost"
```

### Produção (Let's Encrypt)

Veja instruções completas em `DEPLOY_VPS.md`

## 🗄️ Banco de Dados

### Backup

```bash
# Produção
docker-compose -f docker-compose.prod.yml exec -T db \
  mysqldump -u catchme_user -p catchme > backup.sql
```

### Restore

```bash
cat backup.sql | docker-compose -f docker-compose.prod.yml exec -T db \
  mysql -u catchme_user -p catchme
```

## 🔄 Atualização

### Desenvolvimento

```bash
git pull
docker-compose up -d --build
docker-compose exec app php artisan migrate
```

### Produção

```bash
git pull
docker-compose -f docker-compose.prod.yml build --no-cache
docker-compose -f docker-compose.prod.yml up -d
docker-compose -f docker-compose.prod.yml exec app php artisan migrate --force
./deploy.sh  # ou use o script
```

## 🆘 Troubleshooting

### Container não inicia

```bash
docker-compose logs nome-do-container
```

### Erro de permissões

```bash
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
docker-compose exec app chmod -R 775 storage bootstrap/cache
```

### Cache do Laravel

```bash
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan route:cache
docker-compose exec app php artisan view:cache
```

## 📚 Documentação Completa

- **`DEPLOY_VPS.md`** - Guia completo de deploy
- **`README.md`** - Documentação geral do projeto

## 🎯 Checklist de Deploy

- [ ] Docker e Docker Compose instalados
- [ ] Arquivo `.env` configurado
- [ ] Certificados SSL configurados (produção)
- [ ] Permissões de arquivos corretas
- [ ] Banco de dados configurado
- [ ] Migrations executadas
- [ ] Chave da aplicação gerada
- [ ] Firewall configurado (produção)
- [ ] Logs verificados

## ✅ Pronto!

Seu CatchMe está rodando! 🎉
