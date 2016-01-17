USE `3430-f15-t2`;
DROP procedure IF EXISTS `validateIndDonor`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `validateIndDonor`(In f_name varchar(25), in l_name varchar(25), out donor_id varchar(25))
BEGIN
/*remove me*/
Select D.don_id
From ind_donor As D
Where D.fname like f_name and lname like l_name
into donor_id 
;
END$$

DELIMITER ;

