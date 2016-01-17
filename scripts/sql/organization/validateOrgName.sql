use `3430-f15-t2`;
DROP procedure IF EXISTS `validateOrgName`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `validateOrgName`(In org_name VarChar(25), Out org_id Char(5))
BEGIN
/*remove me*/
Select O.org_id 
From org_donor As O
Where O.org_name Like org_name
into org_id
;
END$$

DELIMITER ;
