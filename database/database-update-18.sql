

ALTER VIEW `post_contents` AS



select `P`.`MasterId`,
`P`.`Id`,
`P`.`Title`,
`P`.`Submit`,
`P`.`Type`,
`P`.`Level`,
`P`.`Body`,
`P`.`UserId`,
`P`.`Status`,
`P`.`RefrenceId`,
`P`.`Index`,
`P`.`Deleted`,
`P`.`ContentDeleted`,
`users`.`Username`,

(select `P0`.`Content` AS `Content`
    from `posts` as `P0` where
        (
            (`P0`.`Content` is not null)
        and (`P`.`MasterId` = `P0`.`MasterId`)
        )
        order by `P0`.`Submit` desc limit 1) AS `Content`,

(select `P1`.`Submit` AS `D1`
    from `posts` as `P1` where
        (
            (`P1`.`Content` is not null)
        and (`P`.`MasterId` = `P1`.`MasterId`)
        )
        order by `P1`.`Submit` desc limit 1) AS `D1`,

(select `P2`.`Submit` AS `D2`
    from `posts` as `P2` where
    (
        (`P2`. `ContentDeleted` = 1)
    and (`P`.`MasterId` = `P2`.`MasterId`)
    )
    order by `P2`.`Submit` desc limit 1) AS `D2`
    
from (`posts` as `P` join `users` on((`P`.`UserId` = `users`.`Id`)))
where (`P`.`Id` in (select max(`posts`.`Id`) from `posts` as `P` group by `P`.`MasterId`)
and (`P`.`Deleted` = 0))