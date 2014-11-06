
/*Trigger que comprueba si el estudiante aprobó el curso,
si lo hace, se aumenta en 1 el nº de cursos aprobados por esa persona*/
DROP TRIGGER IF EXISTS curso_aprobado;
delimiter $$
create trigger curso_aprobado
after insert on evaluacion_estudiante
for each row
begin
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
$$
delimiter ;

/*Trigger que controla que no sobrepase el nº máximo 
de estudiantes matriculados permitidos*/
DROP TRIGGER IF EXISTS control_num_matriculas;
delimiter $$
create trigger control_num_matriculas
after insert on curso_edicion_has_personas
for each row
begin
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
$$
delimiter ;

/*Trigger que duplica los datos ingresados de INSTRUCTORES en 2 particiones*/
DROP TRIGGER IF EXISTS persona_fragmentacion;
delimiter $$
create trigger persona_fragmentacion_insert
after insert on persona
for each row
begin
if(new.TIPO_PERSONA=3) then
	insert into persona_frg1 values(new.ID, new.FOTO);
	insert into persona_frg2 values(new.ID, new.CEDULA, new.RUC, new.NOMBRES, 
		new.APELLIDOS, new.DIRECCION, new.TELEFONO, new.TITULOS_ACADEMICOS, 
		new.LUGAR_TRABAJO, new.TIPO_PERSONA, new.NRO_CURSOS_APROBADOS);
end if;
end;
$$
delimiter ;

/*Trigger que actualiza los cambios hechos de INSTRUCTORES en 2 particiones*/
DROP TRIGGER IF EXISTS persona_fragmentacion_update;
delimiter $$
create trigger persona_fragmentacion_update
after update on persona
for each row
begin
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
$$
delimiter ;

/*Trigger que elimina los registros de INSTRUCTORES en 2 particiones al eliminar en la tabla principal*/
DROP TRIGGER IF EXISTS persona_fragmentacion_delete;
delimiter $$
create trigger persona_fragmentacion_delete
after delete on persona
for each row
begin
if(old.TIPO_PERSONA=3) then
	delete from persona_frg1 where id=old.id;
	delete from persona_frg2 where id=old.id;
end if;
end;
$$
delimiter ;

/*Trigger que duplica los datos ingresados de cursos en la partición Edicion_curso
DROP TRIGGER IF EXISTS curso_insert;
delimiter $$
create trigger curso_insert
after insert on curso
for each row
begin
INSERT INTO Edicion_curso VALUES(default, new.ID, new.NOMBRE, new.CONTENIDO, new.PRERREQUISITOS,
	new.ESPECIALIDAD,null,null,null,null,null,null,null);
end;                          
$$
delimiter ;
*/

/*Trigger que actualiza los cambios hechos de cursos en la partición Edicion_curso*/
DROP TRIGGER IF EXISTS curso_update;
delimiter $$
create trigger curso_update
after update on curso
for each row
begin
UPDATE Edicion_curso SET ID_CURSO=NEW.ID, NOMBRE=NEW.NOMBRE,
	CONTENIDO=NEW.CONTENIDO, PRERREQUISITOS=NEW.PRERREQUISITOS,
	ESPECIALIDAD=NEW.ESPECIALIDAD
	WHERE ID_CURSO=OLD.ID;
end;
$$
delimiter ;

/*Trigger que elimina en la partición Edicion_curso, los registros eliminados en la tabla original*/
DROP TRIGGER IF EXISTS curso_delete;
delimiter $$
create trigger curso_delete
after delete on curso
for each row
begin
DELETE FROM Edicion_curso WHERE ID_CURSO=OLD.ID;
end;
$$
delimiter ;

/*Trigger que duplica los datos ingresados de curso_edicion en la partición Edicion_curso*/
DROP TRIGGER IF EXISTS edicion_insert;
delimiter $$
create trigger edicion_insert
after insert on curso_edicion
for each row
begin
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
$$
delimiter ;

/*Trigger que actualiza los cambios hechos de curso_edicion en la partición Edicion_curso*/
DROP TRIGGER IF EXISTS edicion_update;
delimiter $$
create trigger edicion_update
after update on curso_edicion
for each row
begin
UPDATE Edicion_curso SET ID_EDICION = NEW.ID, NRO_EDICION=NEW.NRO_EDICION,
	FECHA_INICIO=NEW.FECHA_INICIO, FECHA_FINALIZACION=NEW.FECHA_FINALIZACION,
	AULA=NEW.AULA, NRO_ESTUDIANTES=NEW.NRO_ESTUDIANTES, HORARIO_IDD=NEW.HORARIO_ID
	WHERE ID_EDICION=OLD.ID;
end;
$$
delimiter ;

/*Trigger que elimina en la partición Edicion_curso, los registros eliminados en la tabla original de curso_edicion*/
DROP TRIGGER IF EXISTS edicion_delete;
delimiter $$
create trigger edicion_delete
after delete on curso_edicion
for each row
begin
DELETE FROM Edicion_curso WHERE ID_EDICION=OLD.ID;
end;
$$
delimiter ;

drop trigger if exists control_fecha_matriculas;
DELIMITER &&
CREATE TRIGGER control_fecha_matriculas
before insert on curso_edicion_has_personas
for each row
begin
declare fecha_fin date;
select ce.fecha_finalizacion into fecha_fin from curso_edicion ce
where ce.id=new.curso_edicion_id;
if fecha_fin<now() then 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Fecha de matricula expirada.!!';
end if;
end;
&&
delimiter ;