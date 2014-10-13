﻿# Host: localhost  (Version: 5.6.12)
# Date: 2014-10-12 23:00:35
# Generator: MySQL-Front 5.3  (Build 4.136)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "banco"
#

DROP TABLE IF EXISTS `banco`;
CREATE TABLE `banco` (
  `ID` int(11) NOT NULL,
  `NRO_CUENTA` varchar(20) NOT NULL,
  `TIPO_CUENTA` enum('AHORRO','CORRIENTE') NOT NULL,
  `NOMBRE_BANCO` varchar(20) NOT NULL,
  `SALDO` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "banco_deposito"
#

DROP TABLE IF EXISTS `banco_deposito`;
CREATE TABLE `banco_deposito` (
  `ID` int(11) NOT NULL,
  `NRO_COMPROBANTE` varchar(20) NOT NULL,
  `VALOR` decimal(10,2) NOT NULL,
  `BANCO_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NRO_COMPROBANTE_UNIQUE` (`NRO_COMPROBANTE`),
  KEY `FK_RELATIONSHIP_11` (`BANCO_ID`),
  CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`BANCO_ID`) REFERENCES `banco` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "curso"
#

DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `CONTENIDO` varchar(100) NOT NULL,
  `PRERREQUISITOS` varchar(100) DEFAULT NULL,
  `ESPECIALIDAD` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "curso_edicion"
#

DROP TABLE IF EXISTS `curso_edicion`;
CREATE TABLE `curso_edicion` (
  `ID` int(11) NOT NULL,
  `HORARIO` varchar(20) NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FINALIZACION` date NOT NULL,
  `AULA` varchar(20) NOT NULL,
  `NRO_ESTUDIANTES` int(11) NOT NULL,
  `CURSO_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_RELATIONSHIP_8` (`CURSO_ID`),
  CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`CURSO_ID`) REFERENCES `curso` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "material_didactico"
#

DROP TABLE IF EXISTS `material_didactico`;
CREATE TABLE `material_didactico` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "curso_has_mat_didactico"
#

DROP TABLE IF EXISTS `curso_has_mat_didactico`;
CREATE TABLE `curso_has_mat_didactico` (
  `MAT_DIDACTICO_ID` int(11) NOT NULL,
  `CURSO_ID` int(11) NOT NULL,
  PRIMARY KEY (`MAT_DIDACTICO_ID`,`CURSO_ID`),
  KEY `FK_CURSO_HAS_MAT_DIDACTICO2` (`CURSO_ID`),
  CONSTRAINT `FK_CURSO_HAS_MAT_DIDACTICO2` FOREIGN KEY (`CURSO_ID`) REFERENCES `curso` (`ID`),
  CONSTRAINT `FK_CURSO_HAS_MAT_DIDACTICO` FOREIGN KEY (`MAT_DIDACTICO_ID`) REFERENCES `material_didactico` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "persona"
#

DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `ID` int(11) NOT NULL,
  `CEDULA` varchar(20) NOT NULL,
  `RUC` varchar(20) DEFAULT NULL,
  `NOMBRES` varchar(20) NOT NULL,
  `APELLIDOS` varchar(20) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `TELEFONO` varchar(20) NOT NULL,
  `TITULOS_ACADEMICOS` varchar(70) DEFAULT NULL,
  `LUGAR_TRABAJO` varchar(20) NOT NULL,
  `TIPO_PERSONA` enum('ESTUDIANTE','PARTICULAR','INSTRUCTOR') NOT NULL,
  `NRO_CURSOS_APROBADOS` int(11) DEFAULT NULL,
  `BANCO_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CEDULA_UNIQUE` (`CEDULA`),
  UNIQUE KEY `RUC_UNIQUE` (`RUC`),
  KEY `FK_RELATIONSHIP_7` (`BANCO_ID`),
  CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`BANCO_ID`) REFERENCES `banco` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "formulario"
#

DROP TABLE IF EXISTS `formulario`;
CREATE TABLE `formulario` (
  `ID` int(11) NOT NULL,
  `CONOCIMIENTOS` int(11) DEFAULT NULL,
  `PUNTUALIDAD` int(11) DEFAULT NULL,
  `MAT_DIDACTICO` int(11) DEFAULT NULL,
  `FORMA_ENSENANZA` int(11) DEFAULT NULL,
  `ESTUDIANTE_ID` int(11) NOT NULL,
  `INSTRUCTOR_ID` int(11) NOT NULL,
  `CURSO_EDICION_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_RELATIONSHIP_16` (`ESTUDIANTE_ID`),
  KEY `FK_RELATIONSHIP_17` (`INSTRUCTOR_ID`),
  KEY `FK_RELATIONSHIP_20` (`CURSO_EDICION_ID`),
  CONSTRAINT `FK_RELATIONSHIP_20` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`),
  CONSTRAINT `FK_RELATIONSHIP_16` FOREIGN KEY (`ESTUDIANTE_ID`) REFERENCES `persona` (`ID`),
  CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`INSTRUCTOR_ID`) REFERENCES `persona` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "faltas_estudiante"
#

DROP TABLE IF EXISTS `faltas_estudiante`;
CREATE TABLE `faltas_estudiante` (
  `ID` int(11) NOT NULL,
  `NRO_FALTAS` int(11) NOT NULL,
  `TOTAL_DIAS_CURSO` int(11) NOT NULL,
  `PERSONA_ID` int(11) NOT NULL,
  `CURSO_EDICION_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_RELATIONSHIP_14` (`CURSO_EDICION_ID`),
  KEY `FK_RELATIONSHIP_15` (`PERSONA_ID`),
  CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`PERSONA_ID`) REFERENCES `persona` (`ID`),
  CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "evaluacion_estudiante"
#

DROP TABLE IF EXISTS `evaluacion_estudiante`;
CREATE TABLE `evaluacion_estudiante` (
  `ID` int(11) NOT NULL,
  `NOTA` int(11) NOT NULL,
  `PERSONA_ID` int(11) NOT NULL,
  `CURSO_EDICION_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_RELATIONSHIP_12` (`PERSONA_ID`),
  KEY `FK_RELATIONSHIP_13` (`CURSO_EDICION_ID`),
  CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`),
  CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`PERSONA_ID`) REFERENCES `persona` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "curso_edicion_has_personas"
#

DROP TABLE IF EXISTS `curso_edicion_has_personas`;
CREATE TABLE `curso_edicion_has_personas` (
  `PERSONA_ID` int(11) NOT NULL,
  `CURSO_EDICION_ID` int(11) NOT NULL,
  PRIMARY KEY (`PERSONA_ID`,`CURSO_EDICION_ID`),
  KEY `FK_CURSO_HAS_PERSONAS2` (`CURSO_EDICION_ID`),
  CONSTRAINT `FK_CURSO_HAS_PERSONAS2` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`),
  CONSTRAINT `FK_CURSO_HAS_PERSONAS` FOREIGN KEY (`PERSONA_ID`) REFERENCES `persona` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "certificado"
#

DROP TABLE IF EXISTS `certificado`;
CREATE TABLE `certificado` (
  `ID` int(11) NOT NULL,
  `ENTREGADO` enum('SI','NO') NOT NULL,
  `PERSONA_ID` int(11) NOT NULL,
  `CURSO_EDICION_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_RELATIONSHIP_18` (`PERSONA_ID`),
  KEY `FK_RELATIONSHIP_19` (`CURSO_EDICION_ID`),
  CONSTRAINT `FK_RELATIONSHIP_19` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`),
  CONSTRAINT `FK_RELATIONSHIP_18` FOREIGN KEY (`PERSONA_ID`) REFERENCES `persona` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "centro_recaudacion_depositos"
#

DROP TABLE IF EXISTS `centro_recaudacion_depositos`;
CREATE TABLE `centro_recaudacion_depositos` (
  `ID` int(11) NOT NULL,
  `NRO_FACTURA` varchar(20) NOT NULL,
  `VALOR` decimal(10,2) NOT NULL,
  `PERSONA_ID` int(11) NOT NULL,
  `CURSO_EDICION_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_RELATIONSHIP_10` (`CURSO_EDICION_ID`),
  KEY `FK_RELATIONSHIP_9` (`PERSONA_ID`),
  CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`PERSONA_ID`) REFERENCES `persona` (`ID`),
  CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
