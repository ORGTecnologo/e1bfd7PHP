
SET FOREIGN_KEY_CHECKS=0;
alter table tbl_paises modify column id_pais int(11) auto_increment;
alter table tbl_departamentos modify column id_departamento int(11) auto_increment;
SET FOREIGN_KEY_CHECKS=1;

ALTER TABLE tbl_paises ADD CONSTRAINT u_nombre_pais UNIQUE (nombre_pais);