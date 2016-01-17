<!--A view for Organization Donors created not to display IDs created-->
<?php
    include_once "common/header.php";
    include_once "common/dataAccessPoint.php";
    $q = $dao->getOrganizationDonation();
    $q->setFetchMode(PDO::FETCH_ASSOC);
    ?> <table width="600" border="0" cellspacing="1" cellpadding="2">
    <tr>
        <th>Organization Name</th>
        <th>Address</th>
    </tr>

    <?php while($row = $q->fetch()) { ?>
        <tr>
            <td><?php echo $row['org_name']; ?></td>
            <td><?php echo $row['address']; ?></td>
         </tr>
     <?php }
     ?>

<?php
    include_once "common/close.php";
?>


