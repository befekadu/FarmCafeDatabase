<!--A view for Events created not to display IDs created-->
<?php
    include_once "common/header.php";
    include_once "common/dataAccessPoint.php";
    $q = $dao->getEventDonation();
    $q->setFetchMode(PDO::FETCH_ASSOC);
    ?> <table width="600" border="0" cellspacing="1" cellpadding="2">
    <tr>
        <th>Event Name</th>
        <th>Event Date</th>
        <th>Income</th>
        <th>Expenses</th>
    </tr>

    <?php while($row = $q->fetch()) { ?>
        <tr>
            <td><?php echo $row['event_name']; ?></td>
            <td><?php echo $row['event_date']; ?></td>
            <td><?php echo $row['income']; ?></td>
            <td><?php echo $row['expenses']; ?></td>
         </tr>
     <?php }
     ?>

<?php
    include_once "common/close.php";
?>


