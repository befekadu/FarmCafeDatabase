<!--Add Individual Misc Donor Page that accepts input, and then if valid enters it 
    into the database with a unique id-->
<?php
    include_once "common/dataAccessPoint.php";
	include_once "common/header.php";
?>
      <?php
         if(isset($_POST['individualMisc']))
         { 
           try {
               $event_name = ($_POST['event_name']);
			   $description = ($_POST['description']);
               $don_date = ($_POST['don_date']);
               $fname = ($_POST['fname']);
               $lname = ($_POST['lname']);   
               $mi = ($_POST['mi']);
                
               $ind_don_id = $dao->validateDonor($fname,$lname);
               $ind_misc_id = $dao->generateIMiscDonId(); //creates a unique Individual Misc ID.
               $event_id = $dao->validateEvent($event_name,$don_date);  
               
               if ($ind_don_id == NULL) //Checks if individual donor id is NULL
               {
                $ind_don_id = $dao->generateDonorId(); //If it is null, generates a new id.
                $dao->insertDonor(NULL, NULL, NULL, $fname, $lname, $mi, $ind_don_id, NULL);
                $dao->insertIMiscDonation($ind_misc_id, $don_date, $description, $ind_don_id, $event_id);
           } else {
                $dao->insertIMiscDonation($ind_misc_id, $don_date, $description, $ind_don_id, $event_id);
            }
  
        } catch (PDOException $pe) {
         die("Error occcured on insert: Please Retry");
        }
          ?> <h2 class = "message good">Data has been entered successfully!</h2> <?php 
         }
         else
         {
            ?>
               <form method="post" action="addIndividualMisc.php">
                  <table width="400" border="0" cellspacing="1" cellpadding="2">
                    <tr>
                        <td width="100">First Name</td>
                        <td><input name="fname" type="text" id="fname"></td>
                     </tr>

                     <tr>
                        <td width="100">Last Name</td>
                        <td><input name="lname" type="text" id="lname"></td>
                     </tr>
                     <tr> 
                     <tr>
                        <td width="100">Middle Initial</td>
                        <td><input name="mi" type="text" id="mi"></td>
                     </tr>
                     <tr>   
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
                  </table>
                  <br>
                   <input name="individualMisc" type="submit" id="individualMisc" class = "button" value="Add Individual Miscellaneous Donation">
               </form>
            <?php
         }
      ?>

<?php
	include_once "common/close.php";
?>
