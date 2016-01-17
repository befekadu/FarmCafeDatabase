use `3430-f15-t2`;
DROP procedure IF EXISTS `insertIMoneyDonation`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `insertIMoneyDonation`(
in ind_mon_id char(6),
in don_value double(8,2),
in don_date date,
in reciept_date date,
in ind_don_id char(5),
in pay_type enum('paypal'),
in event_id char(5)
)
BEGIN
/*remove*/
insert into ind_mon_don values(
ind_mon_id,
don_value,
don_date,
reciept_date,
ind_don_id,
pay_type,
event_id
);
END$$

DELIMITER ;

