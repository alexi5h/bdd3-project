
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
		update persona set nro_cursos_aprobados=1
			where id=new.persona_id;
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = porcentaje_faltas;
	end if;


	/*delete from faltas_estudiante where id=2;*/
end if;
end;

$$
delimiter
;
insert into evaluacion_estudiante values(2,8,1,1);

insert into curso_edicion values(1,'2014-10-15','2014-10-16','aula3',2,2,1);

