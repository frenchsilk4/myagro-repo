<?php
// Copyright 2014 myAgro. All Rights Reserved.
//
// Description:
// - Logged in users only.
// - Show report menu.
include ('lock.php');
include ('header.php');
?>

<!-- Page body -->
<div class="container">

    <div class="col-lg-6">

        <h2>Rapports</h2>

        <table class="table table-bordered table-striped report">
            <thead>
                <tr>
                    <th>Rapport</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="report_payment_vs_bank.php" class="btn btn-large btn-primary">Payment vs. Bank</a></td>
                    <td>SMS and cash totals collected from vendor, and amount deposited with bank.</td>
                </tr>
                <tr>
                    <td><a href="report_vendor_payment.php" class="btn btn-large btn-primary">Vendor Payment</a></td>
                    <td>Vendor payments to agents.</td>
                </tr>
            </tbody>
        </table>

    </div>

</div>

<?php include ('footer.php'); ?>
