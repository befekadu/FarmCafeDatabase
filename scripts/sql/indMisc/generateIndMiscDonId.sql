use `3430-f15-t2`;
DROP procedure IF EXISTS `generateIndMiscDonId`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `generateIndMiscDonId`(out return_value Char(6))
validate:BEGIN
/*remove me*/
/*Creating Variables*/
set @donation_id = "IM";
set@out_value = null;
set@null_id = null;
/* Create the Id */
call count_ind_misc_don(@out_value);
set @out_value = @out_value + 1;
set @donation_id = concat(@donation_id, @out_value);
/*Validate the Id */
call validateIndMiscDonId(@donation_id, @new_id);
if @null_id <> null then
leave validate;/*if the null id isn't null the id is taken */
else 
set return_value  = @donation_id;
end if;
END$$

DELIMITER ;

