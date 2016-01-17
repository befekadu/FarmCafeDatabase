use `3430-f15-t2`;
DROP procedure IF EXISTS `count_event_don`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `count_event_don`(out count int)
BEGIN
/*remove me*/
select count(*) into count from event_don;
END$$

DELIMITER ;


