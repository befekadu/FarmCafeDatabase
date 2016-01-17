<!--verifies email-->
<?php
	include_once "common/header.php";
?>

<?php
	include_once "common/close.php";

if(isset($_GET['email'])&& !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){

    $email = $_GET['email'];
    $hash = $_GET['hash'];
  //verify data

}else{

 //invalid approach

}
