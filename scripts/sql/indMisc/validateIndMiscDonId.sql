USE `3430-f15-t2`;
DROP procedure IF EXISTS `validateIndMiscDonId`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `validateIndMiscDonId`(in donation_id char(6), out new_id char(6))
BEGIN
/*remove me*/
select M.org_id
from ind_misc_don as M
where M.ind_misc_id like donation_id
into new_id
;
END$$

DELIMITER ;

