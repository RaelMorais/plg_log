# Use a imagem do Ubuntu como base
FROM ubuntu:20.04

# Configurar o fuso horário para America/Sao_Paulo (Horário de Brasília)
ENV TZ=America/Sao_Paulo

# Definir a variável de ambiente DEBIAN_FRONTEND para noninteractive
ENV DEBIAN_FRONTEND=noninteractive

# Instale as dependências do Apache, PHP, Python e ferramentas adicionais
RUN apt-get update -yqq && apt-get install -yqq \
    apache2 \
    php \
    php-mysql \
    nano \
    git \
    wget \
    apt-transport-https \
    python3 \
    python3-pip && \
    apt-get clean

# Configurar o Apache após a instalação do PHP
RUN echo "ServerName PLGlog" >> /etc/apache2/apache2.conf && \
    a2enmod rewrite

# Criar o diretório /var/www/html
RUN mkdir -p /var/www/html

# Copiar o arquivo de configuração personalizado do PHP (se necessário)
# COPY custom-php.ini /etc/php/8.0/apache2/php.ini

# Instalar Python3 e pip3
RUN apt-get install -yqq python3-pip

# Atualizar o pip para a versão mais recente
RUN pip3 install --upgrade pip

# Definir o diretório de trabalho para o aplicativo Python
WORKDIR /app

# Copiar o arquivo de requisitos do Python
COPY requirements.txt .

# Crie o diretório /etc/phpmyadmin
RUN mkdir -p /etc/phpmyadmin

# COPY config.inc.php /etc/phpmyadmin/config.inc.php (se necessário)

# RUN chmod 600 /etc/phpmyadmin/config.inc.php (se necessário)
# RUN chown www-data:www-data /etc/phpmyadmin/config.inc.php (se necessário)

RUN pip3 install --no-cache-dir -r requirements.txt

# Copiar o código-fonte do aplicativo Python
COPY . .

# Expor a porta 80 para o Apache e iniciar o servidor Apache
EXPOSE 80
CMD ["apachectl", "-D", "FOREGROUND"]
