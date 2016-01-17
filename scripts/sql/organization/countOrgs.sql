use `3430-f15-t2`;
DROP procedure IF EXISTS `count_org_donors`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `count_org_donors`(out count int)
BEGIN
/*remove me*/
select count(*) from org_donor into count;
END$$

DELIMITER ;


