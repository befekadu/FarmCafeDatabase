use `3430-f15-t2`;
DROP procedure IF EXISTS `insertOrgMiscDonor`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `insertOrgMiscDonor`(
in org_misc_id char(6), 
in don_date date, 
in description text, 
in ord_don_id char(5),
in event_id char(5))
BEGIN
/*remove me*/
insert into org_misc_donor values(
org_misc_id,
don_date,
description,
org_don_id,
event_id
);
END$$

DELIMITER ;

