<!--Checks if Individiual exists and if it does and has no children dependent on it,
     it deletes the data -->
<?php
    include_once "common/dataAccessPoint.php";
    include_once "common/header.php";
?>
      <?php
        if (isset($_POST['id']))
         {
           try {
               $fname = ($_POST['fname']); 
               $lname = ($_POST['lname']);
               $validate_id = $dao->validateDonor($fname,$lname);

          if ($validate_id != NULL) {
                $dao->deleteDonor($validate_id);
           } else {
               die("Error occcured!: Other tables depend on this deletion" );
           }

        } catch (PDOException $pe) {
            die("Error occcured: Other tables depend on this deletion");
        }
        ?> <h2 class = "message good">Data has been deleted successfully!</h2> <?php
            
       }
         else
         {
            ?>
               <form method="post" action="dIndividual.php">
                  <table width="400" border="0" cellspacing="1" cellpadding="2">
                     <tr>
                        <td width="100">First Name</td>
                        <td><input name="fname" type="text" id="fname"></td>
                        <td width="100">Last Name</td>
                        <td><input name="lname" type="text" id="lname"></td>
                     </tr>
                  </table>
                  <br>
                   <input name="id" type="submit" class="button" id="id" value="Delete Individual">

               </form>
        <?php    
         }
      ?>

<?php
    include_once "common/close.php";
?>

