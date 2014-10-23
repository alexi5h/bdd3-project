# Host: localhost  (Version: 5.7.3-m13)
# Date: 2014-10-22 23:24:56
# Generator: MySQL-Front 5.3  (Build 4.175)

/*!40101 SET NAMES latin1 */;

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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Structure for table "edicion_curso"
#

CREATE TABLE `edicion_curso` (
  `ID` int(11) NOT NULL,
  `ID_CURSO` int(11) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `CONTENIDO` varchar(100) NOT NULL,
  `PRERREQUISITOS` varchar(100) NOT NULL,
  `ESPECIALIDAD` varchar(20) NOT NULL,
  `ID_EDICION` int(11) NOT NULL,
  `NRO_EDICION` int(11) NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FINALIZACION` date NOT NULL,
  `AULA` varchar(20) NOT NULL,
  `NRO_ESTUDIANTES` int(11) NOT NULL,
  `HORARIO_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for table "curso_edicion"
#

CREATE TABLE `curso_edicion` (
  `ID` int(11) NOT NULL,
  `NRO_EDICION` int(11) NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FINALIZACION` date NOT NULL,
  `AULA` varchar(20) NOT NULL,
  `NRO_ESTUDIANTES` int(11) NOT NULL,
  `CURSO_ID` int(11) NOT NULL,
  `HORARIO_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_curso_edicion_horario1_idx` (`HORARIO_ID`),
  CONSTRAINT `fk_curso_edicion_horario1` FOREIGN KEY (`HORARIO_ID`) REFERENCES `horario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  KEY `FK_RELATIONSHIP_20` (`CURSO_EDICION_ID`),
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
  CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`)
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
  KEY `FK_RELATIONSHIP_13` (`CURSO_EDICION_ID`),
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
  CONSTRAINT `FK_CURSO_HAS_PERSONAS2` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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
  CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`)
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
  KEY `FK_RELATIONSHIP_19` (`CURSO_EDICION_ID`),
  CONSTRAINT `FK_RELATIONSHIP_19` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `CURSO_EDICION_ID` int(11) NOT NULL,
  PRIMARY KEY (`MAT_DIDACTICO_ID`,`CURSO_EDICION_ID`),
  KEY `fk_curso_has_mat_didactico_curso_edicion1_idx` (`CURSO_EDICION_ID`),
  CONSTRAINT `fk_curso_has_mat_didactico_curso_edicion1` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_CURSO_HAS_MAT_DIDACTICO` FOREIGN KEY (`MAT_DIDACTICO_ID`) REFERENCES `material_didactico` (`ID`)
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
  `TIPO_PERSONA` int(3) NOT NULL,
  `NRO_CURSOS_APROBADOS` int(11) DEFAULT NULL,
  `FOTO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`,`TIPO_PERSONA`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

#
# Procedure "pa_detalles_curso_edicion"
#

CREATE PROCEDURE `pa_detalles_curso_edicion`(codigoCurso int(11), numEdicion int(11))
BEGIN
select concat(concat(ho.hora_inicio,' '), ho.hora_fin) as horario, ce.aula, concat(concat(pe.nombres,' '),pe.apellidos) as instructor
from curso_edicion ce inner join curso_edicion_has_personas cep on cep.curso_edicion_id=ce.id
inner join horario ho on ce.horario_id=ho.id
inner join persona pe on cep.persona_id=pe.id
where pe.tipo_persona='INSTRUCTOR' and ce.curso_id=codigoCurso and ce.nro_edicion=numEdicion;
END;

#
# Procedure "pa_detalles_instructor"
#

CREATE PROCEDURE `pa_detalles_instructor`(cedulaIns varchar(20))
BEGIN
select distinct cu.nombre as nombre_curso, ce.nro_edicion as num_edicion, ce.fecha_inicio, ce.fecha_finalizacion, bd.valor
from curso_edicion ce inner join curso cu on cu.id=ce.curso_id
inner join banco_deposito bd on ce.id=bd.curso_edicion_id
inner join banco ba on bd.banco_id=ba.id
inner join persona pe on ba.persona_id=pe.id
inner join curso_edicion_has_personas cep on cep.curso_edicion_id=ce.id and cep.persona_id=pe.id
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
