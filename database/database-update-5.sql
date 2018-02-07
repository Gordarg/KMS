ALTER TABLE `posts` 
CHANGE COLUMN `Type` `Type` CHAR(5) NOT NULL DEFAULT 'POST' COMMENT 'POST, FILE, ARTL, COMT, SURV, QUST, ANSR' ,
CHANGE COLUMN `Level` `Level` CHAR(2) NOT NULL DEFAULT 'DC' COMMENT 'Data Content by default. Other SEO and publish levels must be declared with integrers.' ,
ADD COLUMN `Status` CHAR(7) NULL DEFAULT 'DRAFT' COMMENT 'Post lifecycle' AFTER `UserId`,
ADD COLUMN `RefrenceId` INT NULL AFTER `Status`,
ADD COLUMN `Index` SMALLINT NULL AFTER `RefrenceId`,
ADD INDEX `fk_posts_1_idx` (`RefrenceId` ASC);
ALTER TABLE `posts` 
ADD CONSTRAINT `fk_posts_1`
  FOREIGN KEY (`RefrenceId`)
  REFERENCES `posts` (`Id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


ALTER TABLE `posts` 
DROP FOREIGN KEY `fk_posts_category`;
ALTER TABLE `posts` 
CHANGE COLUMN `Title` `Title` VARCHAR(400) NULL ,
CHANGE COLUMN `Level` `Level` CHAR(2) NULL DEFAULT 'DC' COMMENT '‍‍‍`Data Content` by default. Other SEO and publish levels must be declared with integrers.' ,
CHANGE COLUMN `CategoryId` `CategoryId` INT(11) NULL ;
ALTER TABLE `posts` 
ADD CONSTRAINT `fk_posts_category`
  FOREIGN KEY (`CategoryId`)
  REFERENCES `categories` (`Id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


CREATE OR REPLACE VIEW `post_details` AS
    SELECT 
        `posts`.`Id` AS `ID`,
        `posts`.`Title` AS `Title`,
        `posts`.`Submit` AS `Submit`,
        `categories`.`Id` AS `CategoryID`,
        `categories`.`Name` AS `CategoryName`,
        `users`.`id` AS `UserID`,
        `users`.`username` AS `Username`,
        `posts`.`Body` AS `Body`,
        `posts`.`Content` AS `Content`,
        `posts`.`Type` AS `Type`,
        `posts`.`Level` AS `Level`,
        `posts`.`RefrenceId` AS `RefrenceID`,
        `posts`.`Index` AS `Index`,
        `posts`.`Status` AS `Status`
    FROM
        ((`posts`
        JOIN `users` ON ((`posts`.`UserId` = `users`.`id`)))
        JOIN `categories` ON ((`posts`.`CategoryId` = `categories`.`Id`)));
