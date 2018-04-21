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
        `gordcms`.`posts`.`MasterId` AS `MasterId`,
        `gordcms`.`posts`.`Id` AS `Id`,
        `gordcms`.`posts`.`Title` AS `Title`,
        `gordcms`.`posts`.`Submit` AS `Submit`,
        `gordcms`.`posts`.`Type` AS `Type`,
        `gordcms`.`posts`.`Level` AS `Level`,
        `gordcms`.`posts`.`Content` AS `Content`,
        `gordcms`.`posts`.`Body` AS `Body`,
        `gordcms`.`posts`.`CategoryId` AS `CategoryId`,
        `gordcms`.`posts`.`UserId` AS `UserId`,
        `gordcms`.`posts`.`Status` AS `Status`,
        `gordcms`.`posts`.`RefrenceId` AS `RefrenceId`,
        `gordcms`.`posts`.`Index` AS `Index`,
        `gordcms`.`posts`.`Deleted` AS `Deleted`,
        `gordcms`.`posts`.`ContentDeleted` AS `ContentDeleted`,
        `gordcms`.`categories`.`Name` AS `CategoryName`,
        `gordcms`.`users`.`Username` AS `username`,
        (SELECT 
                `gordcms`.`posts`.`Submit` AS `D1`
            FROM
                `gordcms`.`posts`
            WHERE
                ((`gordcms`.`posts`.`Content` IS NOT NULL)
                    AND (`gordcms`.`posts`.`MasterId` = `gordcms`.`posts`.`MasterId`))
            ORDER BY `gordcms`.`posts`.`Submit` DESC
            LIMIT 1) AS `D1`,
        (SELECT 
                `gordcms`.`posts`.`Submit` AS `D2`
            FROM
                `gordcms`.`posts`
            WHERE
                ((`gordcms`.`posts`.`ContentDeleted` = 1)
                    AND (`gordcms`.`posts`.`MasterId` = `gordcms`.`posts`.`MasterId`))
            ORDER BY `gordcms`.`posts`.`Submit` DESC
            LIMIT 1) AS `D2`
    FROM
        ((`gordcms`.`posts`
        JOIN `gordcms`.`users` ON ((`gordcms`.`posts`.`UserId` = `gordcms`.`users`.`Id`)))
        LEFT OUTER JOIN `gordcms`.`categories` ON ((`gordcms`.`posts`.`CategoryId` = `gordcms`.`categories`.`Id`)))
    WHERE
        (`gordcms`.`posts`.`Id` IN (SELECT 
                MAX(`gordcms`.`posts`.`Id`)
            FROM
                `gordcms`.`posts`
            GROUP BY `gordcms`.`posts`.`MasterId`)
            AND (`gordcms`.`posts`.`Deleted` = 0))