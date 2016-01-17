use `3430-f15-t2`;
DROP procedure IF EXISTS `count_org_mon_don`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `count_org_mon_don`(out count int)
BEGIN
/*remove me*/
select count(org_mon_don) into count;
END$$

DELIMITER ;


