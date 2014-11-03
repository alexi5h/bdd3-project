DROP PROCEDURE IF EXISTS pa_detalles_instructor;
DELIMITER //

CREATE PROCEDURE pa_detalles_instructor(cedulaIns varchar(20))
BEGIN
select distinct cu.nombre as nombre_curso, ce.nro_edicion as num_edicion, ce.fecha_inicio, ce.fecha_finalizacion, bd.valor
from curso_edicion ce inner join curso cu on cu.id=ce.curso_id
inner join banco_deposito bd on ce.id=bd.curso_edicion_id
inner join banco ba on bd.banco_id=ba.id
inner join persona pe on ba.persona_id=pe.id
inner join curso_edicion_has_personas cep on cep.curso_edicion_id=ce.id and cep.persona_id=pe.id
where pe.cedula=cedulaIns and pe.tipo_persona=3;
END

//
DELIMITER ;

call pa_detalles_instructor('1007822358');

DROP PROCEDURE IF EXISTS pa_detalles_curso_edicion;
DELIMITER //

CREATE PROCEDURE pa_detalles_curso_edicion(codigoCurso int(11), numEdicion int(11))
BEGIN
select concat(concat(ho.hora_inicio,' '), ho.hora_fin) as horario, ce.aula, concat(concat(pe.nombres,' '),pe.apellidos) as instructor
from curso_edicion ce inner join curso_edicion_has_personas cep on cep.curso_edicion_id=ce.id
inner join horario ho on ce.horario_id=ho.id
inner join persona pe on cep.persona_id=pe.id
where pe.tipo_persona=3 and ce.curso_id=codigoCurso and ce.nro_edicion=numEdicion;
END

//
DELIMITER ;

call pa_detalles_curso_edicion('1','2');