FROM php:8-fpm
ARG PHP_VERSION=8.0
USER root

#--------------------------------------------------------------------------
# Software's Installation
#--------------------------------------------------------------------------
#
# Installing tools and PHP extentions using "apt", "docker-php", "pecl",
#
# Install "curl", "libmemcached-dev", "libpq-dev", "libjpeg-dev",
#         "libpng-dev", "libfreetype6-dev", "libssl-dev", "libmcrypt-dev",
RUN set -eu; set +ox; \
    apt-get update; \
    apt-get upgrade -y; \
    apt-get install -y --no-install-recommends \
            curl \
            libmemcached-dev \
            libz-dev \
            libpq-dev \
            libjpeg-dev \
            libpng-dev \
            libfreetype6-dev \
            libssl-dev \
            libmcrypt-dev \
            libonig-dev; \
    rm -rf /var/lib/apt/lists/*


RUN set -eux; \
    docker-php-ext-install pdo_mysql; \
    docker-php-ext-configure gd \
            --prefix=/usr \
            --with-jpeg \
            --with-freetype; \
    docker-php-ext-install gd; \
    php -r 'var_dump(gd_info());'


RUN set -xe; \
    apt-get update -yqq && \
    pecl channel-update pecl.php.net && \
    apt-get install -yqq --no-install-recommends \
        apt-utils \
        libzip-dev  zip unzip \
        libonig-dev \
        supervisor \
        libxml2-dev \
        git \
        wget \
        autoconf \
        nano
RUN docker-php-ext-configure zip  && \
        docker-php-ext-install zip tokenizer xml && \
        php -m | grep -q 'zip'


RUN docker-php-ext-install sockets \
    && apt-get -y install libbz2-dev; \
      docker-php-ext-install bz2



#RUN rm /etc/apt/preferences.d/no-debian-php && \
#        apt-get -y install libxml2-dev php-soap && \
#        docker-php-ext-install soap


# Install the pgsql extension
#RUN docker-php-ext-install pgsql


# REDIS
RUN pecl install -o -f redis; \
     rm -rf /tmp/pear \
    && docker-php-ext-enable redis

# MONGO DB SUPPORT
#RUN pecl install mongodb && \
#    docker-php-ext-enable mongodb


# PCNTL :  Needed for Horizon
RUN docker-php-ext-install pcntl && \
    docker-php-ext-install bcmath && \
    docker-php-ext-install opcache && \
    docker-php-ext-install mysqli && \
    docker-php-ext-install tokenizer

COPY ./opcache.ini /usr/local/etc/php/conf.d/opcache.ini


# MEMCACHE
#RUN pecl install memcached-3.1.3; && \
#    docker-php-ext-enable memcached


RUN apt-get install -y zlib1g-dev libicu-dev g++ && \
        docker-php-ext-configure intl && \
        docker-php-ext-install intl




# IMAGE OPTIMIZERS
# RUN apt-get install -y jpegoptim optipng pngquant gifsicle
#
# # IMAGE MAGICK
# RUN apt-get install -y libmagickwand-dev imagemagick && \
#         pecl install imagick && \
#         docker-php-ext-enable imagick


# IMAP
# RUN apt-get install -y libc-client-dev libkrb5-dev && \
#         rm -r /var/lib/apt/lists/* && \
#         set -eux; \
#         	PHP_OPENSSL=yes docker-php-ext-configure imap --with-kerberos --with-imap-ssl && \
#         docker-php-ext-install imap

USER root


###########################################################################
# Check PHP version:
###########################################################################
RUN php -v | head -n 1 | grep -q "PHP ${PHP_VERSION}."



################ INSTALL PYTHON 3.6 #################
# RUN apt-get update && \
#     apt-get -y install make build-essential zlib1g-dev libreadline-dev libsqlite3-dev llvm \
#     libncurses5-dev  libncursesw5-dev xz-utils tk-dev
# RUN apt-get -y install python3 python3-pip
# RUN pip3 install -U python-dotenv sleekxmpp compoundfiles
####### END ADDED FOR PYTHON ##############


#
#--------------------------------------------------------------------------
# Final Touch
#--------------------------------------------------------------------------
#


COPY ./laravel.ini /usr/local/etc/php/conf.d
COPY ./xlaravel.pool.conf /usr/local/etc/php-fpm.d/
COPY ./php8.0.ini /usr/local/etc/php/
#COPY ./laravel-echo-limit.conf /etc/security/limits.d/laravel-echo.conf
RUN echo "*  nofile  20000" > /etc/security/limits.d/laravel-echo.conf

RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    rm /var/log/lastlog /var/log/faillog \
&& adduser --uid 1000 --shell /bin/bash --system laravel \
&& chmod g=u /etc/passwd

RUN chgrp -R 0 /etc/supervisor \
    && chmod -R g=u /etc/supervisor

#RUN pecl install ev


USER root
################ INSTALL PYTHON 3.6 #################
RUN apt-get update && \
    apt-get -y install make build-essential zlib1g-dev libreadline-dev libsqlite3-dev llvm \
    libncurses5-dev  libncursesw5-dev xz-utils tk-dev
RUN apt-get -y install python3 python3-pip
RUN pip3 install -U python-dotenv sleekxmpp compoundfiles
####### END ADDED FOR PYTHON ##############

COPY ${DOCKER_PATH}/roles/ /etc/supervisor/
COPY ${DOCKER_PATH}/laravel-cron-script.py /etc/supervisor/laravel-cron-script.py
COPY ${DOCKER_PATH}/start_laravel.sh /usr/local/etc/php/
RUN chmod a+x /usr/local/etc/php/start_laravel.sh


USER root

ARG NODE_VERSION=14.16.1
ARG INSTALL_NODE=true
ENV NVM_DIR /home/www-data/.nvm

RUN apt-get update && apt-get -y install libsqlite3-dev sqlite3 \
    && docker-php-ext-install pdo_sqlite \
    && docker-php-ext-enable pdo_sqlite \
    && curl -s http://getcomposer.org/installer | php && \
    echo "export PATH=${PATH}:/var/www/vendor/bin" >> ~/.bashrc && \
    mv composer.phar /usr/local/bin/composer \
    && curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.8/install.sh | bash && \
       . $NVM_DIR/nvm.sh && \
       nvm install ${NODE_VERSION} && \
       nvm use ${NODE_VERSION} && \
       nvm alias ${NODE_VERSION} && \
       npm install -g gulp bower vue-cli

RUN sed -i 's/SECLEVEL=2/SECLEVEL=1/g' /etc/ssl/openssl.cnf


# Wouldn't execute when added to the RUN statement in the above block
# Source NVM when loading bash since ~/.profile isn't loaded on non-login shell
RUN echo "" >> ~/.bashrc && \
    echo 'export NVM_DIR="$HOME/.nvm"' >> ~/.bashrc && \
    echo '[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"  # This loads nvm' >> ~/.bashrc \
# Add PATH for node
ENV PATH $PATH:$NVM_DIR/versions/node/v${NODE_VERSION}/bin
RUN apt-get update && apt-get -y install nodejs \
    && ln -s /home/www-data/.nvm/versions/node/v${NODE_VERSION}/bin/npm /bin/


RUN apt-get install -y libldap2-dev && \
        docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ && \
        docker-php-ext-install ldap


RUN  touch /var/www/supervisord.log \
     && chmod 777 /var/www/supervisord.log

WORKDIR /var/www
EXPOSE 9000
USER root
ENTRYPOINT ["/usr/local/etc/php/start_laravel.sh"]
