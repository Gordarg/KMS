-- TODO: Content for each language

CREATE OR REPLACE VIEW gordcms.`post_details`
AS select
`P`.`MasterId` AS `MasterID`,
`P`.`Title` AS `Title`,
`P`.`Id` AS `ID`,
`P`.`Submit` AS `Submit`,
`P`.`UserId` AS `UserID`,
`U`.`Username` AS `Username`,
`P`.`Body` AS `Body`,
`P`.`Type` AS `Type`,
`P`.`Level` AS `Level`,
`P`.`RefrenceId` AS `RefrenceID`,
`P`.`Index` AS `Index`,
`P`.`Status` AS `Status`,
`P`.`Language` as `Language`,

(case when (
    (select `P2`.`Submit` from `posts` `P2`
        where (
        (`P2`.`ContentDeleted` = 1)
        and (`P`.`MasterId` = `P2`.`MasterId`)
        -- and (`P`.`Language` = `P2`.`Language`)
        )
        order by `P2`.`Submit` desc limit 1)
    >
    (select `P1`.`Submit` from `posts` `P1`
        where (
        (`P1`.`Content` is not null)
        and (`P`.`MasterId` = `P1`.`MasterId`)
		-- and (`P`.`Language` = `P1`.`Laguage`)
        )
        order by `P1`.`Submit` desc limit 1)
    )
then NULL
else
(select `P3`.`Content` from `posts` `P3` where
		(
        (`P3`.`Content` is not null)
        -- and (`P`.`Language` = `P3`.`Language`)
        and (`P`.`MasterId` = `P3`.`MasterId`)
        )
        order by `P3`.`Submit` desc limit 1)        
end)
    AS `Content`

from(`posts` `P` join `users` `U` on ((`P`.`UserId` = `U`.`Id`)))
	where
		(`P`.`Id` in (select max(`posts`.`Id`)
		from `posts` where
        `posts`.`Deleted` = 0
        group by `posts`.`Language`, `posts`.`MasterId`)
        )