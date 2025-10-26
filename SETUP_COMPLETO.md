# ✅ Setup Completo - CatchMe Docker

## 📋 Resumo da Configuração

Este projeto foi configurado para rodar em Docker com as seguintes características:

### ✅ O que foi configurado:

1. **Docker Compose** - Arquitetura completa com 3 containers:

   - `app` - Aplicação Laravel com PHP-FPM 8.2
   - `nginx` - Servidor web com SSL
   - `db` - MySQL 8.0

2. **Banco de Dados** - MySQL 8.0 incluído no Docker

   - Volume persistente para dados
   - Porta 3307 exposta externamente (3306 interno)
   - Configuração via variáveis de ambiente no `.env`
   - Pode ser substituído por banco externo alterando `DB_HOST`

3. **Assets Compilados** - Build automatizado no Dockerfile:

   - Instala Node.js e Yarn
   - Compila assets Vue.js para produção

4. **SSL/HTTPS** - Certificados configurados:
   - Certificados auto-assinados para desenvolvimento
   - Pronto para Let's Encrypt em produção

## 🚀 Como Usar

### Desenvolvimento Local

```bash
# 1. Configure o banco de dados no .env (opcional - já tem valores padrão)
cp docker.env.example .env

# 2. Suba os containers (incluindo MySQL)
docker-compose up -d

# 3. Aguarde o MySQL inicializar (10-20 segundos)
docker-compose logs -f db

# 4. Execute migrations
docker-compose exec app php artisan migrate

# 5. Gere a chave da aplicação
docker-compose exec app php artisan key:generate
```

Acesse: http://localhost

### Deploy em Produção

```bash
# 1. Configure variáveis de ambiente
cp docker.env.example .env
nano .env  # Configure DB_HOST, DB_DATABASE, etc.

# 2. Configure SSL (Let's Encrypt)
sudo certbot certonly --standalone -d seu-dominio.com
sudo cp /etc/letsencrypt/live/seu-dominio.com/fullchain.pem nginx/ssl/cert.pem
sudo cp /etc/letsencrypt/live/seu-dominio.com/privkey.pem nginx/ssl/key.pem

# 3. Execute o deploy
./deploy.sh
```

## 📁 Arquivos de Configuração

### Principais

- `docker-compose.yml` - Configuração dos containers
- `Dockerfile` - Build da aplicação
- `.dockerignore` - Arquivos ignorados no build
- `docker.env.example` - Variáveis de ambiente exemplo
- `nginx/site.conf` - Configuração do Nginx

### Guias

- `DEPLOY_VPS.md` - Guia completo de deploy
- `CONFIGURACAO_BANCO_EXTERNO.md` - Como configurar banco externo
- `README_DOCKER.md` - Documentação do Docker
- `deploy.sh` - Script automatizado de deploy

## 🔧 Comandos Úteis

### Gerenciar Containers

```bash
docker-compose up -d              # Subir containers
docker-compose down               # Parar containers
docker-compose restart            # Reiniciar containers
docker-compose logs -f            # Ver logs
docker-compose ps                 # Status dos containers
```

### Comandos Laravel

```bash
docker-compose exec app php artisan migrate
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:cache
docker-compose exec app bash      # Acessar shell do container
```

### Build

```bash
docker-compose build              # Rebuild da imagem
docker-compose build --no-cache   # Build sem cache
```

## 🔐 Configuração do Banco de Dados

### Usando MySQL do Docker (Padrão)

O Docker inclui MySQL 8.0 configurado automaticamente. As credenciais padrão são:

- Host: `db`
- Database: `catchme`
- User: `catchme_user`
- Password: `catchme_password`

### Usando Banco Externo

Para usar um banco externo, edite o `.env`:

```env
DB_HOST=seu-servidor-mysql.com
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

Veja o arquivo `CONFIGURACAO_BANCO_EXTERNO.md` para:

- Como configurar diferentes provedores de banco (AWS RDS, DigitalOcean, etc.)
- Troubleshooting de conexão
- Configuração de SSL
- Migração de dados

### Acessar MySQL

```bash
# Do host (porta 3307)
mysql -h 127.0.0.1 -P 3307 -u catchme_user -p

# Do container
docker-compose exec db mysql -u catchme_user -p catchme
```

## 📝 Variáveis de Ambiente

Configure no arquivo `.env`:

```env
# Ambiente
APP_ENV=production
APP_DEBUG=false
APP_URL=https://seu-dominio.com

# Banco de Dados (MySQL no Docker)
DB_HOST=db
DB_PORT=3306
DB_DATABASE=catchme
DB_USERNAME=catchme_user
DB_PASSWORD=catchme_password
DB_ROOT_PASSWORD=root_password

# Para usar banco EXTERNO, altere DB_HOST:
# DB_HOST=seu-servidor-mysql.com

# Nginx e MySQL
NGINX_HTTP_PORT=80
NGINX_HTTPS_PORT=443
DB_EXTERNAL_PORT=3307  # Porta externa do MySQL
```

## 🆘 Troubleshooting

### Nginx não inicia

Certifique-se que os certificados SSL existam:

```bash
ls -la nginx/ssl/
# Deve conter: cert.pem e key.pem
```

Se não existirem, gere certificados auto-assinados:

```bash
mkdir -p nginx/ssl
openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
  -keyout nginx/ssl/key.pem \
  -out nginx/ssl/cert.pem \
  -subj "/C=BR/ST=SP/L=SaoPaulo/O=CatchMe/CN=localhost"
```

### Erro de conexão com banco

1. Verifique se as credenciais estão corretas no `.env`
2. Teste a conexão:

```bash
docker-compose exec app php artisan tinker
DB::connection()->getPdo();
```

3. Verifique se o banco está acessível da VPS

### Erro de permissões

```bash
docker-compose exec app chmod -R 775 storage bootstrap/cache
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
```

## ✅ Checklist de Deploy

- [ ] Docker e Docker Compose instalados
- [ ] Arquivo `.env` configurado
- [ ] Credenciais do banco de dados configuradas
- [ ] Certificados SSL configurados
- [ ] Build da imagem executado com sucesso
- [ ] Containers rodando
- [ ] Migrations executadas
- [ ] Chave da aplicação gerada
- [ ] Teste de acesso funcionando

## 🎉 Status

**Build: ✅ Funcionando**  
**Containers: ✅ Rodando**  
**SSL: ✅ Configurado**  
**MySQL: ✅ Docker (porta 3307)**

## 📚 Documentação Adicional

- `DEPLOY_VPS.md` - Deploy completo em VPS
- `CONFIGURACAO_BANCO_EXTERNO.md` - Configuração de banco externo
- `README_DOCKER.md` - Guia geral do Docker
- Arquivos originais: `README.md`, `QUICKSTART.md`, etc.

---

**Desenvolvido e configurado com Docker** 🐳
