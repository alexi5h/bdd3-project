alter table test2 drop partition p0;
ALTER TABLE curso REBUILD PARTITION p0;

alter table curso
partition by hash(id)
partitions 1;

explain partitions select * from curso;
explain select * from curso;

SELECT * FROM information_schema.partitions 
WHERE table_schema = 'bdd3-project' and table_name ='curso';

update information_schema.partitions set PARTITION_NAME='p0'
WHERE table_schema = 'bdd3-project' and table_name ='curso';

SELECT *
    FROM INFORMATION_SCHEMA.PARTITIONS ;
    WHERE TABLE_NAME = 'curso';

GRANT SELECT,LOCK TABLES ON information_schema.* TO 'root'@'localhost';