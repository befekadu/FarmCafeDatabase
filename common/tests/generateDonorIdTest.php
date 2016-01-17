<?php

include_once "db.php";
include "dataAccess.php";

$test = new dataAccess($db);
$String = $test->generateDonorId();
$return = $String[0];
print($return[0]);



