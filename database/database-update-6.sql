ALTER TABLE `posts` 
ADD COLUMN `MasterId` CHAR(36) NULL FIRST;

-- `Id` can be used as version
-- TODO: views -> post_details -> group by `MasterId` order by `Id`

use gordcms


DELIMITER ;;
CREATE TRIGGER before_insert_post
BEFORE INSERT ON posts
FOR EACH ROW
BEGIN
  IF new.MasterId IS NULL THEN
    SET new.MasterId = cast(uuid() as char);
  END IF;
END
;;