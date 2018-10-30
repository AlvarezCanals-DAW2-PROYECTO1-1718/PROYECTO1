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
`email_empleado` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`usuario_empleado` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`password_empleado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
`nombre_empleado` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`apellido_empleado` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`grupo_empleado` ENUM('usuarios', 'administradores') COLLATE utf8_unicode_ci DEFAULT 'usuarios',
PRIMARY KEY (`id_empleado`),
UNIQUE KEY `email_empleado` (`email_empleado`),
UNIQUE KEY `usuario_empleado` (`usuario_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `tbl_recurso` (
`id_recurso` int(11) COLLATE utf8_unicode_ci NOT NULL AUTO_INCREMENT,
`rutaArchivos_recurso` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'assets/images/recursos/',
`nombreArchivos_recurso` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`extensionArchivos_recurso` varchar(10) COLLATE utf8_unicode_ci DEFAULT '.jpg',
`nombre_recurso` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`descripcion_recurso` text COLLATE utf8_unicode_ci DEFAULT NULL,
`disp_recurso` ENUM('si', 'no') COLLATE utf8_unicode_ci DEFAULT 'si',
`id_tipoRecurso` int(11) COLLATE utf8_unicode_ci DEFAULT NULL,
PRIMARY KEY (`id_recurso`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `tbl_tipoRecurso` (
`id_tipoRecurso` int(11) COLLATE utf8_unicode_ci NOT NULL AUTO_INCREMENT,
`nombre_tipoRecurso` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
PRIMARY KEY (`id_tipoRecurso`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `tbl_reserva` (
`id_reserva` int(11) COLLATE utf8_unicode_ci NOT NULL AUTO_INCREMENT,
`descripcion_reserva` text COLLATE utf8_unicode_ci DEFAULT NULL,
`fechaInicio_reserva` DATETIME COLLATE utf8_unicode_ci DEFAULT CURRENT_TIMESTAMP,
`fechaFinal_reserva` DATETIME COLLATE utf8_unicode_ci DEFAULT NULL,
`tiempoEstimado_reserva` TIME COLLATE utf8_unicode_ci DEFAULT NULL,
`modoFinalizacion_reserva` ENUM('bien', 'incidencia') COLLATE utf8_unicode_ci DEFAULT NULL,
`id_empleado` int(11) COLLATE utf8_unicode_ci DEFAULT NULL,
`id_recurso` int(11) COLLATE utf8_unicode_ci DEFAULT NULL,
PRIMARY KEY (`id_reserva`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `tbl_incidencia` (
`id_incidencia` int(11) COLLATE utf8_unicode_ci NOT NULL AUTO_INCREMENT,
`titulo_incidencia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`descripcion_incidencia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`tiempoEstimado_incidencia` TIME COLLATE utf8_unicode_ci DEFAULT NULL,
`fechaInicio_incidencia` DATETIME COLLATE utf8_unicode_ci DEFAULT CURRENT_TIMESTAMP,
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

ALTER TABLE `tbl_recurso` ADD CONSTRAINT `FK_recurso_tipoRecurso` FOREIGN KEY (`id_tipoRecurso`)
REFERENCES `tbl_tipoRecurso` (`id_tipoRecurso`);



/*------------INSERTAR DATOS----------------------------------------------------------------------------------------------------------*/
/*------------INSERTAR DATOS----------------------------------------------------------------------------------------------------------*/
/*------------INSERTAR DATOS----------------------------------------------------------------------------------------------------------*/
/*------------INSERTAR DATOS----------------------------------------------------------------------------------------------------------*/
/*------------INSERTAR DATOS----------------------------------------------------------------------------------------------------------*/


INSERT INTO `tbl_empleado` (`email_empleado`, `usuario_empleado`, `password_empleado`, `nombre_empleado`, `apellido_empleado`, `grupo_empleado`) VALUES
('usuAdmin@mail.com', 	'usuarioAdmin', NULL, 'Javier', 'Idalgo', 	'administradores'),
('usu01@mail.com', 		'usuario01', 	NULL, 'Juan', 	'Gonzalez', 'usuarios'),
('usu02@mail.com', 		'usuario02', 	NULL, 'Pepe', 	'Gomez', 	'usuarios'),
('usu03@mail.com', 		'usuario03', 	NULL, 'Lola', 	'Garcia', 	'usuarios'),
('usu04@mail.com', 		'usuario04', 	NULL, 'Matt', 	'Dacal', 	'usuarios'),
('usu05@mail.com', 		'usuario05', 	NULL, 'Barry', 	'Alen', 	'usuarios'),
('usu06@mail.com', 		'usuario06', 	NULL, 'Juan', 	'Gonzalez', 'usuarios'),
('usu07@mail.com', 		'usuario07', 	NULL, 'Pepe', 	'Gomez', 	'usuarios'),
('usu08@mail.com', 		'usuario08', 	NULL, 'Lola', 	'Garcia', 	'usuarios'),
('usu09@mail.com', 		'usuario09', 	NULL, 'Matt', 	'Dacal', 	'usuarios'),
('usu10@mail.com', 		'usuario10', 	NULL, 'Barry', 	'Alen', 	'usuarios'),
('usu11@mail.com', 		'usuario11', 	NULL, 'Juan', 	'Gonzalez', 'usuarios'),
('usu12@mail.com', 		'usuario12', 	NULL, 'Pepe', 	'Gomez', 	'usuarios'),
('usu13@mail.com', 		'usuario13', 	NULL, 'Lola', 	'Garcia', 	'usuarios'),
('usu14@mail.com', 		'usuario14', 	NULL, 'Matt', 	'Dacal', 	'usuarios'),
('usu15@mail.com', 		'usuario15', 	NULL, 'Barry', 	'Alen', 	'usuarios'),
('usu16@mail.com', 		'usuario16', 	NULL, 'Juan', 	'Gonzalez', 'usuarios'),
('usu17@mail.com', 		'usuario17', 	NULL, 'Pepe', 	'Gomez', 	'usuarios'),
('usu18@mail.com', 		'usuario18', 	NULL, 'Lola', 	'Garcia', 	'usuarios'),
('usu19@mail.com', 		'usuario19', 	NULL, 'Matt', 	'Dacal', 	'usuarios'),
('usu20@mail.com', 		'usuario20', 	NULL, 'Barry', 	'Alen', 	'usuarios');
UPDATE `tbl_empleado` SET `password_empleado` = '$2y$10$mH6cW.UpaVVk4YUGWI.NNeOhsorQr.WjGZlXi5DhJXz9uY9sUh5gC';

INSERT INTO `tbl_tipoRecurso` (`nombre_tipoRecurso`) VALUES
('sala multidisciplinar'),
('sala informatica'),
('taller cocina'),
('despacho entrevistas'),
('salon actos'),
('sala reuniones'),
('proyector portatil'),
('portatil'),
('movil');

INSERT INTO `tbl_recurso` (`rutaArchivos_recurso`, `nombreArchivos_recurso`, `extensionArchivos_recurso`, `nombre_recurso`, `descripcion_recurso`, `disp_recurso`, `id_tipoRecurso`) VALUES
('assets/images/recursos/', 'salamultidisciplinar1', 	'.jpg', 'sala multidisciplinar 1', 		'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'sala multidisciplinar')),
('assets/images/recursos/', 'salamultidisciplinar2', 	'.jpg', 'sala multidisciplinar 2', 		'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'sala multidisciplinar')),
('assets/images/recursos/', 'salamultidisciplinar3', 	'.jpg', 'sala multidisciplinar 3', 		'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'sala multidisciplinar')),
('assets/images/recursos/', 'salamultidisciplinar4', 	'.jpg', 'sala multidisciplinar 4', 		'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'sala multidisciplinar')),
('assets/images/recursos/', 'salainformatica1', 		'.jpg', 'sala informática 1', 			'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'sala informatica')),
('assets/images/recursos/', 'salainformatica2', 		'.jpg', 'sala informática 2', 			'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'sala informatica')),
('assets/images/recursos/', 'tallerdecocina1', 			'.jpg', 'taller de cocina 1', 			'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'taller cocina')),
('assets/images/recursos/', 'despachoparaentrevistas1', '.jpg', 'despacho para entrevistas 1', 	'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'despacho entrevistas')),
('assets/images/recursos/', 'despachoparaentrevistas2', '.jpg', 'despacho para entrevistas 2', 	'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'despacho entrevistas')),
('assets/images/recursos/', 'salondeactos1', 			'.jpg', 'salón de actos 1', 			'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'salon actos')),
('assets/images/recursos/', 'saladereuniones1', 		'.jpg', 'sala de reuniones 1', 			'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'sala reuniones')),
('assets/images/recursos/', 'proyectorportatil1', 		'.jpg', 'proyector portátil 1', 		'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'proyector portatil')),
('assets/images/recursos/', 'proyectorportatil2', 		'.jpg', 'proyector portátil 2', 		'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'proyector portatil')),
('assets/images/recursos/', 'portatil1', 				'.jpg', 'portátil 1', 					'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'portatil')),
('assets/images/recursos/', 'portatil2', 				'.jpg', 'portátil 2', 					'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'portatil')),
('assets/images/recursos/', 'portatil3', 				'.jpg', 'portátil 3', 					'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'portatil')),
('assets/images/recursos/', 'movil1', 					'.jpg', 'móvil 1', 						'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'movil')),
('assets/images/recursos/', 'movil2', 					'.jpg', 'móvil 2', 						'Caracteristicas', 'si', (SELECT `id_tipoRecurso` FROM `tbl_tipoRecurso` WHERE `nombre_tipoRecurso` = 'movil'));

INSERT INTO `tbl_reserva` (`descripcion_reserva`, `fechaInicio_reserva`, `fechaFinal_reserva`, `tiempoEstimado_reserva`, `modoFinalizacion_reserva`, `id_empleado`, `id_recurso`) VALUES
/*Acabadas---------------*/
('reserva01', '2018-10-20 08:25:00', '2018-10-22 08:00:00', '48:00:00', 'bien', 		(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario01'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'portátil 1')),
('reserva02', '2018-10-21 09:45:00', '2018-10-21 13:00:00', '03:00:00', 'bien', 		(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario02'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'sala multidisciplinar 1')),
('reserva03', '2018-10-23 09:00:00', '2018-10-24 10:00:00', '27:00:00', 'bien', 		(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario03'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'proyector portátil 2')),
('reserva04', '2018-10-23 10:30:00', '2018-10-26 08:00:00', '72:00:00', 'bien', 		(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario04'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'móvil 1')),
('reserva05', '2018-10-24 12:00:00', '2018-10-24 18:00:00', '05:00:00', 'bien', 		(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario05'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'sala de reuniones')),
/*Pendientes---------------*/
('reserva06', '2018-10-25 08:00:00', NULL, 					'24:00:00', NULL, 			(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario06'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'portátil 1')),
('reserva07', '2018-10-25 09:00:00', NULL, 					'03:00:00', NULL, 			(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario07'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'portátil 2')),
('reserva08', '2018-10-25 09:00:00', NULL, 					'04:00:00', NULL, 			(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario08'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'taller de cocina')),
('reserva09', '2018-10-25 09:00:00', NULL, 					'01:00:00', NULL, 			(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario09'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'despacho para entrevistas 1')),
/*Incidencias---------------*/
('reserva10', '2018-10-26 08:25:00', '2018-10-26 08:30:00', '48:00:00', 'incidencia', 	(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario10'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'portátil 1')),
('reserva11', '2018-10-26 08:25:00', '2018-10-26 08:30:00', '48:00:00', 'incidencia', 	(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario11'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'portátil 3')),
('reserva12', '2018-10-26 09:45:00', '2018-10-26 09:50:00', '03:00:00', 'incidencia', 	(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario12'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'sala multidisciplinar 1')),
('reserva13', '2018-10-26 09:00:00', '2018-10-26 09:05:00', '27:00:00', 'incidencia', 	(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario13'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'proyector portátil 2')),
('reserva14', '2018-10-26 10:30:00', '2018-10-26 10:35:00', '72:00:00', 'incidencia', 	(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario14'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'móvil 1')),
('reserva15', '2018-10-26 12:00:00', '2018-10-26 12:05:00', '05:00:00', 'incidencia', 	(SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario15'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'sala de reuniones'));
/*No disponibles por reservas---------------*/
UPDATE `tbl_recurso` SET `disp_recurso` = 'no' WHERE `tbl_recurso`.`nombre_recurso` = 'portátil 1';
UPDATE `tbl_recurso` SET `disp_recurso` = 'no' WHERE `tbl_recurso`.`nombre_recurso` = 'portátil 2';
UPDATE `tbl_recurso` SET `disp_recurso` = 'no' WHERE `tbl_recurso`.`nombre_recurso` = 'taller de cocina';
UPDATE `tbl_recurso` SET `disp_recurso` = 'no' WHERE `tbl_recurso`.`nombre_recurso` = 'despacho para entrevistas 1';



INSERT INTO `tbl_incidencia` (`titulo_incidencia`, `descripcion_incidencia`, `tiempoEstimado_incidencia`, `fechaInicio_incidencia`, `fechaFinal_incidencia`, `dispRecurso_incidencia`, `id_reserva`) VALUES
('Portatil inutilizable', 	'No tiene bateria y el cargador no funciona.', 								'12:00:00', '2018-10-20 08:30:00', '2018-10-21 09:00:00', 	'no', (SELECT `id_reserva` FROM `tbl_reserva` WHERE (`modoFinalizacion_reserva` = 'incidencia') AND (`id_recurso` = (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'portátil 1')))),
('Portatil no arranca', 	'Cuando enciendes el portatil se queda con la pantalla azul y no arranca.', '24:00:00', '2018-10-26 08:30:00', NULL, 					'no', (SELECT `id_reserva` FROM `tbl_reserva` WHERE (`modoFinalizacion_reserva` = 'incidencia') AND (`id_recurso` = (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'portátil 3')))),
('Sala sucia', 				'La sala multidisciplinar esta muy sucia.', 								'24:00:00', '2018-10-26 09:50:00', NULL, 					'si', (SELECT `id_reserva` FROM `tbl_reserva` WHERE (`modoFinalizacion_reserva` = 'incidencia') AND (`id_recurso` = (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'sala multidisciplinar 1')))),
('Proyector funciona mal', 	'Cada cierto tiempo el proyector parpadea 4 veces.', 						'24:00:00', '2018-10-26 09:05:00', NULL, 					'si', (SELECT `id_reserva` FROM `tbl_reserva` WHERE (`modoFinalizacion_reserva` = 'incidencia') AND (`id_recurso` = (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'proyector portátil 2')))),
('Móvil roto', 				'El móvil no se enciende', 													'24:00:00', '2018-10-26 10:35:00', NULL, 					'no', (SELECT `id_reserva` FROM `tbl_reserva` WHERE (`modoFinalizacion_reserva` = 'incidencia') AND (`id_recurso` = (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'móvil 1')))),
('La mesa esta rota', 		'A la mesa de la sala le faltan dos patas.', 								'24:00:00', '2018-10-26 12:05:00', NULL, 					'no', (SELECT `id_reserva` FROM `tbl_reserva` WHERE (`modoFinalizacion_reserva` = 'incidencia') AND (`id_recurso` = (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'sala de reuniones'))));

UPDATE `tbl_recurso` SET `disp_recurso` = 'no' WHERE `tbl_recurso`.`nombre_recurso` = 'portátil 3';
UPDATE `tbl_recurso` SET `disp_recurso` = 'no' WHERE `tbl_recurso`.`nombre_recurso` = 'móvil 1';
UPDATE `tbl_recurso` SET `disp_recurso` = 'no' WHERE `tbl_recurso`.`nombre_recurso` = 'sala de reuniones';