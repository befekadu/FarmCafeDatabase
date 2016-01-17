use `3430-f15-t2`;
DROP procedure IF EXISTS `insertDonor`;

DELIMITER $$
USE `3430-f15-t2`$$
CREATE PROCEDURE `insertDonor`(
in fname varchar(20),
in mi char(1),
in lname varchar(20),
in phone char(20),
in email varchar(50),
in don_id char(5),
in org_id char(5)
)
BEGIN
/* remove me*/
insert into ind_donor values(
fname,
lname,
phone,
email,
don_id,
org_id
);
END$$

DELIMITER ;


