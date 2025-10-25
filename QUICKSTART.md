# ⚡ Quick Start Guide

Guia rápido para começar a usar o CatchMe Location Tracker em 5 minutos.

## 🚀 Início Rápido (Desenvolvimento)

### 1. Instalar Dependências

```bash
composer install
npm install
```

### 2. Configurar Banco de Dados

```bash
# Criar arquivo .env
cp .env.example .env

# Editar .env com suas credenciais MySQL
nano .env

# Gerar chave da aplicação
php artisan key:generate
```

### 3. Criar Banco e Migrations

```bash
# No MySQL
mysql -u root -p
CREATE DATABASE catchme;
EXIT;

# Executar migrations
php artisan migrate
php artisan storage:link
```

### 4. Iniciar Aplicação

```bash
# Terminal 1: Laravel
php artisan serve

# Terminal 2: Vite (frontend)
npm run dev
```

### 5. Acessar

Abra: **http://localhost:8000**

## 🧪 Testar API

### Com cURL

```bash
# Verificar IP
curl http://localhost:8000/api/whoami

# Enviar localização
curl -X POST http://localhost:8000/api/log \
  -H "Content-Type: application/json" \
  -d '{"latitude":-23.5505,"longitude":-46.6333,"accuracy":10.5}'
```

### Com Script de Teste

```bash
# Criar imagem de teste
convert -size 800x600 xc:blue teste.jpg

# Executar testes
./test-api.sh
```

## 🐳 Docker (Alternativa)

```bash
# Iniciar containers
docker-compose up -d

# Executar migrations
docker-compose exec app php artisan migrate
docker-compose exec app php artisan storage:link

# Compilar assets
docker-compose exec app npm run build

# Acessar
# http://localhost (HTTP) ou https://localhost (HTTPS se configurado)
```

## 📁 Estrutura Importante

```
catchme/
├── app/Http/Controllers/Api/    # Controllers da API
├── app/Models/                  # Models do banco
├── database/migrations/         # Migrations
├── resources/js/components/    # Componentes Vue
├── routes/api.php              # Rotas da API
└── storage/logs/proofs.log     # Log imutável
```

## 📚 Próximos Passos

- **Leia**: `README.md` para documentação completa
- **Configure**: `DEPLOY.md` para deploy em produção
- **Exemplos**: `EXAMPLES.md` para mais exemplos de uso

## 🔧 Comandos Úteis

```bash
# Ver logs
tail -f storage/logs/laravel.log
tail -f storage/logs/proofs.log

# Executar testes
php artisan test

# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear

# Reexecutar migrations
php artisan migrate:fresh
```

## ⚠️ Problemas Comuns

### Erro: SQLSTATE[HY000] [1045]

```bash
# Verificar credenciais no .env
DB_PASSWORD=sua_senha
```

### Erro: Class not found

```bash
# Reinstalar dependências
composer dump-autoload
```

### Erro: Permission denied (storage)

```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Câmera não funciona no navegador

- Certifique-se de usar HTTPS em produção
- Permita permissões de câmera no navegador
- Teste em localhost primeiro

## 📞 Precisa de Ajuda?

- Consulte `README.md` para documentação completa
- Veja `EXAMPLES.md` para exemplos práticos
- Abra uma issue no GitHub

---

**Boa sorte! 🎉**
