# plg_log
Ao resto dos colegas de trabalho (vabundos) segue-se os comandos para executar o docker-compose.yml

docker-compose up -d
docker-compose build
docker exec -it mysql_plg mysql -u root -p

GRANT ALL PRIVILEGES ON plg_log.* TO 'adm_plg'@'%';
GRANT ALL PRIVILEGES ON plg_log_adm.* TO 'adm_plg'@'%';
FLUSH PRIVILEGES;

source /docker-entrypoint-initdb.d/plg_log_adm.sql
source /docker-entrypoint-initdb.d/plg_log_geral.sql
