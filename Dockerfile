# ==============================
# Base: PHP + Nginx
# ==============================
FROM webdevops/php-nginx:8.2

# ==============================
# Configurações básicas
# ==============================
ENV WEB_DOCUMENT_ROOT=/app/public
ENV PHP_DISPLAY_ERRORS=0
ENV PHP_MEMORY_LIMIT=512M
ENV PHP_MAX_EXECUTION_TIME=300
ENV PHP_POST_MAX_SIZE=64M
ENV PHP_UPLOAD_MAX_FILESIZE=64M

# ==============================
# Diretório de trabalho
# ==============================
WORKDIR /app

# ==============================
# Dependências do sistema
# ==============================
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    nano \
    && rm -rf /var/lib/apt/lists/*

# ==============================
# Composer
# ==============================
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ==============================
# Código da aplicação
# ==============================
COPY . /app

# ==============================
# Instalar dependências PHP
# ==============================
RUN composer install --no-dev --optimize-autoloader

# ==============================
# Permissões (ESSENCIAL)
# ==============================
RUN chown -R application:application /app \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# ==============================
# Expor portas
# ==============================
EXPOSE 80 443
