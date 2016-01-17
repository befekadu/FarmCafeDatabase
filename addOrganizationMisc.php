<!--Add Organization Misc Donor Page that accepts input, and then if valid enters it 
    into the database with a unique id-->
<?php
    include_once "common/dataAccessPoint.php";
    include_once "common/header.php";
?>
      <?php
         if(isset($_POST['organizationMisc']))
         {
          //Constraint org_don_id ref org_id fails despite working on entering database itself   
          try {
               $event_name = ($_POST['event_name']);
               $description = ($_POST['description']);
               $don_date = ($_POST['don_date']);
               $org_name = ($_POST['org_name']);
               $address = ($_POST['address']);
 
               $org_don_id = $dao->validateOrgName($org_name);
               $org_misc_id = $dao->generateOMiscDonId(); //generates a new Organization Misc donor ID.
               $event_id = $dao->validateEvent($event_name,$don_date);

          if ($org_don_id == NULL) {
                $org_don_id = $dao->generateOrgId(); //if organization donor id is null, generate a new id.
                $dao->insertOrganization($org_name, $address, $org_don_id);
                $dao->insertOMiscDonation($org_misc_id, $don_date, $description, $org_don_id, $event_id);
           } else {
                $dao->insertOMiscDonation($org_misc_id, $don_date, $description, $org_don_id, $event_id);
            }

        } catch (PDOException $pe) {
             die("Error occcured on insert: Please Retry");

        }

         ?> <h2 class = "message good">Data has been entered successfully!</h2> <?php      
          
         }
         else
         {
            ?>
               <form method="post" action="addOrganizationMisc.php">
                  <table width="400" border="0" cellspacing="1" cellpadding="2">
                     <tr>
                        <td width="100">Organization Name</td>
                        <td><input name="org_name" type="text" id="org_name"></td>
                     </tr>

                     <tr>
                        <td width="100">Donation Date</td>
                        <td><input name="don_date" type="text" id="don_date"></td>
                     </tr>

                     <tr>
                        <td width="100">Description</td>
                        <td><input name="description" type="text" id="description"></td>
                     </tr>
                     <tr>
                        <td width="100">Associated Event Name</td>
                        <td><input name="event_name" type="text" id="event_name"></td>
                     </tr>
                    <tr>
                        <td width="100">Organization Address</td>
                        <td><input name="address" type="text" id="address"></td>
                     </tr>
                  </table>
                  <br>
                   <input name="organizationMisc" type="submit" id="organizationMisc" class = "button" value="Add Organization Miscellaneous Donation">

               </form>
            <?php
         }
      ?>

<?php
	include_once "common/close.php";
?>
