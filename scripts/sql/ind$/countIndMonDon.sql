use `3430-f15-t2`;
DROP procedure IF EXISTS `count_ind_mon_don`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE  PROCEDURE `count_ind_mon_don`(out count int)
BEGIN
/*remove*/
select count(*) into count from ind_mon_don;
END$$

DELIMITER ;


