ALTER TABLE `posts` 
ADD COLUMN `MasterId` CHAR(36) NULL FIRST;

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