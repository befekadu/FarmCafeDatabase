<!--Checks if Organization exists and if it does and has no children dependent on it,
     it deletes the data -->
<?php
    include_once "common/dataAccessPoint.php";
    include_once "common/header.php";
?>
      <?php
        if(isset($_POST['id']))
         {
           try {
               $name = ($_POST['delete']); 
               $validate_id = $dao->validateOrgName($name);

          if ($validate_id != NULL) {
                $dao->deleteOrg($validate_id);
           } else {
               die("Error occured: Organization does not exist");
           }

        } catch (PDOException $pe) {
            die("Error occcured: Other tables depend on this deletion");
        }

            ?> <h2 class = "message good">Data has been deleted successfully!</h2> <?php
       }
         else
         {
            ?>
               <form method="post" action="dOrganization.php">
                  <table width="400" border="0" cellspacing="1" cellpadding="2">
                     <tr>
                        <td width="100">Organization Name</td>
                        <td><input name="delete" type="text" id="delete"></td>
                     </tr>
                  </table>
                  <br>
                  <input name="id" type="submit" class="button" id="id" value="Delete Organization">

               </form>
            <?php
         }
      ?>

<?php
    include_once "common/close.php";
?>

