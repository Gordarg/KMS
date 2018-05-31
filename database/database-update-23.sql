CREATE VIEW `post_contributers` AS
select `P`.`MasterId` AS `MasterID`,
`P`.`Id` AS `ID`,
`P`.`UserId` AS `UserID`,
`U`.`Username` AS `Username`,
`P`.`Submit` AS `Submit`
from `posts` `P` join `users` `U` on `P`.`UserID` = `U`.`Id`;