use `3430-f15-t2`;
DROP procedure IF EXISTS `generateEventId`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `generateEventId`(out return_value char(5))
validate:BEGIN
/*remove me*/
/*Creating Variables*/
set @event_id = "E";
set@out_value = null;
set@null_id = null;
/* Create the Id */
call count_event_don(@out_value);
set @out_value = @out_value + 1;
set @event_id = concat(@event_id, @out_value);
/*Validate the Id */
call validateEventId(@event_id, @new_id);
if @null_id <> null then
leave validate;/*if the null id isn't null the id is taken */
else 
set return_value  = @event_id;
end if;
END$$

DELIMITER ;

