# Host: localhost  (Version: 5.5.24-log)
# Date: 2014-10-15 02:53:29
# Generator: MySQL-Front 5.3  (Build 4.136)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "curso"
#

CREATE TABLE `curso` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(20) NOT NULL,
  `CONTENIDO` varchar(100) NOT NULL,
  `PRERREQUISITOS` varchar(100) DEFAULT NULL,
  `ESPECIALIDAD` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for table "horario"
#

CREATE TABLE `horario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `HORA_INICIO` time NOT NULL,
  `HORA_FIN` time NOT NULL,
  `NUM_HORAS` int(11) NOT NULL,
  `DETALLE` enum('LUNES-VIERNES','SABADO-DOMINGO') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for table "curso_edicion"
#

CREATE TABLE `curso_edicion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FINALIZACION` date NOT NULL,
  `AULA` varchar(20) NOT NULL,
  `NRO_ESTUDIANTES` int(11) NOT NULL,
  `CURSO_ID` int(11) NOT NULL,
  `HORARIO_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_RELATIONSHIP_8` (`CURSO_ID`),
  KEY `fk_curso_edicion_horario1_idx` (`HORARIO_ID`),
  CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`CURSO_ID`) REFERENCES `curso` (`ID`),
  CONSTRAINT `fk_curso_edicion_horario1` FOREIGN KEY (`HORARIO_ID`) REFERENCES `horario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for table "material_didactico"
#

CREATE TABLE `material_didactico` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "curso_has_mat_didactico"
#

CREATE TABLE `curso_has_mat_didactico` (
  `MAT_DIDACTICO_ID` int(11) NOT NULL,
  `CURSO_ID` int(11) NOT NULL,
  PRIMARY KEY (`MAT_DIDACTICO_ID`,`CURSO_ID`),
  KEY `FK_CURSO_HAS_MAT_DIDACTICO2` (`CURSO_ID`),
  CONSTRAINT `FK_CURSO_HAS_MAT_DIDACTICO` FOREIGN KEY (`MAT_DIDACTICO_ID`) REFERENCES `material_didactico` (`ID`),
  CONSTRAINT `FK_CURSO_HAS_MAT_DIDACTICO2` FOREIGN KEY (`CURSO_ID`) REFERENCES `curso` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "persona"
#

CREATE TABLE `persona` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CEDULA_UNIQUE` (`CEDULA`),
  UNIQUE KEY `RUC_UNIQUE` (`RUC`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

#
# Structure for table "formulario"
#

CREATE TABLE `formulario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  CONSTRAINT `FK_RELATIONSHIP_16` FOREIGN KEY (`ESTUDIANTE_ID`) REFERENCES `persona` (`ID`),
  CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`INSTRUCTOR_ID`) REFERENCES `persona` (`ID`),
  CONSTRAINT `FK_RELATIONSHIP_20` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "faltas_estudiante"
#

CREATE TABLE `faltas_estudiante` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NRO_FALTAS` int(11) NOT NULL,
  `TOTAL_DIAS_CURSO` int(11) NOT NULL,
  `PERSONA_ID` int(11) NOT NULL,
  `CURSO_EDICION_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_RELATIONSHIP_14` (`CURSO_EDICION_ID`),
  KEY `FK_RELATIONSHIP_15` (`PERSONA_ID`),
  CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`),
  CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`PERSONA_ID`) REFERENCES `persona` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for table "evaluacion_estudiante"
#

CREATE TABLE `evaluacion_estudiante` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOTA` int(11) NOT NULL,
  `PERSONA_ID` int(11) NOT NULL,
  `CURSO_EDICION_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_RELATIONSHIP_12` (`PERSONA_ID`),
  KEY `FK_RELATIONSHIP_13` (`CURSO_EDICION_ID`),
  CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`PERSONA_ID`) REFERENCES `persona` (`ID`),
  CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

#
# Structure for table "curso_edicion_has_personas"
#

CREATE TABLE `curso_edicion_has_personas` (
  `PERSONA_ID` int(11) NOT NULL,
  `CURSO_EDICION_ID` int(11) NOT NULL,
  PRIMARY KEY (`PERSONA_ID`,`CURSO_EDICION_ID`),
  KEY `FK_CURSO_HAS_PERSONAS2` (`CURSO_EDICION_ID`),
  CONSTRAINT `FK_CURSO_HAS_PERSONAS` FOREIGN KEY (`PERSONA_ID`) REFERENCES `persona` (`ID`),
  CONSTRAINT `FK_CURSO_HAS_PERSONAS2` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "certificado"
#

CREATE TABLE `certificado` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ENTREGADO` enum('SI','NO') NOT NULL,
  `PERSONA_ID` int(11) NOT NULL,
  `CURSO_EDICION_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_RELATIONSHIP_18` (`PERSONA_ID`),
  KEY `FK_RELATIONSHIP_19` (`CURSO_EDICION_ID`),
  CONSTRAINT `FK_RELATIONSHIP_18` FOREIGN KEY (`PERSONA_ID`) REFERENCES `persona` (`ID`),
  CONSTRAINT `FK_RELATIONSHIP_19` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "centro_recaudacion_depositos"
#

CREATE TABLE `centro_recaudacion_depositos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NRO_FACTURA` varchar(20) NOT NULL,
  `VALOR` decimal(10,2) NOT NULL,
  `PERSONA_ID` int(11) NOT NULL,
  `CURSO_EDICION_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_RELATIONSHIP_10` (`CURSO_EDICION_ID`),
  KEY `FK_RELATIONSHIP_9` (`PERSONA_ID`),
  CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`),
  CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`PERSONA_ID`) REFERENCES `persona` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "banco"
#

CREATE TABLE `banco` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NRO_CUENTA` varchar(20) NOT NULL,
  `TIPO_CUENTA` enum('AHORRO','CORRIENTE') NOT NULL,
  `NOMBRE_BANCO` varchar(20) NOT NULL,
  `SALDO` decimal(10,2) NOT NULL,
  `PERSONA_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_banco_persona1_idx` (`PERSONA_ID`),
  CONSTRAINT `fk_banco_persona1` FOREIGN KEY (`PERSONA_ID`) REFERENCES `persona` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for table "banco_deposito"
#

CREATE TABLE `banco_deposito` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NRO_COMPROBANTE` varchar(20) NOT NULL,
  `VALOR` decimal(10,2) NOT NULL,
  `BANCO_ID` int(11) NOT NULL,
  `CURSO_EDICION_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NRO_COMPROBANTE_UNIQUE` (`NRO_COMPROBANTE`),
  KEY `FK_RELATIONSHIP_11` (`BANCO_ID`),
  KEY `fk_banco_deposito_curso_edicion1_idx` (`CURSO_EDICION_ID`),
  CONSTRAINT `fk_banco_deposito_curso_edicion1` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`BANCO_ID`) REFERENCES `banco` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Procedure "pa_detalles_instructor"
#

CREATE PROCEDURE `pa_detalles_instructor`(cedulaIns varchar(20))
BEGIN
select cu.nombre as nombre_curso, ce.id as edicion_id, ce.fecha_inicio, ce.fecha_finalizacion, bd.valor
from curso cu inner join curso_edicion ce on cu.id=ce.curso_id
inner join banco_deposito bd on ce.id=bd.curso_edicion_id
inner join banco ba on bd.banco_id=ba.id
inner join persona pe on ba.persona_id=pe.id
where pe.cedula=cedulaIns and pe.tipo_persona='INSTRUCTOR';
END;

#
# Trigger "control_num_matriculas"
#

CREATE DEFINER='root'@'localhost' TRIGGER `bdd3-project`.`control_num_matriculas` AFTER INSERT ON `bdd3-project`.`curso_edicion_has_personas`
  FOR EACH ROW begin
DECLARE num_estudiantes int(11);
DECLARE condicion varchar(20);
-- select num-estudiantes de la edición del curso
select NRO_ESTUDIANTES into num_estudiantes from curso_edicion
where id=new.curso_edicion_id;
-- select de comprobación del tipo de persona registrada
select TIPO_PERSONA into condicion from persona
where id=new.persona_id;
if condicion='ESTUDIANTE' then
	if num_estudiantes < 25 then
		update curso_edicion set NRO_ESTUDIANTES=NRO_ESTUDIANTES+1
		where id=new.CURSO_EDICION_ID;
	else
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'CUPO LLENO!' ;
	end if;
end if;
end;

#
# Trigger "curso_aprobado"
#

CREATE DEFINER='root'@'localhost' TRIGGER `bdd3-project`.`curso_aprobado` AFTER INSERT ON `bdd3-project`.`evaluacion_estudiante`
  FOR EACH ROW begin
DECLARE num_faltas int(11);
DECLARE total_dias int(11);
DECLARE porcentaje_faltas decimal(10,2);
if new.nota >= 7 then
	-- num-faltas --
	select fe.nro_faltas into num_faltas
		from faltas_estudiante fe
		where fe.persona_id=new.persona_id
			and fe.curso_edicion_id=new.curso_edicion_id;
	-- total-dias-curso --
	select fe.total_dias_curso into total_dias
		from faltas_estudiante fe
		where fe.persona_id=new.persona_id
			and fe.curso_edicion_id=new.curso_edicion_id;
	-- porcentaje --
	set porcentaje_faltas = num_faltas * 100 / total_dias;
	-- 2da comparacion porcentaje
	if porcentaje_faltas < 40 then
		update persona set nro_cursos_aprobados=nro_cursos_aprobados+1
			where id=new.persona_id;
	-- SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = new.persona_id;
	end if;
	/*delete from faltas_estudiante where id=2;*/
end if;
end;
