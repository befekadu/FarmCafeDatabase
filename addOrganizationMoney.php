<!--Add Organization Money Donor Page that accepts input, and then if valid enters it 
    into the database with a unique id-->
<?php
    include_once "common/dataAccessPoint.php";
	include_once "common/header.php";
?>
      <?php
        if(isset($_POST['organizationMoney']))
        {
        try {
               $event_name = ($_POST['event_name']);

		 //temporary workaround due to the fact that null gets treated as 0 by mysql 
		       $don_date = ($_POST['don_date']);
               

               $don_value = ($_POST['don_value']);
               $receipt_date = ($_POST['receipt_date']);
               $pay_type = ($_POST['pay_type']);
               $org_name = ($_POST['org_name']);
               $address = ($_POST['address']);
               $org_don_id = $dao->validateOrgName($org_name);
               $org_mon_id = $dao->generateOMonDonId(); //Generates a new Organization Money Donor ID.
               
		$event_id = $dao->validateEvent($event_name,$don_date);
            
            if ($org_don_id == NULL) {
                $org_don_id = $dao->generateOrgId(); //if organization donor id is null, create a new id.
                $dao->insertOrganization($org_name, $address, $org_don_id);                
                $dao->insertOMoneyDonation($org_mon_id, $don_value,$don_date, $receipt_date, $org_don_id, $pay_type, $event_id); 
            } else {
               $dao->insertOMoneyDonation($org_mon_id, $don_value,$don_date, $receipt_date, $org_don_id, $pay_type, $event_id);    
            }
            
        } catch (PDOException $pe) {
         die("Error occcured on insert: Please Retry");
        }
         ?> <h2 class = "message good">Data has been entered successfully!</h2> <?php
         }
         else
         {
            ?>
               <form method="post" action="addOrganizationMoney.php">
                  <table width="400" border="0" cellspacing="1" cellpadding="2">
                     <tr>
                        <td width="100">Organization Name</td>
                        <td><input name="org_name" type="text" id="org_name"></td>
                     </tr>
                     <tr>
                        <td width="100">Associated Event Name</td>
                        <td><input name="event_name" type="text" id="event_name"></td>
                     </tr>
                     <tr>
                        <td width="100">Organization Address</td>
                        <td><input name="address" type="text" id="address"></td>
                     </tr> 
                        
                     <tr>
                        <td width="100">Donation Date</td>
                        <td><input name="don_date" type="text" id="don_date"></td>
                     </tr>
                  
                     <tr>
                        <td width="100">Donation Value</td>
                        <td><input name="don_value" type="text" id="don_value"></td>
                     </tr>
					<tr>
                        <td width="100">Receipt Date</td>
                        <td><input name="receipt_date" type="text" id="receipt_date"></td>
                     </tr>				 
                     <tr>
                        <td width="100">Pay Type</td>
                        <td><input name="pay_type" type="text" id="pay_type"></td>
                     </tr>	
                  </table>
                  <br>
                   <input name="organizationMoney" type="submit" id="organizationMoney" class = "button" value="Add Organization Money Donation">

               </form>
            <?php
         }
      ?>

<?php
	include_once "common/close.php";
?>
