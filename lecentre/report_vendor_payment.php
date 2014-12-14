<?php
// Copyright 2014 myAgro. All Rights Reserved.
include ('lock.php');
include ('header.php');
?>

<!-- Page body -->
<div class="container">

    <h2>Report: Vendor Payment vs. Bank</h2>

    <?php
        // Get all agents and total payment info for the agent
        $sql = "SELECT a.id,
                       a.name,
                       COALESCE(SUM(r.Collected_Amount),0) AS receipt_total,
                       COALESCE(SUM(r.SumOfCards),0) AS sms_total
                FROM agents a LEFT JOIN receipts r ON a.id = r.BA_id
                GROUP BY a.name
                ORDER BY a.name ASC";
        $agent_results  = mysqli_query($db, $sql);
    ?>
    <table class="table table-bordered table-striped report">
        <thead>
            <tr>
                <th>Agent</th>
                <th>Village</th>
                <th>Vendor</th>
                <th>Total SMS</th>
                <th>Receipt</th>
                <th>Bank</th>
                <th>Difference</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($agent = mysqli_fetch_array($agent_results, MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><strong><?php echo $agent['name']; ?></strong></td>
                <td></td>
                <td></td>
                <td class="number"><strong><?php echo number_format($agent['sms_total']); ?></strong></td>
                <td class="number"><strong><?php echo number_format($agent['receipt_total']); ?></strong></td>
                <td class="number"><strong></strong></td>
                <td class="number"><strong></strong></td>
            </tr>
            <?php
                // Get vendor(s) info for the specific agent, and payment info for that vendor
                $sql = "SELECT v.vendor_name AS name,
                               v.village_name,
                               COALESCE(SUM(r.Collected_Amount),0) AS receipt_total,
                               COALESCE(SUM(r.SumOfCards),0) AS sms_total
                        FROM vendors v LEFT JOIN receipts r ON v.id = r.Vendor_id
                        WHERE v.BA_id = " . $agent['id'] . "
                        GROUP BY v.id
                        ORDER BY v.village_name ASC";
                $vendor_results  = mysqli_query($db, $sql);
            ?>
            <?php while ($vendor = mysqli_fetch_array($vendor_results, MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $agent['name']; ?></td>
                    <td><?php echo $vendor['village_name']; ?></td>
                    <td><?php echo $vendor['name']; ?></td>
                    <td class="number"><?php echo number_format($vendor['sms_total']); ?></td>
                    <td class="number"><?php echo number_format($vendor['receipt_total']); ?></td>
                    <td class="number"></td>
                    <td class="number"></td>
                </tr>
            <?php }?>
        <?php }?>
        </tbody>
    </table>

</div>

<?php include ('footer.php'); ?>
