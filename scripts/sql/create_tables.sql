

/* creates the tables for the farmcafe database */

set foreign_key_checks = 0;

/* assign the proper schema */
use 3430-f15-t2;

/* creating the individudal donor table and it's constraints */

create table ind_donor(
address varchar(50),
phone_no char(12) check( phone_no like "%___-___-____%"),
email varchar(50) check (email like "%@%"),
fname varchar(20) not null,
lname varchar(20) not null,
mi char(1),
don_id char(5) primary key check( don_id like "%I____%"),
org_id char(5),
constraint org_id_fk foreign key(org_id) references org_donor(org_id),
unique(fname,lname)
);
/* creating the organization donor table and it's constraints */

create table org_donor(
org_name varchar(25) unique,
address varchar(50),
org_id char(5) primary key check(org_id like "%O____%")
);

/* creating the event table and its constraints */

create table event_don(
event_id char(5) primary key check(event_id like "%E____%"),
event_name varchar(25),
event_date date,
income double(8,2) check( income >= 0),
expenses double(8,2) check(income >= 0),
unique(event_name, event_date)
);

/* creating the weak entity types and their lookup tables */
create table ind_mon_don(
ind_mon_id  char(6) unique check (ind_mon_id like "%I$____%"),
don_value double(8,2) not null check(don_value > 0),
don_date date not null,
reciept_date date not null check(reciept_date >= don_date),
ind_don_id char(5),
pay_type enum('paypal'),
event_id Char(5),
constraint event_id_fk foreign key(event_id) references event_don(event_id),
constraint ind_id_fk1 foreign key(ind_don_id) references ind_donor(don_id), 
primary key(ind_mon_id, ind_don_id)
);

create table ind_misc_don(
ind_misc_id char(6) unique check(ind_misc_id like "%IM____%"),
don_date date,
description text,
ind_don_id char(5),
event_id Char(5),
constraint event_id_fk1 foreign key(event_id) references event_don(event_id),
constraint ind_id_fk2 foreign key(ind_don_id) references ind_donor(don_id), 
primary key(ind_misc_id, ind_don_id)
);

create table org_mon_don(
org_mon_id  char(6) unique check (org_mon_id like "%O$____%"),
don_value double(8,2) not null check(don_value > 0),
don_date date not null,
reciept_date date not null check(reciept_date >= don_date),
org_don_id char(5),
pay_type enum('paypal'),
event_id Char(5),
constraint event_id_fk2 foreign key(event_id) references event_don(event_id),
constraint org_id_fk1 foreign key(org_don_id) references org_donor(org_id), 
primary key(org_mon_id, org_don_id)
);

create table org_misc_don(
org_misc_id char(6) unique check(org_misc_id like "%OM____%"),
don_date date,
description text,
org_don_id char(5),
event_id Char(5),
constraint event_id_fk3 foreign key(event_id) references event_don(event_id),
constraint org_id_fk2 foreign key(org_don_id) references org_donor(org_id), 
primary key(org_misc_id, org_don_id)
);

create table app_user(
username varchar(15) primary key,
pass varchar(15)
);

set foreign_key_checks = 1;










