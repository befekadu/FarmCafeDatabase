use `3430-f15-t2`;
DROP procedure IF EXISTS `validateOrgMiscDonId`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `validateOrgMiscDonId`(in donation_id char(6), out new_id char(6))
BEGIN
/*remove me*/
select M.org_don_id
from org_misc_don as M
where M.org_don_id like donation_id
into new_id
;
END$$

DELIMITER ;

