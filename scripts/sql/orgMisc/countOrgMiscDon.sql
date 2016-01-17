use `3430-f15-t2`;
DROP procedure IF EXISTS `count_org_misc_don`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE  PROCEDURE `count_org_misc_don`(out count int)
BEGIN
/*remove me*/
select count(*) into count from org_misc_don;
END$$

DELIMITER ;


