use `3430-f15-t2`;
DROP procedure IF EXISTS `insertIndMiscDon`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `insertIndMiscDon`(
in ind_misc_id char(6),
 in don_date date, 
 in description text, 
 in ind_don_id char(5),
 in event_id char(5)
 )
BEGIN
insert into ind_misc_donor values(
ind_misc_id,
don_date,
description,
ind_don_id,
event_id
);
END$$

DELIMITER ;

