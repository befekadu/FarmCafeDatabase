<!--A view for Organization Money Donations created not to display IDs created-->
<?php
    include_once "common/header.php";
    include_once "common/dataAccessPoint.php";
    $q = $dao->getOrganizationMoneyDonations();
    $q->setFetchMode(PDO::FETCH_ASSOC);
    ?> <table width="600" border="0" cellspacing="1" cellpadding="2">
       <tr>
            <th>Organization Name</th>
            <th>Pay Type</th>
            <th>Donation Value</th>
            <th>Donation Date</th>
            <th>Receipt Date</th>
       <tr>

     <?php while($row = $q->fetch()){?>
         <tr>
            <td><?php echo $row['org_name']; ?></td>
            <td><?php echo $row['pay_type']; ?></td>
            <td><?php echo $row['don_value']; ?></td>
            <td><?php echo $row['don_date']; ?></td>
            <td><?php echo $row['reciept_date']; ?></td>

         </tr>
        <?php }
       ?>


<?php
    include_once "common/close.php";
?>

