FROM php:8.0-cli

RUN apt-get update -y && apt-get install -y libmariadb-dev
RUN docker-php-ext-install pdo mysqli pdo_mysql

COPY --from=composer /usr/bin/composer /usr/bin/composer
