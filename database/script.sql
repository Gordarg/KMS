-- MySQL Workbench Forward Engineering

-- SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
-- SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema gordcms
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gordcms
-- -----------------------------------------------------
-- CREATE SCHEMA IF NOT EXISTS `gordcms` DEFAULT CHARACTER SET latin1 ;
-- USE `gordcms` ;

-- -----------------------------------------------------
-- Table `categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `categories` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(50) NULL DEFAULT NULL,
  `Father` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_categories_1_idx` (`Father` ASC),
  CONSTRAINT `fk_categories_1`
    FOREIGN KEY (`Father`)
    REFERENCES `categories` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(45) NULL DEFAULT NULL,
  `Password` TINYTEXT NULL DEFAULT NULL,
  `Image` BLOB NULL DEFAULT NULL,
  `Active` BIT(1) NULL DEFAULT b'1',
  `Role` CHAR(5) NULL DEFAULT 'VSTOR',
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `posts` (
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
  `ContentDeleted` BIT(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`Id`),
  INDEX `fk_posts_category_idx` (`CategoryId` ASC),
  INDEX `fk_posts_user_idx` (`UserId` ASC),
  INDEX `fk_posts_1_idx` (`RefrenceId` ASC),
  CONSTRAINT `fk_posts_1`
    FOREIGN KEY (`RefrenceId`)
    REFERENCES `posts` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_posts_category`
    FOREIGN KEY (`CategoryId`)
    REFERENCES `categories` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_posts_user`
    FOREIGN KEY (`UserId`)
    REFERENCES `users` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 51
DEFAULT CHARACTER SET = latin1;

USE `gordcms` ;

-- -----------------------------------------------------
-- Placeholder table for view `post_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `post_details` (`MasterID` INT, `Title` INT, `ID` INT, `Submit` INT, `CategoryID` INT, `CategoryName` INT, `UserID` INT, `Username` INT, `Body` INT, `Type` INT, `Level` INT, `RefrenceID` INT, `Index` INT, `Status` INT, `Content` INT);

-- -----------------------------------------------------
-- View `post_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `post_details`;
USE `gordcms`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_details` AS select `T`.`MasterId` AS `MasterID`,`T`.`Title` AS `Title`,`T`.`Id` AS `ID`,`T`.`Submit` AS `Submit`,`T`.`CategoryId` AS `CategoryID`,`T`.`CategoryName` AS `CategoryName`,`T`.`UserId` AS `UserID`,`T`.`username` AS `Username`,`T`.`Body` AS `Body`,`T`.`Type` AS `Type`,`T`.`Level` AS `Level`,`T`.`RefrenceId` AS `RefrenceID`,`T`.`Index` AS `Index`,`T`.`Status` AS `Status`,(case when (`T`.`D2` >= `T`.`D1`) then NULL else `T`.`Content` end) AS `Content` from (select `posts`.`MasterId` AS `MasterId`,`posts`.`Id` AS `Id`,`posts`.`Title` AS `Title`,`posts`.`Submit` AS `Submit`,`posts`.`Type` AS `Type`,`posts`.`Level` AS `Level`,`posts`.`Content` AS `Content`,`posts`.`Body` AS `Body`,`posts`.`CategoryId` AS `CategoryId`,`posts`.`UserId` AS `UserId`,`posts`.`Status` AS `Status`,`posts`.`RefrenceId` AS `RefrenceId`,`posts`.`Index` AS `Index`,`posts`.`Deleted` AS `Deleted`,`posts`.`ContentDeleted` AS `ContentDeleted`,`categories`.`Name` AS `CategoryName`,`users`.`Username` AS `username`,(select `posts`.`Submit` AS `D1` from `posts` where ((`posts`.`Content` is not null) and (`posts`.`MasterId` = `posts`.`MasterId`)) order by `posts`.`Submit` desc limit 1) AS `D1`,(select `posts`.`Submit` AS `D2` from `posts` where ((`posts`.`ContentDeleted` = 1) and (`posts`.`MasterId` = `posts`.`MasterId`)) order by `posts`.`Submit` desc limit 1) AS `D2` from ((`posts` join `users` on((`posts`.`UserId` = `users`.`Id`))) join `categories` on((`posts`.`CategoryId` = `categories`.`Id`))) where (`posts`.`Id` in (select max(`posts`.`Id`) from `posts` group by `posts`.`MasterId`) and (`posts`.`Deleted` = 0))) `T`;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
USE `gordcms`;

DELIMITER $$
USE `gordcms`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `before_insert_post`
BEFORE INSERT ON `posts`
FOR EACH ROW
BEGIN
  IF new.MasterId IS NULL THEN
    SET new.MasterId = cast(uuid() as char);
  END IF;
END$$


DELIMITER ;
