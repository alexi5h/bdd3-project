/* Partición tabla curso - duplicado*/
alter table curso
partition by hash(id)
partitions 1;

/* Partición tabla persona - tipo de persona*/
alter table persona
partition by list(TIPO_PERSONA)(
	partition partEstudiante values in (1),
	partition partDefault values in (2,3)
);

alter table persona
PARTITION BY RANGE(tipo_persona)  (
        PARTITION pa0 VALUES LESS THAN (1) ENGINE = InnoDB,
        PARTITION pa1 VALUES LESS THAN MAXVALUE ENGINE = InnoDB
);

select partEstudiante from information_schema.PARTITIONS 
WHERE TABLE_SCHEMA = 'bdd3-project'  AND TABLE_NAME='persona';

SELECT * FROM curso p0;
SELECT * FROM persona partEstudiante;
SELECT * FROM persona partDefault;
select * from persona partition (partEstudiante);
select partitions from persona;

explain partitions select * from curso;
explain select * from persona;

delete from persona where id=3;

SELECT * FROM information_schema.partitions 
WHERE table_schema = 'bdd3-project' and table_name ='persona';

select * from p0;

insert into persona values(default,'1003652888',null,'Alexis','Hidalgo','Caranqui','0980505815','Bachiller','UTN',2,0,null);