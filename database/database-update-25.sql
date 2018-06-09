CREATE 
     OR REPLACE
VIEW `post_contributers` AS
    SELECT 
        `P`.`MasterId` AS `MasterID`,
        `P`.`Id` AS `ID`,
        `P`.`UserId` AS `UserID`,
        `U`.`Username` AS `Username`,
        `P`.`Submit` AS `Submit`,
        `P`.`Language` AS `Language`
    FROM
        (`posts` `P`
        JOIN `users` `U` ON ((`P`.`UserId` = `U`.`Id`)));
