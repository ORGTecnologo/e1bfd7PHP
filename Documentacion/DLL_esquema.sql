SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `tecnico_ya_database` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
SHOW WARNINGS;
USE `tecnico_ya_database` ;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_usuarios` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_usuarios` (
  `usuario` VARCHAR(45) NOT NULL ,
  `nombres` VARCHAR(100) NULL ,
  `apellidos` VARCHAR(100) NULL ,
  `contrasenia` VARCHAR(45) NULL ,
  PRIMARY KEY (`usuario`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_clientes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_clientes` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_clientes` (
  `usuario` VARCHAR(45) NOT NULL ,
  `direccion` VARCHAR(500) NOT NULL ,
  `habilitado` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`usuario`) ,
  CONSTRAINT `fk_cliente_usuario`
    FOREIGN KEY (`usuario` )
    REFERENCES `tecnico_ya_database`.`tbl_usuarios` (`usuario` )
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
  `usuario` VARCHAR(45) NOT NULL ,
  `habilitado` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`usuario`) ,
  CONSTRAINT `fk_tbl_tecnicos_1`
    FOREIGN KEY (`usuario` )
    REFERENCES `tecnico_ya_database`.`tbl_usuarios` (`usuario` )
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
  `usuario` VARCHAR(45) NOT NULL ,
  `emal` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`usuario`) ,
  UNIQUE INDEX `emal_UNIQUE` (`emal` ASC) ,
  CONSTRAINT `fk_administrador_usuario`
    FOREIGN KEY (`usuario` )
    REFERENCES `tecnico_ya_database`.`tbl_usuarios` (`usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_zonas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_zonas` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_zonas` (
  `id_zona` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `descripcion` VARCHAR(500) NULL ,
  PRIMARY KEY (`id_zona`) ,
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) )
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
  `precio_servicio` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_contrato_cliente_idx` (`fk_cliente` ASC) ,
  INDEX `fk_contrato_tecnico_idx` (`fk_tecnico` ASC) ,
  INDEX `fk_contrato_servicio_idx` (`fk_servicio` ASC) ,
  CONSTRAINT `fk_contrato_cliente`
    FOREIGN KEY (`fk_cliente` )
    REFERENCES `tecnico_ya_database`.`tbl_clientes` (`usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contrato_tecnico`
    FOREIGN KEY (`fk_tecnico` )
    REFERENCES `tecnico_ya_database`.`tbl_tecnicos` (`usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contrato_servicio`
    FOREIGN KEY (`fk_servicio` )
    REFERENCES `tecnico_ya_database`.`tbl_servicios` (`id_servicio` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `tecnico_ya_database`.`tbl_tecnico_zona`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecnico_ya_database`.`tbl_tecnico_zona` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `tecnico_ya_database`.`tbl_tecnico_zona` (
  `fk_tenico` VARCHAR(45) NOT NULL ,
  `fk_zona` INT NOT NULL ,
  PRIMARY KEY (`fk_tenico`, `fk_zona`) ,
  INDEX `fk_tecnicozona_tenico_idx` (`fk_tenico` ASC) ,
  INDEX `fk_tecnicozona_zona_idx` (`fk_zona` ASC) ,
  CONSTRAINT `fk_tecnicozona_tenico`
    FOREIGN KEY (`fk_tenico` )
    REFERENCES `tecnico_ya_database`.`tbl_tecnicos` (`usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tecnicozona_zona`
    FOREIGN KEY (`fk_zona` )
    REFERENCES `tecnico_ya_database`.`tbl_zonas` (`id_zona` )
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
  PRIMARY KEY (`fk_tenico`, `fk_servicio`) ,
  INDEX `fk_tecnicoofreceservicio_tenico_idx` (`fk_tenico` ASC) ,
  INDEX `fk_tecnico_ofrece_servicio_servicio_idx` (`fk_servicio` ASC) ,
  CONSTRAINT `fk_tecnicoofreceservicio_tenico`
    FOREIGN KEY (`fk_tenico` )
    REFERENCES `tecnico_ya_database`.`tbl_tecnicos` (`usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tecnico_ofrece_servicio_servicio`
    FOREIGN KEY (`fk_servicio` )
    REFERENCES `tecnico_ya_database`.`tbl_servicios` (`id_servicio` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
USE `tecnico_ya_database` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

