drop table if exists entregas_tarea;
drop table if exists tareas;
drop table if exists grupos_materias;
drop table if exists materias;
drop table if exists personas;
drop table if exists grupos_estudiantes;

create table grupos_estudiantes(
   id_grupo_estudiantes int(4) not null auto_increment,
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
   id_persona           int(5) not null,
   nombre_materia       varchar(60) not null,
   constraint mat_pk_idm primary key (id_materia)
);

create table grupos_materias(
   id_grupo_estudiantes int(4) not null,
   id_materia           int(3) not null,
   constraint grm_pk_idgm primary key (id_grupo_estudiantes, id_materia)
);

create table tareas(
   id_tarea             int(5) not null auto_increment,
   id_materia           int(3) not null,
   nombre_tarea         varchar(30) not null,
   descripcion_tarea    varchar(140) not null,
   constraint tar_pk_idt primary key (id_tarea)
);

create table entregas_tarea(
   id_tarea             int(5) not null,
   id_persona           int(5) not null,
   calificacion         decimal,
   direccion_archivo    varchar(200),
   descripcion          varchar(400),
   primary key (id_tarea, id_persona)
);

alter table entregas_tarea add constraint eta_fk_idp foreign key (id_persona)
      references personas (id_persona) on delete restrict on update restrict;

alter table entregas_tarea add constraint eta_fk_idt foreign key (id_tarea)
      references tareas (id_tarea) on delete restrict on update restrict;

alter table grupos_materias add constraint grm_fk_idge foreign key (id_grupo_estudiantes)
      references grupos_estudiantes (id_grupo_estudiantes) on delete restrict on update restrict;

alter table grupos_materias add constraint grm_fk_idm foreign key (id_materia)
      references materias (id_materia) on delete restrict on update restrict;

alter table materias add constraint mat_fk_idp foreign key (id_persona)
      references personas (id_persona) on delete restrict on update restrict;

alter table personas add constraint per_fk_idge foreign key (id_grupo_estudiantes)
      references grupos_estudiantes (id_grupo_estudiantes) on delete restrict on update restrict;

alter table tareas add constraint tar_fk_idm foreign key (id_materia)
      references materias (id_materia) on delete restrict on update restrict;

