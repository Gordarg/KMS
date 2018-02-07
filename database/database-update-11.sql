CREATE 
 OR REPLACE
VIEW `post_details` AS
    SELECT 
        `posts`.`MasterId` AS `MasterID`,
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
        JOIN `categories` ON ((`posts`.`CategoryId` = `categories`.`Id`)))
    WHERE
        `posts`.`Id` IN (SELECT 
                MAX(`posts`.`Id`)
            FROM
                `posts`
            GROUP BY `posts`.`MasterId`)