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
yarn cache clean --mirror
yarn install --frozen-lockfile

echo "🔧 Corrigindo permissões do esbuild..."
chmod -R 755 node_modules/@esbuild || true
chmod +x node_modules/@esbuild/linux-x64/bin/esbuild || true

echo "🔧 Corrigindo permissões do Vite e ferramentas..."
chmod -R 755 node_modules/.bin || true
chmod -R 755 node_modules/vite || true
chmod -R 755 node_modules/@vitejs || true
chmod +x node_modules/.bin/vite || true

echo "⚡ Buildando frontend (Vite)..."
rm -rf public/build
yarn build

echo "⚙️ Rodando migrações..."
php artisan migrate --force --no-interaction

echo "🧹 Limpando caches do Laravel..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache

echo "🔑 Ajustando permissões para Nginx/PHP-FPM..."
# Usuário www-data é padrão do Nginx/PHP-FPM no Ubuntu
sudo chown -R www-data:www-data "$APP_DIR"
sudo chmod -R ug+rwX "$APP_DIR/storage" "$APP_DIR/bootstrap/cache"

echo "✅ Deploy finalizado com sucesso!"