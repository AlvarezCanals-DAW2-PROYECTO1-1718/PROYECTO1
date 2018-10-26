/*----------CREAR BASE DE DATOS------------------------------------------------------------------------------------------------------------*/
/*----------CREAR BASE DE DATOS------------------------------------------------------------------------------------------------------------*/
/*----------CREAR BASE DE DATOS------------------------------------------------------------------------------------------------------------*/
/*----------CREAR BASE DE DATOS------------------------------------------------------------------------------------------------------------*/
/*----------CREAR BASE DE DATOS------------------------------------------------------------------------------------------------------------*/
DROP DATABASE IF EXISTS bd_proyactoReservaRecursos;
CREATE DATABASE IF NOT EXISTS bd_proyactoReservaRecursos;



/*-----------CREAR TABLAS-----------------------------------------------------------------------------------------------------------------*/
/*-----------CREAR TABLAS-----------------------------------------------------------------------------------------------------------------*/
/*-----------CREAR TABLAS-----------------------------------------------------------------------------------------------------------------*/
/*-----------CREAR TABLAS-----------------------------------------------------------------------------------------------------------------*/
/*-----------CREAR TABLAS-----------------------------------------------------------------------------------------------------------------*/
USE `bd_proyactoReservaRecursos`;

CREATE TABLE IF NOT EXISTS `tbl_empleado` (
`id_empleado` int(11) COLLATE utf8_unicode_ci NOT NULL AUTO_INCREMENT,
`email_empleado` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
`usuario_empleado` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`password_empleado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
`nombre_empleado` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`apellido_empleado` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`grupo_empleado` ENUM('usuarios', 'administradores') COLLATE utf8_unicode_ci DEFAULT NULL,
PRIMARY KEY (`id_empleado`),
UNIQUE KEY `email_empleado` (`email_empleado`),
UNIQUE KEY `usuario_empleado` (`usuario_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `tbl_recurso` (
`id_recurso` int(11) COLLATE utf8_unicode_ci NOT NULL AUTO_INCREMENT,
`nombre_recurso` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`tipo_recurso` ENUM('sala multidisciplinar', 'sala informática', 'taller cocina', 'despacho entrevistas', "salón actos", 'sala reuniones', 'proyector portátil', 'portátil', 'móbil') COLLATE utf8_unicode_ci DEFAULT NULL,
`disp_recurso` ENUM('si', 'no') COLLATE utf8_unicode_ci DEFAULT NULL,
PRIMARY KEY (`id_recurso`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `tbl_reserva` (
`id_reserva` int(11) COLLATE utf8_unicode_ci NOT NULL AUTO_INCREMENT,
`fechaInicio_reserva` DATETIME COLLATE utf8_unicode_ci DEFAULT NULL,
`fechaFinal_reserva` DATETIME COLLATE utf8_unicode_ci DEFAULT NULL,
`tiempoEstimado_reserva` TIME COLLATE utf8_unicode_ci DEFAULT NULL,
`finalizacion_reserva` ENUM('bien', 'incidencia') COLLATE utf8_unicode_ci DEFAULT NULL,
`id_empleado` int(11) COLLATE utf8_unicode_ci DEFAULT NULL,
`id_recurso` int(11) COLLATE utf8_unicode_ci DEFAULT NULL,
PRIMARY KEY (`id_reserva`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `tbl_incidencia` (
`id_incidencia` int(11) COLLATE utf8_unicode_ci NOT NULL AUTO_INCREMENT,
`titulo_incidencia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`descripcion_incidencia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`tiempoEstimado_incidencia` TIME COLLATE utf8_unicode_ci DEFAULT NULL,
`fechaInicio_incidencia` DATETIME COLLATE utf8_unicode_ci DEFAULT NULL,
`fechaFinal_incidencia` DATETIME COLLATE utf8_unicode_ci DEFAULT NULL,
`dispRecurso_incidencia` ENUM('si', 'no') COLLATE utf8_unicode_ci DEFAULT NULL,
`id_reserva` int(11) COLLATE utf8_unicode_ci DEFAULT NULL,
PRIMARY KEY (`id_incidencia`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



/*-----------ESTABLECER FK---------------------------------------------------------------------------------------------------------------------------*/
/*-----------ESTABLECER FK---------------------------------------------------------------------------------------------------------------------------*/
/*-----------ESTABLECER FK---------------------------------------------------------------------------------------------------------------------------*/
/*-----------ESTABLECER FK---------------------------------------------------------------------------------------------------------------------------*/
/*-----------ESTABLECER FK---------------------------------------------------------------------------------------------------------------------------*/
ALTER TABLE `tbl_reserva` ADD CONSTRAINT `FK_reserva_empleado` FOREIGN KEY (`id_empleado`)
REFERENCES `tbl_empleado` (`id_empleado`);

ALTER TABLE `tbl_reserva` ADD CONSTRAINT `FK_reserva_recurso` FOREIGN KEY (`id_recurso`)
REFERENCES `tbl_recurso` (`id_recurso`);

ALTER TABLE `tbl_incidencia` ADD CONSTRAINT `FK_incidencia_recurso` FOREIGN KEY (`id_reserva`)
REFERENCES `tbl_reserva` (`id_reserva`);



/*------------INSERTAR DATOS----------------------------------------------------------------------------------------------------------*/
/*------------INSERTAR DATOS----------------------------------------------------------------------------------------------------------*/
/*------------INSERTAR DATOS----------------------------------------------------------------------------------------------------------*/
/*------------INSERTAR DATOS----------------------------------------------------------------------------------------------------------*/
/*------------INSERTAR DATOS----------------------------------------------------------------------------------------------------------*/


INSERT INTO `tbl_empleado` (`email_empleado`, `usuario_empleado`, `password_empleado`, `nombre_empleado`, `apellido_empleado`, `grupo_empleado`) VALUES
('usuAdmin@mail.com', 	'usuarioAdmin', '1234', 'Javier', 	'Idalgo', 	'administradores'),
('usu01@mail.com', 		'usuario01', 	'1234', 'Juan', 	'Gonzalez', 'usuarios'),
('usu02@mail.com', 		'usuario02', 	'1234', 'Pepe', 	'Gomez', 	'usuarios'),
('usu03@mail.com', 		'usuario03', 	'1234', 'Lola', 	'Garcia', 	'usuarios'),
('usu04@mail.com', 		'usuario04', 	'1234', 'Matt', 	'Dacal', 	'usuarios'),
('usu05@mail.com', 		'usuario05', 	'1234', 'Barry', 	'Alen', 	'usuarios'),
('usu06@mail.com', 		'usuario06', 	'1234', 'Juan', 	'Gonzalez', 'usuarios'),
('usu07@mail.com', 		'usuario07', 	'1234', 'Pepe', 	'Gomez', 	'usuarios'),
('usu08@mail.com', 		'usuario08', 	'1234', 'Lola', 	'Garcia', 	'usuarios'),
('usu09@mail.com', 		'usuario09', 	'1234', 'Matt', 	'Dacal', 	'usuarios'),
('usu10@mail.com', 		'usuario10', 	'1234', 'Barry', 	'Alen', 	'usuarios'),
('usu11@mail.com', 		'usuario11', 	'1234', 'Juan', 	'Gonzalez', 'usuarios'),
('usu12@mail.com', 		'usuario12', 	'1234', 'Pepe', 	'Gomez', 	'usuarios'),
('usu13@mail.com', 		'usuario13', 	'1234', 'Lola', 	'Garcia', 	'usuarios'),
('usu14@mail.com', 		'usuario14', 	'1234', 'Matt', 	'Dacal', 	'usuarios'),
('usu15@mail.com', 		'usuario15', 	'1234', 'Barry', 	'Alen', 	'usuarios'),
('usu16@mail.com', 		'usuario16', 	'1234', 'Juan', 	'Gonzalez', 'usuarios'),
('usu17@mail.com', 		'usuario17', 	'1234', 'Pepe', 	'Gomez', 	'usuarios'),
('usu18@mail.com', 		'usuario18', 	'1234', 'Lola', 	'Garcia', 	'usuarios'),
('usu19@mail.com', 		'usuario19', 	'1234', 'Matt', 	'Dacal', 	'usuarios'),
('usu20@mail.com', 		'usuario20', 	'1234', 'Barry', 	'Alen', 	'usuarios');
UPDATE `tbl_empleado` SET `password_empleado` = '$2y$10$mH6cW.UpaVVk4YUGWI.NNeOhsorQr.WjGZlXi5DhJXz9uY9sUh5gC';

INSERT INTO `tbl_recurso` (`nombre_recurso`, `tipo_recurso`, `disp_recurso`) VALUES
('sala multidisciplinar 1', 	'sala multidisciplinar', 	'si'),
('sala multidisciplinar 2', 	'sala multidisciplinar', 	'si'),
('sala multidisciplinar 3', 	'sala multidisciplinar', 	'si'),
('sala multidisciplinar 4', 	'sala multidisciplinar', 	'si'),
('sala informática 1', 			'sala informática', 		'si'),
('sala informática 2', 			'sala informática', 		'si'),
('taller de cocina', 			'taller cocina', 			'si'),
('despacho para entrevistas 1', 'despacho entrevistas', 	'si'),
('despacho para entrevistas 2', 'despacho entrevistas', 	'si'),
('salón de actos', 				'salón actos', 				'si'),
('sala de reuniones', 			'sala reuniones', 			'si'),
('proyector portátil 1', 		'proyector portátil', 		'si'),
('proyector portátil 2', 		'proyector portátil', 		'si'),
('portátil 1', 					'portátil', 				'si'),
('portátil 2', 					'portátil', 				'si'),
('portátil 3', 					'portátil', 				'si'),
('móbil 1', 					'móbil', 					'si'),
('móbil 2', 					'móbil', 					'si');

INSERT INTO `tbl_reserva` (`fechaInicio_reserva`, `fechaFinal_reserva`, `tiempoEstimado_reserva`, `finalizacion_reserva`, `id_empleado`, `id_recurso`) VALUES
/*Acabadas---------------*/
('2018-10-20 08:25:00', '2018-10-22 08:00:00', 	'48:00:00', 'bien', 		(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario01'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'portátil 1')),
('2018-10-21 09:45:00', '2018-10-21 13:00:00', 	'03:00:00', 'bien', 		(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario02'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'sala multidisciplinar 1')),
('2018-10-23 09:00:00', '2018-10-24 10:00:00', 	'27:00:00', 'bien', 		(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario03'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'proyector portátil 2')),
('2018-10-23 10:30:00', '2018-10-26 08:00:00', 	'72:00:00', 'bien', 		(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario04'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'móbil 1')),
('2018-10-24 12:00:00', '2018-10-24 18:00:00', 	'05:00:00', 'bien', 		(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario05'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'sala de reuniones')),
/*Pendientes---------------*/
('2018-10-25 08:00:00', NULL, 					'24:00:00', NULL, 			(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario06'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'portátil 1')),
('2018-10-25 09:00:00', NULL, 					'03:00:00', NULL, 			(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario07'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'portátil 2')),
('2018-10-25 09:00:00', NULL, 					'04:00:00', NULL, 			(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario08'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'taller de cocina')),
('2018-10-25 09:00:00', NULL, 					'01:00:00', NULL, 			(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario09'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'despacho para entrevistas 1')),
/*Incidencias---------------*/
('2018-10-26 08:25:00', '2018-10-26 08:30:00', 	'48:00:00', 'incidencia', 	(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario10'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'portátil 3')),
('2018-10-26 09:45:00', '2018-10-26 09:50:00', 	'03:00:00', 'incidencia', 	(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario11'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'sala multidisciplinar 1')),
('2018-10-26 09:00:00', '2018-10-26 09:05:00', 	'27:00:00', 'incidencia', 	(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario12'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'proyector portátil 2')),
('2018-10-26 10:30:00', '2018-10-26 10:35:00', 	'72:00:00', 'incidencia', 	(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario13'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'móbil 1')),
('2018-10-26 12:00:00', '2018-10-26 12:05:00', 	'05:00:00', 'incidencia', 	(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario14'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'sala de reuniones'));

UPDATE `tbl_recurso` SET `disp_recurso` = 'no' WHERE `tbl_recurso`.`nombre_recurso` = 'portátil 1';
UPDATE `tbl_recurso` SET `disp_recurso` = 'no' WHERE `tbl_recurso`.`nombre_recurso` = 'portátil 2';
UPDATE `tbl_recurso` SET `disp_recurso` = 'no' WHERE `tbl_recurso`.`nombre_recurso` = 'taller de cocina';
UPDATE `tbl_recurso` SET `disp_recurso` = 'no' WHERE `tbl_recurso`.`nombre_recurso` = 'despacho para entrevistas 1';



INSERT INTO `tbl_incidencia` (`titulo_incidencia`, `descripcion_incidencia`, `tiempoEstimado_incidencia`, `fechaInicio_incidencia`, `fechaFinal_incidencia`, `dispRecurso_incidencia`, `id_reserva`) VALUES
('Portatil no arranca', 	'Cuando enciendes el portatil se queda con la pantalla azul y no arranca.', '24:00:00', '2018-10-20 08:30:00', '2018-10-21 09:00:00', 'no', (SELECT `id_reserva` FROM `tbl_reserva` WHERE (`finalizacion_reserva` = 'incidencia') AND (`id_recurso` = (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'portátil 3')))),
('Portatil no arranca', 	'Cuando enciendes el portatil se queda con la pantalla azul y no arranca.', '24:00:00', '2018-10-26 08:30:00', NULL, 'no', (SELECT `id_reserva` FROM `tbl_reserva` WHERE (`finalizacion_reserva` = 'incidencia') AND (`id_recurso` = (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'portátil 3')))),
('Sala sucia', 				'La sala multidisciplinar esta muy sucia.', 								'24:00:00', '2018-10-26 09:50:00', NULL, 'si', (SELECT `id_reserva` FROM `tbl_reserva` WHERE (`finalizacion_reserva` = 'incidencia') AND (`id_recurso` = (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'sala multidisciplinar 1')))),
('Proyector funciona mal', 	'Cada cierto tiempo el proyector parpadea 4 veces.', 						'24:00:00', '2018-10-26 09:05:00', NULL, 'si', (SELECT `id_reserva` FROM `tbl_reserva` WHERE (`finalizacion_reserva` = 'incidencia') AND (`id_recurso` = (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'proyector portátil 2')))),
('Mobil roto', 				'El mobil no se enciende', 													'24:00:00', '2018-10-26 10:35:00', NULL, 'no', (SELECT `id_reserva` FROM `tbl_reserva` WHERE (`finalizacion_reserva` = 'incidencia') AND (`id_recurso` = (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'móbil 1')))),
('La mesa esta rota', 		'A la mesa de la sala le faltan dos patas.', 								'24:00:00', '2018-10-26 12:05:00', NULL, 'no', (SELECT `id_reserva` FROM `tbl_reserva` WHERE (`finalizacion_reserva` = 'incidencia') AND (`id_recurso` = (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'sala de reuniones'))));

UPDATE `tbl_recurso` SET `disp_recurso` = 'no' WHERE `tbl_recurso`.`nombre_recurso` = 'portátil 3';
UPDATE `tbl_recurso` SET `disp_recurso` = 'no' WHERE `tbl_recurso`.`nombre_recurso` = 'móbil 1';
UPDATE `tbl_recurso` SET `disp_recurso` = 'no' WHERE `tbl_recurso`.`nombre_recurso` = 'sala de reuniones';