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
PRIMARY KEY (`id_empleado`),
UNIQUE KEY `email_empleado` (`email_empleado`),
UNIQUE KEY `usuario_empleado` (`usuario_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `tbl_recurso` (
`id_recurso` int(11) COLLATE utf8_unicode_ci NOT NULL AUTO_INCREMENT,
`nombre_recurso` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`tipo_recurso` ENUM('sala multidisciplinar', 'sala informática', 'taller cocina', 'despacho entrevistas', "salón actos", 'sala reuniones', 'proyector portátil', 'portátil', 'móbil') COLLATE utf8_unicode_ci DEFAULT NULL,
`disponibilidad_recurso` ENUM('si', 'no', 'incidencia') COLLATE utf8_unicode_ci DEFAULT NULL,
PRIMARY KEY (`id_recurso`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `tbl_reserva` (
`id_reserva` int(11) COLLATE utf8_unicode_ci NOT NULL AUTO_INCREMENT,
`cantidadRecurso_reserva` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`fechaInicio_reserva` DATETIME COLLATE utf8_unicode_ci DEFAULT NULL,
`fechaFinal_reserva` DATETIME COLLATE utf8_unicode_ci DEFAULT NULL,
`tiempoEstimado_reserva` TIME COLLATE utf8_unicode_ci DEFAULT NULL,
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


INSERT INTO `tbl_empleado` (`email_empleado`, `usuario_empleado`, `password_empleado`, `nombre_empleado`, `apellido_empleado`) VALUES
('usu1@mail.com', 'usuario1', '1234', 'Juan', 'Gonzalez'),
('usu2@mail.com', 'usuario2', '1234', 'Pepe', 'Gomez'),
('usu3@mail.com', 'usuario3', '1234', 'Lola', 'Garcia'),
('usu4@mail.com', 'usuario4', '1234', 'Matt', 'Dacal'),
('usu5@mail.com', 'usuario5', '1234', 'Carol', 'Eisermann');

INSERT INTO `tbl_recurso` (`nombre_recurso`, `tipo_recurso`, `disponibilidad_recurso`) VALUES
('sala multidisciplinar 1', 'sala multidisciplinar', 'si'),
('sala multidisciplinar 2', 'sala multidisciplinar', 'si'),
('sala multidisciplinar 3', 'sala multidisciplinar', 'si'),
('sala multidisciplinar 4', 'sala multidisciplinar', 'si'),
('sala informática 1', 'sala informática', 'si'),
('sala informática 2', 'sala informática', 'si'),
('taller de cocina', 'taller cocina', 'si'),
('despacho para entrevistas 1', 'despacho entrevistas', 'si'),
('despacho para entrevistas 2', 'despacho entrevistas', 'si'),
('salón de actos', 'salón actos', 'si'),
('sala de reuniones', 'sala reuniones', 'si'),
('proyector portátil 1', 'proyector portátil', 'si'),
('proyector portátil 2', 'proyector portátil', 'si'),
('portátil 1', 'portátil', 'si'),
('portátil 2', 'portátil', 'si'),
('portátil 3', 'portátil', 'si'),
('móbil 1', 'móbil', 'si'),
('móbil 2', 'móbil', 'si');

INSERT INTO `tbl_reserva` (`cantidadRecurso_reserva`, `fechaInicio_reserva`, `fechaFinal_reserva`, `tiempoEstimado_reserva`, `id_empleado`, `id_recurso`) VALUES
('1', '2017-11-11 10:25:00', '2017-11-12 08:00:00', '02:15:00', (SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario1'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'sala multidisciplinar 1')),
('1', '2018-7-10 09:00:00', '2018-7-10 09:05:00', '01:00:00', (SELECT `id_empleado` FROM `tbl_empleado` WHERE `usuario_empleado` = 'usuario2'), (SELECT `id_recurso` FROM `tbl_recurso` WHERE `nombre_recurso` = 'portátil 1'));

/*UPDATE `tbl_recurso` SET `disponibilidad_recurso` = 'no' WHERE `tbl_recurso`.`nombre_recurso` = 'sala multidisciplinar 1';*/



INSERT INTO `tbl_incidencia` (`titulo_incidencia`, `descripcion_incidencia`, `tiempoEstimado_incidencia`, `fechaInicio_incidencia`, `fechaFinal_incidencia`, `id_reserva`) VALUES
('portatil no arranca', 'cuando enciendes el portatil se queda con la pantalla azul y no arranca', '20:00:00', '2018-7-10 09:05:00', '2018-7-11 09:00:00', '2');

/*UPDATE `tbl_recurso` SET `disponibilidad_recurso` = 'incidencia' WHERE `tbl_recurso`.`nombre_recurso` = 'portátil 1';*/
