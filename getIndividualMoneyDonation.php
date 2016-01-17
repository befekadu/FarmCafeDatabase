<!--A view for Individual Money Donations created not to display IDs created-->
<?php
    include_once "common/header.php";
    include_once "common/dataAccessPoint.php";
    $q = $dao->getIndividualMoneyDonations();
    $q->setFetchMode(PDO::FETCH_ASSOC);
    ?> <table width="600" border="0" cellspacing="1" cellpadding="2">
       <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Middle Initial</th>
            <th>Pay Type</th>
            <th>Donation Value</th>
       <tr>

     <?php while($row = $q->fetch()){?>
         <tr>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td> 
            <td><?php echo $row['mi']; ?></td> 
            <td><?php echo $row['pay_type']; ?></td>
            <td><?php echo $row['don_value']; ?></td>
         </tr>
        <?php }
       ?>


<?php
    include_once "common/close.php";
?>

