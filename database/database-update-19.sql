ALTER VIEW `post_details` AS
select
`T`.`MasterId` AS `MasterID`,
`T`.`Title` AS `Title`,
`T`.`Id` AS `ID`,
`T`.`Submit` AS `Submit`,
`T`.`UserId` AS `UserID`,
`T`.`username` AS `Username`,
`T`.`Body` AS `Body`,
`T`.`Type` AS `Type`,
`T`.`Level` AS `Level`,
`T`.`RefrenceId` AS `RefrenceID`,
`T`.`Index` AS `Index`,
`T`.`Status` AS `Status`,

(case
    when (`T`.`D2` >= `T`.`D1`)
        then NULL
    else `T`.`Content`
    end)
        AS `Content`
        
from `post_contents` `T`;