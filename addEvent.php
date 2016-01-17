<!--Add Event Page that accepts input, and then if valid enters it into the database
    with a unique id-->
<?php
    include_once "common/dataAccessPoint.php";
	include_once "common/header.php";
?>
      <?php
         if(isset($_POST['event']))
         {
            try {
               $event_name = ($_POST['event_name']);
			   $event_date = ($_POST['event_date']);
               $income = ($_POST['income']);
			   $expenses =($_POST['expenses']);
               
               $event_id = $dao->validateEvent($event_name, $event_date);

          if ($event_id == NULL) {
                $event_id = $dao->generateEventId(); //After checking if event id is null, it will generate a new id.
                $dao->insertEvent($event_id, $event_name, $event_date, $income, $expenses);    
           } else {
               die("Error occured: Event already create");
           }

        } catch (PDOException $pe) {
         die("Error occcured on insert: Please Retry");
        }
        ?> <h2 class = "message good">Data has been entered successfully!</h2> <?php
       }
         else
         {
            ?>
               <form method="post" action="addEvent.php">
                  <table width="400" border="0" cellspacing="1" cellpadding="2">
                     <tr>
                        <td width="100">Event Name</td>
                        <td><input name="event_name" type="text" id="event_name"></td>
                     </tr>
                  
                     <tr>
                        <td width="100">Event Date</td>
                        <td><input name="event_date" type="text" id="event_date"></td>
                     </tr>
						
					 <tr>
                        <td width="100">Event Income</td>
                        <td><input name="income" type="text" id="income"></td>
                     </tr>
					<tr>
                        <td width="100">Event Expenses</td>
                        <td><input name="expenses" type="text" id="expenses"></td>
                     </tr>      
                  </table>
                  <br>
                  <input name="event" type="submit" class="button" id="event" value="Add Event">

               </form>
            <?php
         }
      ?>

<?php
	include_once "common/close.php";
?>
