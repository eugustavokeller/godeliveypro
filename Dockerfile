FROM php:8.2-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Instalar Yarn via npm
RUN npm install -g yarn

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar todos os arquivos (exceto os que estão no .dockerignore)
COPY . .

# Criar diretórios necessários se não existirem
RUN mkdir -p storage/app/public storage/framework/{sessions,views,cache} bootstrap/cache

# Instalar dependências do PHP sem executar scripts do Laravel
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# Instalar dependências do Node
RUN yarn install --frozen-lockfile

# Compilar assets para produção
RUN yarn build

# Configurar permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Expor porta PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]

