use `3430-f15-t2`;
DROP procedure IF EXISTS `insertEvent`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `insertEvent`(
in event_id char(5),
in event_name varchar(25),
in event_date date,
in income double(8,2),
in expenses double(8,2)
)
/*remove me*/
BEGIN
insert into event_don values(
event_id,
event_name,
event_date,
income,
expenses
);
END$$

DELIMITER ;

