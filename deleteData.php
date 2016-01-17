<!--Choose which Data Type to delete-->
<?php
  include_once "common/header.php";
?>   
  <form method="post" action="deleteData.php">
      <h2>Choose a Category to Delete From:<h2>
       <select onchange="location = this.options[this.selectedIndex].value;">
            <option label = "Choose Delete Option Below"</option>
            <option value="dIndividual.php">Delete Individual</option>
            <option value="dOrganization.php">Delete Organization</option>
            <option value="dEvent.php">Delete Event</option>
         </select> 
  </form>
   
<?php    
    include_once "common/close.php";
?>

