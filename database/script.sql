-- MySQL Workbench Forward Engineering


-- With update 28
-- Version 1.8.0.0

-- -----------------------------------------------------
-- Schema gordcms
-- -----------------------------------------------------

-- CREATE SCHEMA IF NOT EXISTS `gordcms` DEFAULT CHARACTER SET latin1 ;
-- USE `gordcms` ;

-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(45) NULL DEFAULT NULL,
  `Password` TINYTEXT NULL DEFAULT NULL,
  `Active` BIT(1) NULL DEFAULT b'1',
  `Role` CHAR(5) NULL DEFAULT 'VSTOR',
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Username` (`Username` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 20
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
  `Language` VARCHAR(5) NULL DEFAULT 'fa-IR',
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
AUTO_INCREMENT = 221
DEFAULT CHARACTER SET = latin1;

-- USE `gordcms` ;

-- -----------------------------------------------------
-- Placeholder table for view `post_contributers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `post_contributers` (`MasterID` INT, `ID` INT, `UserID` INT, `Username` INT, `Submit` INT, `Language` INT);

-- -----------------------------------------------------
-- Placeholder table for view `post_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `post_details` (`MasterID` INT, `Title` INT, `ID` INT, `Submit` INT, `UserID` INT, `Username` INT, `Body` INT, `Type` INT, `Level` INT, `RefrenceID` INT, `Index` INT, `Status` INT, `Language` INT, `Content` INT);

-- -----------------------------------------------------
-- View `post_contributers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `post_contributers`;
-- USE `gordcms`;
CREATE OR REPLACE VIEW `post_contributers` AS select `P`.`MasterId` AS `MasterID`,`P`.`Id` AS `ID`,`P`.`UserId` AS `UserID`,`U`.`Username` AS `Username`,`P`.`Submit` AS `Submit`,`P`.`Language` AS `Language` from (`posts` `P` join `users` `U` on((`P`.`UserId` = `U`.`Id`)));

-- -----------------------------------------------------
-- View `post_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `post_details`;
-- USE `gordcms`;
CREATE OR REPLACE VIEW `post_details` AS select `P`.`MasterId` AS `MasterID`,`P`.`Title` AS `Title`,`P`.`Id` AS `ID`,`P`.`Submit` AS `Submit`,`P`.`UserId` AS `UserID`,`U`.`Username` AS `Username`,`P`.`Body` AS `Body`,`P`.`Type` AS `Type`,`P`.`Level` AS `Level`,`P`.`RefrenceId` AS `RefrenceID`,`P`.`Index` AS `Index`,`P`.`Status` AS `Status`,`P`.`Language` AS `Language`,(case when ((select `P2`.`Submit` from `posts` `P2` where ((`P2`.`ContentDeleted` = 1) and (`P`.`MasterId` = `P2`.`MasterId`)) order by `P2`.`Submit` desc limit 1) > (select `P1`.`Submit` from `posts` `P1` where ((`P1`.`Content` is not null) and (`P`.`MasterId` = `P1`.`MasterId`)) order by `P1`.`Submit` desc limit 1)) then NULL else (select `P1`.`Content` from `posts` `P1` where ((`P1`.`Content` is not null) and (`P`.`MasterId` = `P1`.`MasterId`)) order by `P1`.`Submit` desc limit 1) end) AS `Content` from (`posts` `P` join `users` `U` on((`P`.`UserId` = `U`.`Id`))) where (`P`.`Id` in (select max(`posts`.`Id`) from `posts` group by `posts`.`MasterId`,`posts`.`Language`) and (`P`.`Deleted` = '0'));