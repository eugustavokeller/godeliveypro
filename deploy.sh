#!/bin/bash
set -e

# Diretório do projeto
APP_DIR="/var/www/godeliverypro"

cd $APP_DIR

echo "🔄 Atualizando código do Git..."
git reset --hard
git pull origin main

echo "📦 Instalando dependências do backend..."
composer install --no-dev --optimize-autoloader

echo "🌐 Instalando dependências do frontend..."
yarn install

echo "🔧 Corrigindo permissões do esbuild..."
chmod -R 755 node_modules/@esbuild || true
chmod +x node_modules/@esbuild/linux-x64/bin/esbuild || true

echo "🔧 Corrigindo permissões do Vite e ferramentas..."
chmod -R 755 node_modules/.bin || true
chmod -R 755 node_modules/vite || true
chmod -R 755 node_modules/@vitejs || true
chmod +x node_modules/.bin/vite || true

echo "🔧 Copiar variável de ambiente .env"
cp ../.env.example .env

echo "🔧 Cacheando configurações do Laravel..."
php artisan config:cache

echo "🔧 Gerando chave da aplicação..."
php artisan key:generate

echo "⚡ Buildando frontend (Vite)..."
npx vite build

echo "⚙️ Rodando migrações..."
php artisan migrate --force

echo "🧹 Limpando caches do Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:clear

echo "🔑 Ajustando permissões para Nginx/PHP-FPM..."
# Usuário www-data é padrão do Nginx/PHP-FPM no Ubuntu
sudo chown -R www-data:www-data $APP_DIR
sudo find $APP_DIR -type f -exec chmod 644 {} \;
sudo find $APP_DIR -type d -exec chmod 755 {} \;
sudo chmod -R 775 $APP_DIR/storage
sudo chmod -R 775 $APP_DIR/bootstrap/cache

echo "✅ Deploy finalizado com sucesso!"