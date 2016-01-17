use `3430-f15-t2`;
DROP procedure IF EXISTS `generateOrgId`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `generateOrgId`(out return_value Char(5))
validate:BEGIN
/*remove me*/
/*Creating Variables*/
set @org_id = "O";
set@out_value = null;
set@null_id = null;
/* Create the Id */
call count_org_donors(@out_value);
set @out_value = @out_value + 1;
set @org_id = concat(@org_id, @out_value);
/*Validate the Id */
call validateOrgId(@org_id, @new_id);
if @null_id <> null then
leave validate;/*if the null id isn't null the id is taken */
else 
set return_value  = @org_id;
end if;
END$$

DELIMITER ;

