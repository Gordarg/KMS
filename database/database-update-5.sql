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


CREATE OR REPLACE VIEW `gordcms`.`post_details` AS
    SELECT 
        `gordcms`.`posts`.`Id` AS `ID`,
        `gordcms`.`posts`.`Title` AS `Title`,
        `gordcms`.`posts`.`Submit` AS `Submit`,
        `gordcms`.`categories`.`Id` AS `CategoryID`,
        `gordcms`.`categories`.`Name` AS `CategoryName`,
        `gordcms`.`users`.`id` AS `UserID`,
        `gordcms`.`users`.`username` AS `Username`,
        `gordcms`.`posts`.`Body` AS `Body`,
        `gordcms`.`posts`.`Content` AS `Content`,
        `gordcms`.`posts`.`Type` AS `Type`,
        `gordcms`.`posts`.`Level` AS `Level`,
        `gordcms`.`posts`.`RefrenceId` AS `RefrenceID`,
        `gordcms`.`posts`.`Index` AS `Index`,
        `gordcms`.`posts`.`Status` AS `Status`
    FROM
        ((`gordcms`.`posts`
        JOIN `gordcms`.`users` ON ((`gordcms`.`posts`.`UserId` = `gordcms`.`users`.`id`)))
        JOIN `gordcms`.`categories` ON ((`gordcms`.`posts`.`CategoryId` = `gordcms`.`categories`.`Id`)));
