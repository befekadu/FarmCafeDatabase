<?php

include_once "db.php";
include_once "dataAccess.php";

$test = new dataAccess($db);

$org_mon_id = 'OM2';
$don_date = "1995-06-07";
$descritpiton = "test";
$org_don_id = "O1";

$test->insertOMiscDonation($org_mon_id, $don_date, $descritpiton, $org_don_id, null);
