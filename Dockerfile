FROM php:8.1
COPY . /var/www/geotrio
WORKDIR /var/www/geotrio/public
CMD [ "php", "-S", "0.0.0.0:8080" ]
