# Host: localhost  (Version: 5.6.12)
# Date: 2014-11-07 01:08:15
# Generator: MySQL-Front 5.3  (Build 4.136)

/*!40101 SET NAMES utf8 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CURSO` int(11) DEFAULT NULL,
  `NOMBRE` varchar(20) DEFAULT NULL,
  `CONTENIDO` varchar(100) DEFAULT NULL,
  `PRERREQUISITOS` varchar(100) DEFAULT NULL,
  `ESPECIALIDAD` varchar(20) DEFAULT NULL,
  `ID_EDICION` int(11) DEFAULT NULL,
  `NRO_EDICION` int(11) DEFAULT NULL,
  `FECHA_INICIO` date DEFAULT NULL,
  `FECHA_FINALIZACION` date DEFAULT NULL,
  `AULA` varchar(20) DEFAULT NULL,
  `NRO_ESTUDIANTES` int(11) DEFAULT NULL,
  `HORARIO_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

#
# Structure for table "estadisticas"
#

CREATE TABLE `estadisticas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CURSO` varchar(45) NOT NULL,
  `NRO_INSTANCIA` int(11) NOT NULL,
  `NOM_APE_PROFESOR` varchar(100) NOT NULL,
  `PAGO_A_PROFESOR` decimal(10,2) NOT NULL DEFAULT '0.00',
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FIN` date NOT NULL,
  `NRO_ESTUDIANTES` int(11) NOT NULL,
  `TOTAL_POR_MATRICULAS` decimal(10,2) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Structure for table "curso_edicion"
#

CREATE TABLE `curso_edicion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  CONSTRAINT `FK_CURSO_HAS_MAT_DIDACTICO` FOREIGN KEY (`MAT_DIDACTICO_ID`) REFERENCES `material_didactico` (`ID`),
  CONSTRAINT `fk_curso_has_mat_didactico_curso_edicion1` FOREIGN KEY (`CURSO_EDICION_ID`) REFERENCES `curso_edicion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `FOTO` mediumblob,
  PRIMARY KEY (`ID`,`TIPO_PERSONA`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

#
# Structure for table "persona_frg1"
#

CREATE TABLE `persona_frg1` (
  `ID` int(11) NOT NULL,
  `FOTO` mediumblob,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "persona_frg2"
#

CREATE TABLE `persona_frg2` (
  `ID` int(11) NOT NULL,
  `CEDULA` varchar(20) NOT NULL,
  `RUC` varchar(20) DEFAULT NULL,
  `NOMBRES` varchar(20) NOT NULL,
  `APELLIDOS` varchar(45) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `TELEFONO` varchar(20) NOT NULL,
  `TITULOS_ACADEMICOS` varchar(70) DEFAULT NULL,
  `LUGAR_TRABAJO` varchar(20) NOT NULL,
  `TIPO_PERSONA` int(3) NOT NULL,
  `NRO_CURSOS_APROBADOS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Procedure "pa_detalles_curso_edicion"
#

CREATE PROCEDURE `pa_detalles_curso_edicion`(codigoCurso int(11), numEdicion int(11))
BEGIN
select concat(concat(ho.hora_inicio,' '), ho.hora_fin) as horario, ce.aula, concat(concat(pe.nombres,' '),pe.apellidos) as instructor
from curso_edicion ce inner join curso_edicion_has_personas cep on cep.curso_edicion_id=ce.id
inner join horario ho on ce.horario_id=ho.id
inner join persona pe on cep.persona_id=pe.id
where pe.tipo_persona=3 and ce.curso_id=codigoCurso and ce.nro_edicion=numEdicion;
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
where pe.cedula=cedulaIns and pe.tipo_persona=3;
END;

#
# Procedure "PA_INSERT_ESTADISTICAS"
#

CREATE PROCEDURE `PA_INSERT_ESTADISTICAS`()
BEGIN 

 
INSERT INTO ESTADISTICAS(NOMBRE_CURSO,NRO_INSTANCIA,NOM_APE_PROFESOR,FECHA_INICIO,
						  FECHA_FIN, NRO_ESTUDIANTES,TOTAL_POR_MATRICULAS)
SELECT CU.NOMBRE, CE.NRO_EDICION, CONCAT(PE.NOMBRES, CONCAT(" ",PE.APELLIDOS)) AS NOMBRE_APELLIDO
      ,CE.FECHA_INICIO,CE.FECHA_FINALIZACION,CE.NRO_ESTUDIANTES,CE.NRO_ESTUDIANTES*40 AS VALOR
FROM CURSO_EDICION CE INNER JOIN CURSO CU ON CU.ID=CE.CURSO_ID
                      INNER JOIN CURSO_EDICION_HAS_PERSONAS CEP ON CEP.CURSO_EDICION_ID=CE.ID
				      INNER JOIN PERSONA PE ON CEP.PERSONA_ID=PE.ID
WHERE PE.TIPO_PERSONA=3;
END;

#
# Procedure "PA_PAGO_PROFESOR"
#

CREATE PROCEDURE `PA_PAGO_PROFESOR`()
BEGIN 
UPDATE ESTADISTICAS ES SET ES.PAGO_A_PROFESOR= (SELECT BD.VALOR FROM BANCO_DEPOSITO BD
INNER JOIN BANCO BA ON BA.ID=BD.BANCO_ID
INNER JOIN PERSONA PE ON PE.ID=BA.PERSONA_ID
INNER JOIN CURSO_EDICION CE ON CE.ID=BD.CURSO_EDICION_ID
INNER JOIN CURSO CU ON CU.ID=CE.CURSO_ID 
WHERE CU.NOMBRE=ES.NOMBRE_CURSO AND CE.NRO_EDICION=ES.NRO_INSTANCIA)
WHERE ES.PAGO_A_PROFESOR=0;
END;

#
# Trigger "control_fecha_matriculas"
#

CREATE DEFINER='root'@'localhost' TRIGGER `bdd3-project`.`control_fecha_matriculas` BEFORE INSERT ON `bdd3-project`.`curso_edicion_has_personas`
  FOR EACH ROW begin
declare fecha_fin date;
select ce.fecha_finalizacion into fecha_fin from curso_edicion ce
where ce.id=new.curso_edicion_id;
if fecha_fin<now() then 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Fecha de matricula expirada.!!';
end if;
end;

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
if condicion=1 then
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
	end if;
end if;
end;

#
# Trigger "curso_delete"
#

CREATE DEFINER='root'@'localhost' TRIGGER `bdd3-project`.`curso_delete` AFTER DELETE ON `bdd3-project`.`curso`
  FOR EACH ROW begin
DELETE FROM Edicion_curso WHERE ID_CURSO=OLD.ID;
end;

#
# Trigger "curso_update"
#

CREATE DEFINER='root'@'localhost' TRIGGER `bdd3-project`.`curso_update` AFTER UPDATE ON `bdd3-project`.`curso`
  FOR EACH ROW begin
UPDATE Edicion_curso SET ID_CURSO=NEW.ID, NOMBRE=NEW.NOMBRE,
	CONTENIDO=NEW.CONTENIDO, PRERREQUISITOS=NEW.PRERREQUISITOS,
	ESPECIALIDAD=NEW.ESPECIALIDAD
	WHERE ID_CURSO=OLD.ID;
end;

#
# Trigger "edicion_delete"
#

CREATE DEFINER='root'@'localhost' TRIGGER `bdd3-project`.`edicion_delete` AFTER DELETE ON `bdd3-project`.`curso_edicion`
  FOR EACH ROW begin
DELETE FROM Edicion_curso WHERE ID_EDICION=OLD.ID;
end;

#
# Trigger "edicion_insert"
#

CREATE DEFINER='root'@'localhost' TRIGGER `bdd3-project`.`edicion_insert` AFTER INSERT ON `bdd3-project`.`curso_edicion`
  FOR EACH ROW begin
DECLARE SWV_FILA_ID INT;
DECLARE SWV_FILA_NOMBRE varchar(20);
DECLARE SWV_FILA_CONTENIDO varchar(100);
DECLARE SWV_FILA_PRERREQUISITOS varchar(100);
DECLARE SWV_FILA_ESPECIALIDAD varchar(20);
SELECT ID, NOMBRE, CONTENIDO, PRERREQUISITOS, ESPECIALIDAD 
	INTO SWV_FILA_ID,SWV_FILA_NOMBRE, SWV_FILA_CONTENIDO, SWV_FILA_PRERREQUISITOS, SWV_FILA_ESPECIALIDAD
	FROM curso
	WHERE ID=NEW.CURSO_ID;
INSERT INTO Edicion_curso VALUES(default,SWV_FILA_ID, SWV_FILA_NOMBRE, SWV_FILA_CONTENIDO,
	SWV_FILA_PRERREQUISITOS, SWV_FILA_ESPECIALIDAD, new.ID, new.NRO_EDICION,
	new.FECHA_INICIO, new.FECHA_FINALIZACION, new.AULA, new.NRO_ESTUDIANTES, new.HORARIO_ID);
end;

#
# Trigger "edicion_update"
#

CREATE DEFINER='root'@'localhost' TRIGGER `bdd3-project`.`edicion_update` AFTER UPDATE ON `bdd3-project`.`curso_edicion`
  FOR EACH ROW begin
UPDATE Edicion_curso SET ID_EDICION = NEW.ID, NRO_EDICION=NEW.NRO_EDICION,
	FECHA_INICIO=NEW.FECHA_INICIO, FECHA_FINALIZACION=NEW.FECHA_FINALIZACION,
	AULA=NEW.AULA, NRO_ESTUDIANTES=NEW.NRO_ESTUDIANTES, HORARIO_ID=NEW.HORARIO_ID
	WHERE ID_EDICION=OLD.ID;
end;

#
# Trigger "persona_fragmentacion_delete"
#

CREATE DEFINER='root'@'localhost' TRIGGER `bdd3-project`.`persona_fragmentacion_delete` AFTER DELETE ON `bdd3-project`.`persona`
  FOR EACH ROW begin
if(old.TIPO_PERSONA=3) then
	delete from persona_frg1 where id=old.id;
	delete from persona_frg2 where id=old.id;
end if;
end;

#
# Trigger "persona_fragmentacion_insert"
#

CREATE DEFINER='root'@'localhost' TRIGGER `bdd3-project`.`persona_fragmentacion_insert` AFTER INSERT ON `bdd3-project`.`persona`
  FOR EACH ROW begin
if(new.TIPO_PERSONA=3) then
	insert into persona_frg1 values(new.ID, new.FOTO);
	insert into persona_frg2 values(new.ID, new.CEDULA, new.RUC, new.NOMBRES, 
		new.APELLIDOS, new.DIRECCION, new.TELEFONO, new.TITULOS_ACADEMICOS, 
		new.LUGAR_TRABAJO, new.TIPO_PERSONA, new.NRO_CURSOS_APROBADOS);
end if;
end;

#
# Trigger "persona_fragmentacion_update"
#

CREATE DEFINER='root'@'localhost' TRIGGER `bdd3-project`.`persona_fragmentacion_update` AFTER UPDATE ON `bdd3-project`.`persona`
  FOR EACH ROW begin
if(new.TIPO_PERSONA=3) then
	if(old.tipo_persona!=3) then
		insert into persona_frg1 values(new.ID, new.FOTO);
		insert into persona_frg2 values(new.ID, new.CEDULA, new.RUC, new.NOMBRES, 
			new.APELLIDOS, new.DIRECCION, new.TELEFONO, new.TITULOS_ACADEMICOS, 
			new.LUGAR_TRABAJO, new.TIPO_PERSONA, new.NRO_CURSOS_APROBADOS);
	else
		update persona_frg1 set foto=new.foto where id=new.id;
		update persona_frg2 set cedula=new.cedula, ruc=new.ruc, nombres=new.nombres, 
			apellidos=new.apellidos, direccion=new.direccion, telefono=new.telefono, 
			titulos_academicos=new.titulos_academicos, lugar_trabajo=new.lugar_trabajo, 
			tipo_persona=new.tipo_persona, nro_cursos_aprobados=new.nro_cursos_aprobados
			where id=new.id;
	end if;
end if;
end;
