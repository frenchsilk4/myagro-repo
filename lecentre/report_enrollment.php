<?php
// Copyright 2014 myAgro. All Rights Reserved.
include ('lock.php');
include ('header.php');
?>

<!-- Page body -->
<div class="container">

    <h2>Report: Enrollment</h2>

    <table class="table table-bordered table-striped report">
        <thead>
            <tr>
                <th>Zone</th>
                <th>Agent</th>
                <th># Clients</th>
                <th># Hectares</th>
                <th>Total CFA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ZONE</td>
                <td></td>
                <td class="number"><?php echo number_format(0); ?></td>
                <td class="number"><?php echo number_format(0); ?></td>
                <td class="number"><?php echo number_format(0); ?></td>
            </tr>
        </tbody>
    </table>

</div>

<?php include ('footer.php'); ?>
