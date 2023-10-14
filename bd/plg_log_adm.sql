CREATE DATABASE plg_log_adm;

USE plg_log_adm;

CREATE TABLE `usuarios` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`username` varchar(225) NOT NULL,
	`senha` varchar(500) NOT NULL,
	`salt` varchar(255) NOT NULL,
	`privilegio` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);