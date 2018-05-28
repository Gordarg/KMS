-- WITH UPDATE 19

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


CREATE TABLE IF NOT EXISTS `users` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(45) NULL DEFAULT NULL,
  `Password` TINYTEXT NULL DEFAULT NULL,
  `Image` BLOB NULL DEFAULT NULL,
  `Active` BIT(1) NULL DEFAULT b'1',
  `Role` CHAR(5) NULL DEFAULT 'VSTOR',
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `posts` (
  `MasterId` CHAR(36) NOT NULL,
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(400) NULL DEFAULT NULL,
  `Submit` DATETIME NOT NULL,
  `Type` CHAR(5) NOT NULL DEFAULT 'POST' COMMENT 'POST, FILE, ARTL, COMT, SURV, QUST, ANSR,CHAT,TRNL,QUOT',
  `Level` CHAR(2) NULL DEFAULT 'DC' COMMENT 'Data Content by default. Other SEO and publish levels must be declared with integrers.',
  `Content` LONGBLOB NULL DEFAULT NULL,
  `Body` LONGTEXT NULL DEFAULT NULL,
  `UserId` INT(11) NULL DEFAULT NULL,
  `Status` CHAR(7) NULL DEFAULT 'DRAFT' COMMENT 'Post lifecycle',
  `RefrenceId` CHAR(36) NULL DEFAULT NULL,
  `Index` SMALLINT(6) NULL DEFAULT NULL,
  `Deleted` BIT(1) NOT NULL DEFAULT b'0',
  `ContentDeleted` BIT(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`Id`, `MasterId`),
  INDEX `fk_posts_user_idx` (`UserId` ASC),
  CONSTRAINT `fk_posts_user`
    FOREIGN KEY (`UserId`)
    REFERENCES `users` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 101
DEFAULT CHARACTER SET = latin1;

-- -----------------------------------------------------
-- Placeholder table for view `post_contents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `post_contents` (`MasterId` INT, `Id` INT, `Title` INT, `Submit` INT, `Type` INT, `Level` INT, `Body` INT, `UserId` INT, `Status` INT, `RefrenceId` INT, `Index` INT, `Deleted` INT, `ContentDeleted` INT, `Username` INT, `Content` INT, `D1` INT, `D2` INT);

-- -----------------------------------------------------
-- Placeholder table for view `post_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `post_details` (`MasterID` INT, `Title` INT, `ID` INT, `Submit` INT, `UserID` INT, `Username` INT, `Body` INT, `Type` INT, `Level` INT, `RefrenceID` INT, `Index` INT, `Status` INT, `Content` INT);

-- -----------------------------------------------------
-- View `post_contents`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `post_contents`;

CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_contents` AS select `P`.`MasterId` AS `MasterId`,`P`.`Id` AS `Id`,`P`.`Title` AS `Title`,`P`.`Submit` AS `Submit`,`P`.`Type` AS `Type`,`P`.`Level` AS `Level`,`P`.`Body` AS `Body`,`P`.`UserId` AS `UserId`,`P`.`Status` AS `Status`,`P`.`RefrenceId` AS `RefrenceId`,`P`.`Index` AS `Index`,`P`.`Deleted` AS `Deleted`,`P`.`ContentDeleted` AS `ContentDeleted`,`users`.`Username` AS `Username`,(select `P0`.`Content` AS `Content` from `posts` `P0` where ((`P0`.`Content` is not null) and (`P`.`MasterId` = `P0`.`MasterId`)) order by `P0`.`Submit` desc limit 1) AS `Content`,(select `P1`.`Submit` AS `D1` from `posts` `P1` where ((`P1`.`Content` is not null) and (`P`.`MasterId` = `P1`.`MasterId`)) order by `P1`.`Submit` desc limit 1) AS `D1`,(select `P2`.`Submit` AS `D2` from `posts` `P2` where ((`P2`.`ContentDeleted` = 1) and (`P`.`MasterId` = `P2`.`MasterId`)) order by `P2`.`Submit` desc limit 1) AS `D2` from (`posts` `P` join `users` on((`P`.`UserId` = `users`.`Id`))) where (`P`.`Id` in (select max(`posts`.`Id`) from `posts` group by `posts`.`MasterId`) and (`P`.`Deleted` = 0));

-- -----------------------------------------------------
-- View `post_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `post_details`;

CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_details` AS select `T`.`MasterId` AS `MasterID`,`T`.`Title` AS `Title`,`T`.`Id` AS `ID`,`T`.`Submit` AS `Submit`,`T`.`UserId` AS `UserID`,`T`.`Username` AS `Username`,`T`.`Body` AS `Body`,`T`.`Type` AS `Type`,`T`.`Level` AS `Level`,`T`.`RefrenceId` AS `RefrenceID`,`T`.`Index` AS `Index`,`T`.`Status` AS `Status`,(case when (`T`.`D2` >= `T`.`D1`) then NULL else `T`.`Content` end) AS `Content` from `post_contents` `T`;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;