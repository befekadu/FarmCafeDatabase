<!--Add Individual Money Donor Page that accepts input, and then if valid enters it 
    into the database with a unique id-->
<?php
    include_once "common/dataAccessPoint.php";
	include_once "common/header.php";
?>
      <?php
        if(isset($_POST['individualMoney']))
         {
          // try {       
                $event_name = ($_POST['event_name']); 
               $don_date = ($_POST['don_date']);
			   $don_value = ($_POST['don_value']);   
			   $receipt_date = ($_POST['receipt_date']); 
			   $pay_type = ($_POST['pay_type']); 
               $fname = ($_POST['fname']);
               $mi = ($_POST['mi']);
               $lname = ($_POST['lname']);
               $ind_don_id = $dao->validateDonor($fname,$lname);
               $ind_mon_id = $dao->generateIMonDonId(); //Generates an individual money donor ID.
               $event_id = $dao->validateEvent($event_name,$don_date);

            if ($ind_don_id == NULL) {
                $ind_don_id = $dao->generateDonorId(); //if don id was null, generates a new one.
                $dao->insertDonor(NULL, NULL, NULL, $fname, $lname, $mi, $ind_don_id, NULL);
                $dao->insertIMoneyDonation($ind_mon_id, $don_value,$don_date, $receipt_date, $ind_don_id, $pay_type, $event_id); 
            } else {
               $dao->insertIMoneyDonation($ind_mon_id, $don_value,$don_date, $receipt_date, $ind_don_id, $pay_type, $event_id);    
            }
           
         // } catch (PDOException $pe) {
            //    die("Error occcured on insert: Please Retry");
         // }
               ?> <h2 class = "message good">Data has been entered successfully!</h2> <?php 
         }
         else
         {
            ?>
               <form method="post" action="addIndividualMoney.php">
                  <table width="400" border="0" cellspacing="1" cellpadding="2">
                     <tr>
                        <td width="100">First Name</td>
                        <td><input name="fname" type="text" id="fname"></td>
                     </tr>
                       <tr>
                        <td width="100">Middle Initial</td>
                        <td><input name="mi" type="text" id="mi"></td>
                     </tr>
 
                     <tr>
                        <td width="100">Last Name</td>
                        <td><input name="lname" type="text" id="lname"></td>
                     </tr>
                     
                      <tr>
                        <td width="100">Event Associated Name</td>
                        <td><input name="event_name" type="text" id="event_name"></td>
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
                   <input name="individualMoney" type="submit" id="individualMoney" class = "button" value="Add Individual Money Donation">

               </form>
            <?php
         }
      ?>

<?php
	include_once "common/close.php";
?>
