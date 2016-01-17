USE `3430-f15-t2`;
DROP procedure IF EXISTS `insertOMoneyDonation`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE  PROCEDURE `insertOrg$Donor`(
in org_mon_id char(6), 
in don_value double(8,2),
in  don_date date,
in reciept_date date,
in org_don_id char(5),
in event_id char(5)
)
BEGIN
/*remove me*/
insert into org_mon_don values(
org_mon_id,
don_value,
don_date,
reciept_date,
org_don_id,
event_id
);

END$$

DELIMITER ;
