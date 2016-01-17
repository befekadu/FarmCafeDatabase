use `3430-f15-t2`;
DROP procedure IF EXISTS `validateEventId`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `validateEventId`(in event_id char(5), out new_id char(5) )
BEGIN
/*remove me*/
select E.event_id
from event_don as E
where E.event_id like event_id
into new_id
;
END$$

DELIMITER ;

