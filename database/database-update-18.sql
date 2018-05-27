ALTER VIEW `post_contents` AS



select `posts`.`MasterId`,
`posts`.`Id`,
`posts`.`Title`,
`posts`.`Submit`,
`posts`.`Type`,
`posts`.`Level`,
`posts`.`Body`,
`posts`.`UserId`,
`posts`.`Status`,
`posts`.`RefrenceId`,
`posts`.`Index`,
`posts`.`Deleted`,
`posts`.`ContentDeleted`,
`users`.`Username`,

(select `posts`.`Content` AS `Content`
    from `posts` where
        (`posts`.`Content` is not null)
        order by `posts`.`Submit` desc limit 1) AS `Content`,

(select `posts`.`Submit` AS `D1`
    from `posts` where
        (`posts`.`Content` is not null)
        order by `posts`.`Submit` desc limit 1) AS `D1`,

(select `posts`.`Submit` AS `D2`
    from `posts` as `P` where
    (`posts`.`ContentDeleted` = 1)
    order by `posts`.`Submit` desc limit 1) AS `D2`
    
from (`posts` join `users` on((`posts`.`UserId` = `users`.`Id`)))
where (`posts`.`Id` in (select max(`posts`.`Id`) from `posts` group by `posts`.`MasterId`)
and (`posts`.`Deleted` = 0))