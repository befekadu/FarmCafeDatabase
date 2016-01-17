<!--Checks if Event exists and if it does and has no children dependent on it,
     it deletes the data -->
<?php
    include_once "common/dataAccessPoint.php";
    include_once "common/header.php";
?>
      <?php
        if(isset($_POST['id']))
         {
           try {
               $event_name = ($_POST['event_name']); 
               $event_date = ($_POST['event_date']); 
               $validate_id = $dao->validateEvent($event_name,$event_date);

          if ($validate_id != NULL) {
                $dao->deleteEvent($validate_id);
           } else {
               die("Error occured: Event does not exist");
           }

        } catch (PDOException $pe) {
            die("Error occcured: Other tables depend on this deletion" );
        }

            ?> <h2 class = "message good">Data has been deleted successfully!</h2> <?php
       }
         else
         {
            ?>
               <form method="post" action="dEvent.php">
                  <table width="400" border="0" cellspacing="1" cellpadding="2">
                     <tr>
                        <td width="100">Event Name</td>
                        <td><input name="event_name" type="text" id="event_name"></td>
                        <td width="100">Event Date</td>
                        <td><input name="event_date" type="text" id="event_date"></td>
                     </tr>
                  </table>
               <br>
               <input name="id" type="submit" class="button" id="id" value="Delete Event">
               </form>
            <?php
         }
      ?>

<?php
    include_once "common/close.php";
?>

