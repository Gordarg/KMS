ALTER TABLE `posts` 
DROP FOREIGN KEY `fk_posts_1`;
ALTER TABLE `posts` 
CHANGE COLUMN `RefrenceId` `RefrenceId` CHAR(36) NULL DEFAULT NULL ,
DROP INDEX `fk_posts_1_idx` ;
ALTER TABLE `posts` 
CHANGE COLUMN `MasterId` `MasterId` CHAR(36) NOT NULL ,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`Id`, `MasterId`);




/*
TODO: Create Foreign key


ALTER TABLE `posts` 
ADD CONSTRAINT `fk_posts_refrence`
  FOREIGN KEY (RefrenceId)
  REFERENCES `posts` (MasterId)
  ON DELETE SET NULL
  ON UPDATE CASCADE;
*/





CREATE OR REPLACE VIEW `post_contents` AS
    SELECT 
        `posts`.`MasterId` AS `MasterId`,
        `posts`.`Id` AS `Id`,
        `posts`.`Title` AS `Title`,
        `posts`.`Submit` AS `Submit`,
        `posts`.`Type` AS `Type`,
        `posts`.`Level` AS `Level`,
        `posts`.`Content` AS `Content`,
        `posts`.`Body` AS `Body`,
        `posts`.`CategoryId` AS `CategoryId`,
        `posts`.`UserId` AS `UserId`,
        `posts`.`Status` AS `Status`,
        `posts`.`RefrenceId` AS `RefrenceId`,
        `posts`.`Index` AS `Index`,
        `posts`.`Deleted` AS `Deleted`,
        `posts`.`ContentDeleted` AS `ContentDeleted`,
        `categories`.`Name` AS `CategoryName`,
        `users`.`Username` AS `username`,
        (SELECT 
                `posts`.`Submit` AS `D1`
            FROM
                `posts`
            WHERE
                ((`posts`.`Content` IS NOT NULL)
                    AND (`posts`.`MasterId` = `posts`.`MasterId`))
            ORDER BY `posts`.`Submit` DESC
            LIMIT 1) AS `D1`,
        (SELECT 
                `posts`.`Submit` AS `D2`
            FROM
                `posts`
            WHERE
                ((`posts`.`ContentDeleted` = 1)
                    AND (`posts`.`MasterId` = `posts`.`MasterId`))
            ORDER BY `posts`.`Submit` DESC
            LIMIT 1) AS `D2`
    FROM
        ((`posts`
        JOIN `users` ON ((`posts`.`UserId` = `users`.`Id`)))
        LEFT OUTER JOIN `categories` ON ((`posts`.`CategoryId` = `categories`.`Id`)))
    WHERE
        (`posts`.`Id` IN (SELECT 
                MAX(`posts`.`Id`)
            FROM
                `posts`
            GROUP BY `posts`.`MasterId`)
            AND (`posts`.`Deleted` = 0))