<!--Data display page to choose views for data added that were 
    created not to display IDs created-->
<?php
	include_once "common/header.php";
?>
    <form method="post" action="viewData.php">
    <h2>Choose a Category to View:<h2> 
       <select onchange="location = this.options[this.selectedIndex].value;">
            <option label = "Choose Option to View below"</option>
            <option value="getIndividualDonation.php">Individual Donors</option>
            <option value="getOrganizationDonation.php">Organization Donors</option>
            <option value="getEventDonation.php">Event Donors</option>
            <option value="getOrganizationMiscDonation.php">Organization Misc Donations</option>
            <option value="getOrganizationMoneyDonation.php">Organization Money Donations</option>
            <option value="getIndividualMiscDonation.php">Individual Misc Donations</option>
            <option value="getIndividualMoneyDonation.php">Individual Money Donations</option>
         </select>
     
  </form>
  
<?php
	include_once "common/close.php";
?>
