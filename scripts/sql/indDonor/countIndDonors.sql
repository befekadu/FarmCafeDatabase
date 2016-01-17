use 3430-f15-t2;
DROP procedure IF EXISTS `count_ind_donors`;

DELIMITER $$
USE 3430-f15-t2$$
CREATE PROCEDURE `count_ind_donors`(OUT count INT)
BEGIN
SELECT COUNT(*) INTO count FROM ind_donor;
END$$

DELIMITER ;

