/* Partición tabla curso - duplicado*/
alter table curso
partition by hash(id)
partitions 1;