use `3430-f15-t2`;
DROP procedure IF EXISTS `insertOrg`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `insertOrg`(in org_name varchar(25), in org_address varchar(50), in org_id char(5))
BEGIN
/*remove me*/
insert into org_donor values(
org_name, org_address, org_id
);
END$$

DELIMITER ;


