CREATE 
     OR REPLACE 
VIEW `post_details` AS
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
        `posts`.`Type` AS `Type`
    FROM
        ((`posts`
        JOIN `users` ON ((`posts`.`UserId` = `users`.`id`)))
        JOIN `categories` ON ((`posts`.`CategoryId` = `categories`.`Id`)));
