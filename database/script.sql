-- WITH UPDATE 15


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
-- -----------------------------------------------------
-- Placeholder table for view `post_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `post_details` (`MasterID` INT, `Title` INT, `ID` INT, `Submit` INT, `CategoryID` INT, `CategoryName` INT, `UserID` INT, `Username` INT, `Body` INT, `Type` INT, `Level` INT, `RefrenceID` INT, `Index` INT, `Status` INT, `Content` INT);

-- -----------------------------------------------------
-- View `post_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `post_details`;

CREATE OR REPLACE
View `post_contents` AS
SELECT
        `posts`.*,
        `categories`.`Name` AS `CategoryName`,
        `users`.`username`,
        (
            SELECT  Submit as D1 FROM posts WHERE `Content` IS NOT NULL and `MasterId` = `posts`.`MasterId` order by `Submit` desc limit 1
		) as D1
		,
		(
            SELECT  Submit as D2 FROM posts WHERE `ContentDeleted` = 1 and `MasterId` = `posts`.`MasterId` order by `Submit` desc limit 1
		) as D2
    FROM
        ((`posts`
        JOIN `users` ON ((`posts`.`UserId` = `users`.`id`)))
        JOIN `categories` ON ((`posts`.`CategoryId` = `categories`.`Id`)))
    WHERE
        (`posts`.`Id` IN (SELECT 
                MAX(`posts`.`Id`)
            FROM
                `posts`
            GROUP BY `posts`.`MasterId`)
            AND (`posts`.`Deleted` = 0));

CREATE 
     OR REPLACE
VIEW `post_details` AS
		SELECT
        T.`MasterId` as MasterID,
        T.`Title`,
        T.`Id` as ID,
		T.`Submit`,
		T.`CategoryID`,
		T.`CategoryName`,
		T.`UserId` as UserID,
		T.`Username`,
		T.`Body`,
		T.`Type`,
		T.`Level`,
		T.`RefrenceId` as RefrenceID,
		T.`Index`,
		T.`Status`,
		CASE WHEN D2 >= D1 THEN NULL ELSE `Content` END AS `Content`
        FROM `post_contents` T;


-- SET SQL_MODE=@OLD_SQL_MODE;
-- SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
-- SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


DELIMITER $$

CREATE
TRIGGER `before_insert_post`
BEFORE INSERT ON `posts`
FOR EACH ROW
BEGIN
  IF new.MasterId IS NULL THEN
    SET new.MasterId = cast(uuid() as char);
  END IF;
END$$


DELIMITER ;
