# Use a imagem oficial do PHP com o Apache
FROM php:8.0-apache

# Adicione a configuração do ServerName ao Apache
RUN echo "ServerName PLGlog" >> /etc/apache2/apache2.conf

# Atualize o sistema e instale pacotes adicionais
RUN apt-get update -yqq \
    && apt-get install -yqq nano \
    && apt-get install -yqq git \
    && apt-get install -yqq wget \
    && apt-get install -yqq apt-transport-https

# Instale as extensões PHP necessárias (mysqli e pdo_mysql)
RUN docker-php-ext-install mysqli pdo_mysql

# Copie o arquivo de configuração personalizado do PHP
COPY custom-php.ini /usr/local/etc/php/conf.d/custom-php.ini

# Limpe o cache de pacotes para economizar espaço no contêiner
RUN apt-get clean

# Exponha a porta 80 para o Apache
EXPOSE 80