FROM ubuntu:20.04

# Utilities
RUN dpkg --add-architecture i386 && \
    apt-get update -y && \
    DEBIAN_FRONTEND="noninteractive" apt-get install -y apt-transport-https software-properties-common build-essential unzip curl git vim apache2 php7.4 libapache2-mod-php php7.4-pgsql php7.4-dev php7.4-xml php7.4-curl php7.4-soap php7.4-mbstring php7.4-gd php7.4-intl php7.4-xsl php-pear php7.4-zip python-dev apt-utils wget java-common --no-install-recommends

# Change image time zone
ENV TZ 'America/Sao_Paulo'
RUN echo $TZ > /etc/timezone && \
    apt-get update && apt-get install -y tzdata && \
    rm /etc/localtime && \
    ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && \
    dpkg-reconfigure -f noninteractive tzdata && \
    apt-get clean

# Composer PHP
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN php -r "copy('https://composer.github.io/installer.sig', 'composer-sig.txt');" && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === file_get_contents('composer-sig.txt')) { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); unlink('composer-sig.txt'); } echo PHP_EOL;" && \
    php composer-setup.php --install-dir=/usr/bin --filename=composer

# NodeJS
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get update && \
    apt-get -y install nodejs --no-install-recommends && \
    rm -r /var/lib/apt/lists/*

# Virtualhost
RUN a2enmod rewrite
RUN a2enmod proxy_html
COPY ./VirtualHost.conf /etc/apache2/sites-available/000-default.conf

# Volume
RUN mkdir /var/www/html/teste-spassu
VOLUME ["/var/www/html/teste-spassu"]
WORKDIR /var/www/html/teste-spassu
