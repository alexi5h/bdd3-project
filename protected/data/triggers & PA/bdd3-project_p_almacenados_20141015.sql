DELIMITER //

CREATE PROCEDURE pa_detalles_instructor(cedulaIns varchar(20))
BEGIN
select cu.nombre as nombre_curso, ce.id as edicion_id, ce.fecha_inicio, ce.fecha_finalizacion, bd.valor
from curso cu inner join curso_edicion ce on cu.id=ce.curso_id
inner join banco_deposito bd on ce.id=bd.curso_edicion_id
inner join banco ba on bd.banco_id=ba.id
inner join persona pe on ba.persona_id=pe.id
where pe.cedula=cedulaIns and pe.tipo_persona='INSTRUCTOR';
END

//
DELIMITER ;

call pa_detalles_instructor('1007822358');