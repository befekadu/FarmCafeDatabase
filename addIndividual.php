<!--Add Individual Page that accepts input, and then if valid enters it into the database
    with a unique id-->
<?php
	
	include_once "common/dataAccessPoint.php";
    include_once "common/header.php";
?>
      <?php
         if(isset($_POST['individual']))
         {
		
	     try {
		    $address = ($_POST['address']);
            $phone_no = ($_POST['phone_no']);
            $email = ($_POST['email']);
		    $fname =($_POST['fname']);     
		    $lname =($_POST['lname']);    
		    $mi =($_POST['mi']); 
            $organization =($_POST['organization']);		    

		    $don_id = $dao->validateDonor($fname,$lname);            
            $org_id = $dao->validateOrgName($organization);
    
          if($don_id == NULL) {
		        $don_id = $dao->generateDonorId(); //if donor ID is null, creates a new donor ID.
		        $dao->insertDonor($address, $phone_no, $email, $fname, $lname, $mi, $don_id, $org_id);
	     } else {
		    die("Error occured: Donor already exists");
	     }				    
		
           } catch (PDOException $pe) {
	     die("Error occcured on insert: Please Retry");
        }
         ?> <h2 class = "message good">Data has been entered successfully!</h2> <?php
         }
         else
         {
            ?>
               <form method="post" action="addIndividual.php">
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
                        <td width="100">Middle Initial</td>
                        <td><input name="mi" type="text" id="mi"></td>
                     </tr>
					<tr>
                        <td width="100">Address</td>
                        <td><input name="address" type="text" id="address"></td>
                     </tr>
					 <tr>
                        <td width="100">Phone Number</td>
                        <td><input name="phone_no" type="text" id="phone_no"></td>
                     </tr>
                     <tr>
                        <td width="100">Email Address</td>
                        <td><input name="email" type="text" id="email"></td>
                     </tr>        
                     <tr>
                        <td width="100">Organization Name</td>
                        <td><input name="organization" type="text" id="organization"></td>
                     </tr> 
                  </table>
                  <br>
               <input name="individual" type="submit" class = "button" id="individual" value="Add Individual">
               </form>
            <?php
         }
      ?>
	<br>
	<br>
	<a href="addIndividualMisc.php" class="button">Add a Individual Misc Donation</a>
	<a href="addIndividualMoney.php" class="button">Add a Individual Money Donation </a>
<?php
	include_once "common/close.php";
?>
