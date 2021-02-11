FROM porchn/php5.6-apache
# update OS
RUN apt-get update -y
# Install composer command
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
COPY . /var/www/bocasay
COPY ./.build/vhost/000-default.conf /etc/apache2/sites-available/000-default.conf
WORKDIR /var/www/bocasay
RUN composer update