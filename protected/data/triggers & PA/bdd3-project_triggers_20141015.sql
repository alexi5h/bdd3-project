
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
	-- SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = new.persona_id;
	end if;
	/*delete from faltas_estudiante where id=2;*/
end if;
end;

$$
delimiter
;

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
if condicion='ESTUDIANTE' then
	if num_estudiantes < 25 then
		update curso_edicion set NRO_ESTUDIANTES=NRO_ESTUDIANTES+1
		where id=new.CURSO_EDICION_ID;
	else
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'CUPO LLENO!' ;
	end if;
end if;
end;

$$
delimiter
;