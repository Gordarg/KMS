CREATE 
     OR REPLACE
VIEW `post_details` AS
		SELECT
        T.`MasterId` as MasterID,
        T.`Title`,
        T.`Id` as ID,
		T.`Submit`,
		T.`CategoryID`,
		T.`CategoryName`,
		T.`UserId` as UserID,
		T.`Username`,
		T.`Body`,
		T.`Type`,
		T.`Level`,
		T.`RefrenceId` as RefrenceID,
		T.`Index`,
		T.`Status`,
		CASE WHEN D2 >= D1 THEN NULL ELSE `Content` END AS `Content`
        FROM
        (SELECT
        `posts`.*,
        `categories`.`Name` AS `CategoryName`,
        `users`.`username`,
        (SELECT  Submit as D1 FROM posts WHERE `Content` IS NOT NULL and `MasterId` = `posts`.`MasterId` order by `Submit` desc limit 1
		) as D1
		,
		(SELECT  Submit as D2 FROM posts WHERE `ContentDeleted` = 1 and `MasterId` = `posts`.`MasterId` order by `Submit` desc limit 1
		) as D2
    FROM
        ((`posts`
        JOIN `users` ON ((`posts`.`UserId` = `users`.`id`)))
        JOIN `categories` ON ((`posts`.`CategoryId` = `categories`.`Id`)))
    WHERE
        (`posts`.`Id` IN (SELECT 
                MAX(`posts`.`Id`)
            FROM
                `posts`
            GROUP BY `posts`.`MasterId`)
            AND (`posts`.`Deleted` = 0))) T;
