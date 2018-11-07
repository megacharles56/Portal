/* Creación de dominios para el proyecto CANACO */
create domain tid as integer;
create domain tmonetario  as numeric(9,2);
create domain tsboolean   as varchar(2)    collate UTF8;
create domain tsnombrec   as varchar(12)   collate UTF8;
create domain tsnombre    as varchar(24)   collate UTF8;
create domain tsnombrel   as varchar(48)   collate UTF8;
create domain tsnombrelp  as varchar(64)   collate UTF8;
create domain tsnombrexl  as varchar(128)  collate UTF8;
create domain tsnombrexxl as varchar(256)  collate UTF8;
create domain tsnombre1x  as varchar(512)  collate UTF8;
create domain tsnombre2x  as varchar(1024) collate UTF8;
create domain tsnombre3x  as varchar(2048) collate UTF8;
Commit;

