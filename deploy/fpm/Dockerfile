FROM php:7.1-fpm-alpine as base
RUN apk add -U autoconf \ 
  freetype-dev \ 
  g++ \ 
  gcc \ 
  git \
  gmp-dev \
  jpeg-dev \ 
  libmcrypt-dev \ 
  libpng-dev \ 
  libsodium-dev \ 
  libwebp-dev \ 
  libxml2-dev \ 
  libxpm-dev \ 
  make \ 
  nodejs \ 
  shadow \ 
  vim \ 
  zlib-dev

RUN pecl install APCu libsodium ;\
 docker-php-ext-configure gd --with-freetype-dir --with-jpeg-dir --with-png-dir --with-zlib --with-webp-dir --with-xpm-dir ;\
 docker-php-ext-install -j$(nproc) \
                           bcmath \
                           gd \
                           gmp \
                           mcrypt \
                           pdo_mysql \
                           soap ;\
    docker-php-ext-enable apcu \
                          sodium ;\
 usermod -u 1000 www-data && groupmod -g 1000 www-data

FROM base as development
RUN echo -en "\
max_execution_time = 30 \n\
max_input_time = 60 \n\
memory_limit = 2G \n" | tee -a /usr/local/etc/php/conf.d/php.ini ;\
    echo -en "\
[XDebug] \n\
xdebug.remote_enable=on \n\
xdebug.remote_connect_back=1 \n\
xdebug.remote_port=9000 \n\
xdebug.idekey=PHPSTORM \n\
xdebug.remote_autostart=on \n\
" | tee -a /usr/local/etc/php/conf.d/php.ini ;\
    pecl install xdebug ;\
    docker-php-ext-enable xdebug ;\
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" ;\
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" ;\
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer ;\
    php -r "unlink('composer-setup.php');"

RUN apk add -U tzdata && cp /usr/share/zoneinfo/Asia/Tehran /etc/localtime ;\
  echo 'date.timezone = "Asia/Tehran"' | tee /usr/local/etc/php/conf.d/docker-tz.ini

USER www-data
