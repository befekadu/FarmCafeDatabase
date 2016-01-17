use `3430-f15-t2`;
DROP procedure IF EXISTS `validateIMoneyDonationId`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE  PROCEDURE `validateIMoneyDonationId`(in donation_id char(6), out new_id char(6))
BEGIN
/*remove*/
select $.org_id
from ind_mon_don as $
where $.ind_mon_id like donation_id
into new_id
;
END$$

DELIMITER ;
