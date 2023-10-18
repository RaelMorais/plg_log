CREATE DATABASE plg_log;

USE plg_log;

CREATE TABLE `clientes` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`autor` varchar(255) NOT NULL,
	`nome` varchar(255) NOT NULL,
	`tipo` varchar(2) NOT NULL,
	`cpf` varchar(11),
	`cnpj` varchar(14),
	`email` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `produtos` (
	`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
	`autor` varchar(255) NOT NULL,
	`codigo` varchar(12) NOT NULL,
	`nome` varchar(255) NOT NULL,
	`modelo` varchar(255) NOT NULL,
	`descricao` varchar(255) NOT NULL,
	`custo` varchar(255) NOT NULL,
	`lucro` varchar(255) NOT NULL,
	`preco` varchar(255) NOT NULL,
	`volume` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `pallets` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`autor` varchar(255) NOT NULL,
	`codigo` varchar(12) NOT NULL,
	`data` TIMESTAMP NOT NULL,
	`id_movimentacao` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `movimentacao` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`movimentacao` varchar(2) NOT NULL,
	`pallet1` varchar(255) NOT NULL DEFAULT '0',
	`pallet2` varchar(255) NOT NULL DEFAULT '0',
	`pallet3` varchar(255) NOT NULL DEFAULT '0',
	`pallet4` varchar(255) NOT NULL DEFAULT '0',
	`pallet5` varchar(255) NOT NULL DEFAULT '0',
	`pallet6` varchar(255) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
);

ALTER TABLE `pallets` ADD CONSTRAINT `pallets_fk0` FOREIGN KEY (`id_movimentacao`) REFERENCES `movimentacao`(`id`);