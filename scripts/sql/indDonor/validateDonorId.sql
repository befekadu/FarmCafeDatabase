use `3430-f15-t2`;
DROP procedure IF EXISTS `validateDonorId`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `validateDonorId`(in don_id char(5), out new_id char(5))
BEGIN
/*remove me*/
select D.don_id
from ind_donor as D
where D.don_id like don_id
into new_id
;
END$$

DELIMITER ;


