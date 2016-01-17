use `3430-f15-t2`;
DROP procedure IF EXISTS `validateOrgId`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `validateOrgId`(in org_id Char(5), out new_id Char(5))
BEGIN
/*remove me */
select O.org_id
from org_donor as O
where O.org_id like org_id
into new_id
;
END$$

DELIMITER ;

