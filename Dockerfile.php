# Use a imagem oficial do PHP com o Apache
FROM php:8.0-apache

# Adicione a configuração do ServerName ao Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Atualize o sistema e instale pacotes adicionais
RUN apt-get update -yqq && apt-get install -yqq nano git wget apt-transport-https

# Instale as extensões PHP necessárias (mysqli e pdo_mysql)
RUN docker-php-ext-install mysqli pdo_mysql

# Copie o arquivo de configuração personalizado do PHP
COPY custom-php.ini /usr/local/etc/php/conf.d/custom-php.ini

# Defina as permissões no diretório
RUN mkdir -p /var/www/html/src/report && chmod -R 755 /var/www/html/src/report

# Limpe o cache de pacotes para economiz               ar espaço no contêiner
RUN apt-get clean

# Exponha a porta 80 para o Apache
EXPOSE 80