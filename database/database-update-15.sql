ALTER TABLE `categories` 
ADD COLUMN `Father` INT(11) NULL AFTER `Name`,
ADD INDEX `fk_categories_1_idx` (`Father` ASC);
ALTER TABLE `gordcms`.`categories` 
ADD CONSTRAINT `fk_categories_1`
  FOREIGN KEY (`Father`)
  REFERENCES `categories` (`Id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;



ALTER TABLE `users` 
CHANGE COLUMN `id` `Id` INT(11) NOT NULL AUTO_INCREMENT ,
CHANGE COLUMN `username` `Username` VARCHAR(45) NULL DEFAULT NULL ,
CHANGE COLUMN `password` `Password` TINYTEXT NULL DEFAULT NULL ;