drop table if exists entregas_tarea;
drop table if exists tareas;
drop table if exists grupos_materias;
drop table if exists clases;
drop table if exists materias;
drop table if exists personas;
drop table if exists grupos_estudiantes;

create table grupos_estudiantes(
   id_grupo_estudiantes int(4) not null auto_increment,
   nombre_grupo varchar(30) not null,
   constraint gre_pk_idge primary key (id_grupo_estudiantes)
);

create table personas(
   id_persona           int(5) not null auto_increment,
   id_grupo_estudiantes int(4),
   tipo_persona         char(1) not null,
   nombre_persona       varchar(50) not null,
   apellido_persona     varchar(50) not null,
   usuario_persona      varchar(100) invisible,
   contrasena_persona   varchar(64) invisible ,
   constraint per_pk_idp primary key (id_persona)
);

create table materias(
   id_materia           int(3) not null auto_increment,
   nombre_materia       varchar(60) not null,
   constraint mat_pk_idm primary key (id_materia)
);

create table clases(
   id_clase             int(4) not null auto_increment,
   id_materia           int(3) not null,
   id_profesor           int(5) not null,
   constraint cla_pk_idc primary key (id_clase)
);

create table grupos_materias(
   id_grupo_estudiantes int(4) not null,
   id_clase             int(4) not null,
   constraint grm_pk_idgc primary key (id_grupo_estudiantes, id_clase)
);

create table tareas(
   id_tarea             int(5) not null auto_increment,
   id_clase             int(4) not null,
   nombre_tarea         varchar(30) not null,
   descripcion_tarea    varchar(140) not null,
   plazo_maximo         datetime not null,
   constraint tar_pk_idt primary key (id_tarea)
);

create table entregas_tarea(
   id_tarea             int(5) not null,
   id_estudiante           int(5) not null,
   calificacion         decimal,
   direccion_archivo    varchar(200),
   descripcion          varchar(400),
   fecha_entrega        datetime not null,
   primary key (id_tarea, id_estudiante)
);

alter table personas add constraint per_fk_idge foreign key (id_grupo_estudiantes)
      references grupos_estudiantes (id_grupo_estudiantes) on delete restrict on update restrict;

alter table clases add constraint cla_fk_idm foreign key (id_materia)
      references materias (id_materia) on delete restrict on update restrict;

alter table clases add constraint cla_fk_idp foreign key (id_profesor)
      references personas (id_persona) on delete restrict on update restrict;

alter table grupos_materias add constraint grm_fk_idge foreign key (id_grupo_estudiantes)
      references grupos_estudiantes (id_grupo_estudiantes) on delete restrict on update restrict;

alter table grupos_materias add constraint grm_fk_idc foreign key (id_clase)
      references clases (id_clase) on delete restrict on update restrict;

alter table tareas add constraint tar_fk_idc foreign key (id_clase)
      references clases (id_clase) on delete restrict on update restrict;

alter table entregas_tarea add constraint eta_fk_ide foreign key (id_estudiante)
      references personas (id_persona) on delete restrict on update restrict;

alter table entregas_tarea add constraint eta_fk_idt foreign key (id_tarea)
      references tareas (id_tarea) on delete restrict on update restrict;


INSERT INTO personas (tipo_persona, nombre_persona, apellido_persona, usuario_persona, contrasena_persona) VALUES
('P', 'P', 'P', 'p1', '21232f297a57a5a743894a0e4a801fc3'),
('P', 'P', 'P', 'p2', '21232f297a57a5a743894a0e4a801fc3');

INSERT INTO materias (nombre_materia) VALUES
('BIOLOGIA'),
('QUIMICA'),
('FISICA'),
('MATEMATICAS'),
('INFORMATICA'),
('ESPAÑOL'),
('INGLES'),
('SOCIALES'),
('ETICA'),
('ARTES');

INSERT INTO clases(id_profesor,id_materia) VALUES
(1,1),(1,2),
(2,3),(2,4);

INSERT INTO grupos_estudiantes(nombre_grupo) VALUES
('OCTAVO');

INSERT INTO grupos_materias (id_grupo_estudiantes, id_clase) VALUES
(1,1),(1,2),(1,3),(1,4);

INSERT INTO personas (id_grupo_estudiantes, tipo_persona, nombre_persona, apellido_persona, usuario_persona, contrasena_persona) VALUES 
(1,'E', 'E', 'E', 'e1', '21232f297a57a5a743894a0e4a801fc3'),
(1,'E', 'E', 'E', 'e2', '21232f297a57a5a743894a0e4a801fc3'),
(1,'S', 'S', 'S', 's', '21232f297a57a5a743894a0e4a801fc3');

INSERT INTO tareas (id_clase,nombre_tarea,descripcion_tarea,plazo_maximo) VALUES
(4,'Ejercicios','Subir ejercicios de la pagina 34.','2020-04-20 10:00');