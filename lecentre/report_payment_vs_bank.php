<?php
// Copyright 2014 myAgro. All Rights Reserved.
include ('lock.php');
include ('header.php');
?>

<!-- Page body -->
<div class="container">

    <h2>Report: Payment vs. Bank</h2>

    <?php
        // Get all zones and total payment info for the zone
        $sql = "SELECT a.zone AS name,
                       COALESCE(SUM(r.Collected_Amount),0) AS receipt_total,
                       COALESCE(SUM(r.SumOfCards),0) AS sms_total
                FROM agents a LEFT JOIN receipts r ON a.id = r.BA_id
                GROUP BY a.zone
                ORDER BY a.zone ASC";
        $zone_results  = mysqli_query($db, $sql);
    ?>
    <table class="table table-bordered table-striped report">
        <thead>
            <tr>
                <th>Zone</th>
                <th>Agent</th>
                <th>Total SMS</th>
                <th>Receipt</th>
                <th>Bank</th>
                <th>Difference</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($zone = mysqli_fetch_array($zone_results, MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><strong><?php echo $zone['name']; ?></strong></td>
                <td></td>
                <td class="number"><strong><?php echo number_format($zone['sms_total']); ?></strong></td>
                <td class="number"><strong><?php echo number_format($zone['receipt_total']); ?></strong></td>
                <td class="number"><strong></strong></td>
                <td class="number"><strong></strong></td>
            </tr>
            <?php
                // Get agent(s) info for the specific zone, and payment info for that agent
                $sql = "SELECT a.id,
                               a.name,
                               a.zone,
                               COALESCE(SUM(r.Collected_Amount),0) AS receipt_total,
                               COALESCE(SUM(r.SumOfCards),0) AS sms_total
                        FROM agents a LEFT JOIN receipts r ON a.id = r.BA_id
                        WHERE a.zone = '" . $zone['name'] . "'
                        GROUP BY a.name
                        ORDER BY a.name ASC";
                $agent_results  = mysqli_query($db, $sql);
            ?>
            <?php while ($agent = mysqli_fetch_array($agent_results, MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $agent['zone']; ?></td>
                    <td><?php echo $agent['name']; ?></td>
                    <td class="number"><?php echo number_format($agent['sms_total']); ?></td>
                    <td class="number"><?php echo number_format($agent['receipt_total']); ?></td>
                    <td class="number"></td>
                    <td class="number"></td>
                </tr>
            <?php }?>
        <?php }?>
        </tbody>
    </table>

</div>

<?php include ('footer.php'); ?>
