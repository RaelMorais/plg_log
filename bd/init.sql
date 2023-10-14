CREATE USER 'adm_plg'@'%' IDENTIFIED BY 'adm123';
GRANT ALL PRIVILEGES ON plg_log.* TO 'adm_plg'@'%';
GRANT ALL PRIVILEGES ON plg_log_adm.* TO 'adm_plg'@'%';
FLUSH PRIVILEGES;
