FROM php:8.3-fpm

# Dépendances système
RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip libicu-dev libzip-dev zlib1g-dev \
    && docker-php-ext-install intl pdo_mysql zip opcache \
    && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# (Optionnel) Node si tu utilises AssetMapper seulement, tu peux t'en passer.
# Si tu utilises encore webpack/encore, ajoute node/npm ici.

COPY php.ini /usr/local/etc/php/conf.d/app.ini

WORKDIR /var/www/html