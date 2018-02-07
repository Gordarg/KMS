-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema gordcms
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gordcms
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gordcms` DEFAULT CHARACTER SET latin1 ;
USE `gordcms` ;

-- -----------------------------------------------------
-- Table `gordcms`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gordcms`.`categories` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `gordcms`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gordcms`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NULL DEFAULT NULL,
  `password` TINYTEXT NULL DEFAULT NULL,
  `Image` BLOB NULL DEFAULT NULL,
  `Active` BIT(1) NULL DEFAULT b'1',
  `Role` CHAR(5) NULL DEFAULT 'VSTOR',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `gordcms`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gordcms`.`posts` (
  `MasterId` CHAR(36) NULL DEFAULT NULL,
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(400) NULL DEFAULT NULL,
  `Submit` DATETIME NOT NULL,
  `Type` CHAR(5) NOT NULL DEFAULT 'POST' COMMENT 'POST, FILE, ARTL, COMT, SURV, QUST, ANSR,CHAT,TRNL,QUOT',
  `Level` CHAR(2) NULL DEFAULT 'DC' COMMENT 'Data Content by default. Other SEO and publish levels must be declared with integrers.',
  `Content` LONGBLOB NULL DEFAULT NULL,
  `Body` LONGTEXT NULL DEFAULT NULL,
  `CategoryId` INT(11) NULL DEFAULT NULL,
  `UserId` INT(11) NULL DEFAULT NULL,
  `Status` CHAR(7) NULL DEFAULT 'DRAFT' COMMENT 'Post lifecycle',
  `RefrenceId` INT(11) NULL DEFAULT NULL,
  `Index` SMALLINT(6) NULL DEFAULT NULL,
  `Deleted` BIT(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`Id`),
  INDEX `fk_posts_category_idx` (`CategoryId` ASC),
  INDEX `fk_posts_user_idx` (`UserId` ASC),
  INDEX `fk_posts_1_idx` (`RefrenceId` ASC),
  CONSTRAINT `fk_posts_1`
    FOREIGN KEY (`RefrenceId`)
    REFERENCES `gordcms`.`posts` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_posts_category`
    FOREIGN KEY (`CategoryId`)
    REFERENCES `gordcms`.`categories` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_posts_user`
    FOREIGN KEY (`UserId`)
    REFERENCES `gordcms`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 36
DEFAULT CHARACTER SET = latin1;

USE `gordcms` ;

-- -----------------------------------------------------
-- Placeholder table for view `gordcms`.`post_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gordcms`.`post_details` (`MasterID` INT, `ID` INT, `Title` INT, `Submit` INT, `CategoryID` INT, `CategoryName` INT, `UserID` INT, `Username` INT, `Body` INT, `Content` INT, `Type` INT, `Level` INT, `RefrenceID` INT, `Index` INT, `Status` INT);

-- -----------------------------------------------------
-- View `gordcms`.`post_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gordcms`.`post_details`;
USE `gordcms`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `gordcms`.`post_details` AS select `gordcms`.`posts`.`MasterId` AS `MasterID`,`gordcms`.`posts`.`Id` AS `ID`,`gordcms`.`posts`.`Title` AS `Title`,`gordcms`.`posts`.`Submit` AS `Submit`,`gordcms`.`categories`.`Id` AS `CategoryID`,`gordcms`.`categories`.`Name` AS `CategoryName`,`gordcms`.`users`.`id` AS `UserID`,`gordcms`.`users`.`username` AS `Username`,`gordcms`.`posts`.`Body` AS `Body`,`gordcms`.`posts`.`Content` AS `Content`,`gordcms`.`posts`.`Type` AS `Type`,`gordcms`.`posts`.`Level` AS `Level`,`gordcms`.`posts`.`RefrenceId` AS `RefrenceID`,`gordcms`.`posts`.`Index` AS `Index`,`gordcms`.`posts`.`Status` AS `Status` from ((`gordcms`.`posts` join `gordcms`.`users` on((`gordcms`.`posts`.`UserId` = `gordcms`.`users`.`id`))) join `gordcms`.`categories` on((`gordcms`.`posts`.`CategoryId` = `gordcms`.`categories`.`Id`))) where (`gordcms`.`posts`.`Id` in (select max(`gordcms`.`posts`.`Id`) from `gordcms`.`posts` group by `gordcms`.`posts`.`MasterId`) and (`gordcms`.`posts`.`Deleted` = 0));

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
USE `gordcms`;

DELIMITER $$
USE `gordcms`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `gordcms`.`before_insert_post`
BEFORE INSERT ON `gordcms`.`posts`
FOR EACH ROW
BEGIN
  IF new.MasterId IS NULL THEN
    SET new.MasterId = cast(uuid() as char);
  END IF;
END$$


DELIMITER ;
