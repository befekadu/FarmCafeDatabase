use `3430-f15-t2`;
DROP procedure IF EXISTS `validateOMoneyDonationId`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `validateOrg$DonId`(in donation_id char(6), out new_id char(6))
BEGIN
/*remove me*/
select $.org_mon_id
from org_mon_don as $
where $.org_mon_id like donation_id
into new_id
;
END$$

DELIMITER ;


