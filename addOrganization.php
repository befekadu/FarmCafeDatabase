<!--Add Organization Page that accepts input, and then if valid enters it 
    into the database with a unique id-->

<?php
	include_once "common/header.php";
    include_once "common/dataAccessPoint.php"
?>
      <?php
         if(isset($_POST['organization']))
         {
                try {
               $org_name = ($_POST['org_name']);
			   $address = ($_POST['address']);
               // creating the organization
               $org_id = $dao->validateOrgName($org_name);
               if ($org_id != null){
                    die("Organization already exists");  
               }
               $org_id = $dao->generateOrgId(); //Generate a new Organization ID.        
               $dao->insertOrganization($org_name,$address,$org_id);

              }catch(PDOException $pe){die("Error Occurred on insert: Please Retry");}
            ?> <h2 class = "message good">Data has been entered successfully!</h2> <?php
         }
         else
         {
            ?>
               <form method="post" action="addOrganization.php">
                  <table width="400" border="0" cellspacing="1" cellpadding="2">
                     <tr>
                        <td width="100">Organization Name</td>
                        <td><input name="org_name" type="text" id="org_name"></td>
                     </tr>
                  
                     <tr>
                        <td width="100">Address</td>
                        <td><input name="address" type="text" id="address"></td>
                     </tr>		 
                  </table>
                  <br>
                   <input name="organization" type="submit" class="button" id="organization" value="Add Organization">

               </form>
            <?php
         }
      ?>
	<br><br>
	<a href="addOrganizationMisc.php" class="button">Add a Organization Misc Donation</a>
	<a href="addOrganizationMoney.php" class="button">Add a Organization Money Donation </a>
<?php
	include_once "common/close.php";
?>
