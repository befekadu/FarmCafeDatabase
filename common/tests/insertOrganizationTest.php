<?php
/**
 * Created by PhpStorm.
 * User: jordan
 * Date: 11/22/15
 * Time: 8:54 PM
 */
include_once 'db.php';
include "dataAcess.php";

$test = new dataAccess($db);
$org_name = "functionTest";
$org_address = 'AddressTest';
$org_id = "O12";
$test->insertOrganization($org_name, $org_address, $org_id);
