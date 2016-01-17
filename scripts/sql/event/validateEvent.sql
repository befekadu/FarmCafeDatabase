use `3430-f15-t2`;
DROP procedure IF EXISTS `validateEvent`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `validateEvent`(in event_name varchar(25), in event_date date, out event_id char(5))
BEGIN
/*remove me*/
Select E.event_id
From event_don As E
Where E.event_name like event_date and E.event_date = event_date 
into event_id 
;
END$$

DELIMITER ;


