CREATE TABLE `usuarios` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`username` varchar(255) NOT NULL,
	`senha` varchar(255) NOT NULL,
	`privilegio` INT NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
);


