
CREATE SCHEMA IF NOT EXISTS `tecnico_ya_database` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
SHOW WARNINGS;
USE `tecnico_ya_database` ;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_paises`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_paises` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_paises` (
  `id_pais` INT NOT NULL ,
  `nombre_pais` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_pais`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_departamentos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_departamentos` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_departamentos` (
  `id_departamento` INT NOT NULL ,
  `nombre_departamento` VARCHAR(45) NOT NULL ,
  `fk_pais` INT NOT NULL ,
  PRIMARY KEY (`id_departamento`) ,
  INDEX `fk_departamento_pais_idx` (`fk_pais` ASC) ,
  CONSTRAINT `fk_departamento_pais`
    FOREIGN KEY (`fk_pais` )
    REFERENCES `tecnico_ya_database`.`tbl_paises` (`id_pais` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_localidades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_localidades` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_localidades` (
  `id_localidad` INT NOT NULL ,
  `nombre_localidad` VARCHAR(45) NOT NULL ,
  `fk_departamento` INT NOT NULL ,
  PRIMARY KEY (`id_localidad`) ,
  INDEX `fk_localidad_departamento_idx` (`fk_departamento` ASC) ,
  CONSTRAINT `fk_localidad_departamento`
    FOREIGN KEY (`fk_departamento` )
    REFERENCES `tecnico_ya_database`.`tbl_departamentos` (`id_departamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_barrios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_barrios` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_barrios` (
  `id_barrio` INT NOT NULL ,
  `nombres_barrio` VARCHAR(45) NOT NULL ,
  `fk_localidad` INT NOT NULL ,
  PRIMARY KEY (`id_barrio`) ,
  INDEX `fk_barrio_localidad_idx` (`fk_localidad` ASC) ,
  CONSTRAINT `fk_barrio_localidad`
    FOREIGN KEY (`fk_localidad` )
    REFERENCES `tecnico_ya_database`.`tbl_localidades` (`id_localidad` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_ubicacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_ubicacion` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_ubicacion` (
  `id_ubicacion` INT NOT NULL ,
  `longitud` MEDIUMTEXT NOT NULL ,
  `latitud` MEDIUMTEXT NOT NULL ,
  PRIMARY KEY (`id_ubicacion`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_usuarios` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_usuarios` (
  `email` VARCHAR(45) NOT NULL ,
  `nick` VARCHAR(45) NULL ,
  `ci` VARCHAR(15) NOT NULL ,
  `nombres` VARCHAR(100) NULL ,
  `apellidos` VARCHAR(100) NULL ,
  `fecha_nacimiento` VARCHAR(45) NULL ,
  `contrasenia` VARCHAR(45) NOT NULL ,
  `celular` VARCHAR(10) NULL ,
  `direccion` VARCHAR(500) NULL ,
  `sexo` VARCHAR(45) NULL ,
  `habilitado` VARCHAR(10) NOT NULL ,
  `fk_barrio` INT NULL ,
  `fk_ubicacion` INT NULL ,
  PRIMARY KEY (`email`) ,
  UNIQUE INDEX `ci_UNIQUE` (`ci` ASC) ,
  INDEX `fk_usuario_barrio_idx` (`fk_barrio` ASC) ,
  CONSTRAINT `fk_usuario_barrio`
    FOREIGN KEY (`fk_barrio` )
    REFERENCES `tecnico_ya_database`.`tbl_barrios` (`id_barrio` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_ubicacion`
    FOREIGN KEY (`fk_ubicacion` )
    REFERENCES `tecnico_ya_database`.`tbl_ubicacion` (`id_ubicacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_clientes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_clientes` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_clientes` (
  `email` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`email`) ,
  CONSTRAINT `fk_cliente_usuario`
    FOREIGN KEY (`email` )
    REFERENCES `tecnico_ya_database`.`tbl_usuarios` (`email` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_tecnicos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_tecnicos` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_tecnicos` (
  `email` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`email`) ,
  CONSTRAINT `fk_tenico_usuario`
    FOREIGN KEY (`email` )
    REFERENCES `tecnico_ya_database`.`tbl_usuarios` (`email` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_administradores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_administradores` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_administradores` (
  `emal` VARCHAR(45) NOT NULL ,
  UNIQUE INDEX `emal_UNIQUE` (`emal` ASC) ,
  PRIMARY KEY (`emal`) ,
  CONSTRAINT `fk_administrador_usuario`
    FOREIGN KEY (`emal` )
    REFERENCES `tecnico_ya_database`.`tbl_usuarios` (`email` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_servicios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_servicios` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_servicios` (
  `id_servicio` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `descripcion` VARCHAR(500) NULL ,
  PRIMARY KEY (`id_servicio`) ,
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_cliente_contrata_servicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_cliente_contrata_servicio` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_cliente_contrata_servicio` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fk_servicio` INT NOT NULL ,
  `fk_cliente` VARCHAR(45) NOT NULL ,
  `fk_tecnico` VARCHAR(45) NOT NULL ,
  `precio_final_servicio` FLOAT NOT NULL ,
  `fecha_hora_contrato` DATETIME NOT NULL ,
  `horas_contrato_servicio` INT NOT NULL ,
  `calificacion_otorgada_tecnico` INT NULL ,
  `calificacion_otorgada_cliente` INT NULL ,
  `descripcion_servicio_realizado` VARCHAR(500) NULL ,
  `foto_averia` BLOB NULL ,
  `aceptado_por_tecnico` TINYINT(1) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_contrato_tecnico_idx` (`fk_tecnico` ASC) ,
  INDEX `fk_contrato_cliente_idx` (`fk_cliente` ASC) ,
  INDEX `fk_contrato_servicio_idx` (`fk_servicio` ASC) ,
  CONSTRAINT `fk_contrato_tecnico`
    FOREIGN KEY (`fk_tecnico` )
    REFERENCES `tecnico_ya_database`.`tbl_tecnicos` (`email` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contrato_cliente`
    FOREIGN KEY (`fk_cliente` )
    REFERENCES `tecnico_ya_database`.`tbl_clientes` (`email` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contrato_servicio`
    FOREIGN KEY (`fk_servicio` )
    REFERENCES `tecnico_ya_database`.`tbl_servicios` (`id_servicio` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'duracion_servicio';

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_tecnico_cubre_barrio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_tecnico_cubre_barrio` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_tecnico_cubre_barrio` (
  `fk_tenico` VARCHAR(45) NOT NULL ,
  `fk_barrio` INT NOT NULL ,
  PRIMARY KEY (`fk_tenico`, `fk_barrio`) ,
  INDEX `fk_cobertura_usuario_idx` (`fk_tenico` ASC) ,
  INDEX `fk_cobertura_barrio_idx` (`fk_barrio` ASC) ,
  CONSTRAINT `fk_cobertura_usuario`
    FOREIGN KEY (`fk_tenico` )
    REFERENCES `tecnico_ya_database`.`tbl_tecnicos` (`email` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cobertura_barrio`
    FOREIGN KEY (`fk_barrio` )
    REFERENCES `tecnico_ya_database`.`tbl_barrios` (`id_barrio` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_tecnico_ofrece_servicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_tecnico_ofrece_servicio` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_tecnico_ofrece_servicio` (
  `fk_tenico` VARCHAR(45) NOT NULL ,
  `fk_servicio` INT NOT NULL ,
  `precio_servicio` FLOAT NOT NULL ,
  PRIMARY KEY (`fk_tenico`, `fk_servicio`) ,
  INDEX `fk_tecofserv_servicio_idx` (`fk_servicio` ASC) ,
  INDEX `fk_tecofserv_tecnico_idx` (`fk_tenico` ASC) ,
  CONSTRAINT `fk_tecofserv_servicio`
    FOREIGN KEY (`fk_servicio` )
    REFERENCES `tecnico_ya_database`.`tbl_servicios` (`id_servicio` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tecofserv_tecnico`
    FOREIGN KEY (`fk_tenico` )
    REFERENCES `tecnico_ya_database`.`tbl_tecnicos` (`email` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
USE `tecnico_ya_database` ;


