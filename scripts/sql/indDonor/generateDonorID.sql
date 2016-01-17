use `3430-f15-t2`;
DROP procedure IF EXISTS `generateDonorId`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `generateDonorId`(out return_value char(5))
Validate:BEGIN
/*Creating Variables*/
set @don_id = "I";
set@out_value = null;
set@null_id = null;
/* Create the Id */
call count_ind_donors(@out_value);
set @out_value = @out_value + 1;
set @don_id = concat(@don_id, @out_value);
/*Validate the Id */
call validateDonorId(@don_id, @new_id);
if @null_id <> null then
leave Validate;/*if the null id isn't null the id is taken */
else 
set return_value  = @don_id;
end if;
END$$

DELIMITER ;


