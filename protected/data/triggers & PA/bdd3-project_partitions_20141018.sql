/* Partición tabla curso - duplicado*/
alter table curso
partition by hash(id)
partitions 1;

/* Partición tabla persona - tipo de persona*/
alter table persona
partition by list(tipo_persona)(
	partition partEstudiante values in (1),
	partition partDefault values in (2,3)
);






explain partitions select * from persona;
explain select * from persona;

delete from persona where id=3;

SELECT table_rows FROM information_schema.partitions 
WHERE table_schema = 'bdd3-project' and table_name ='persona';


insert into persona values(default,'1003652888',null,'Alexis','Hidalgo','Caranqui','0980505815','Bachiller','UTN',2,0,null);