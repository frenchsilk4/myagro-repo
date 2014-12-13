<?php
// Copyright 2014 myAgro. All Rights Reserved.
//
// Description:
// - Logged in users only.
// - Show main menu for managing contracts, receipts, and reports.
include ('lock.php');
include ('header.php');
?>

<div class="jumbotron">
    <img src="static/images/CornImage143.jpg" class="img-responsive" alt="Responsive image" id="welcome_img">
</div>

<div class="container">

    <div class="row">

        <div class="col-lg-4">
            <img class="img-circle" src="static/images/training.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
            <h2>Contrats</h2>
            <p>Voici la section du contrat. Cliquez sur le bouton ci-dessous pour créer un nouveau contrat</p>
            <p>
                <a class="btn btn-default" href="contracts.php" role="button">Nouveau Contrat &raquo;</a>&nbsp
                <a class="btn btn-default" href="groupcontracts.php" role="button">Groupe Contrat &raquo;</a>
            </p>
        </div>

        <div class="col-lg-4">
            <img class="img-circle" src="static/images/dollars.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
            <h2>Recu</h2>
            <p>Voici la section recus. Cliquez sur le bouton ci-dessous pour créer de nouvelles recus</p>
            <p>
                <a class="btn btn-default" href="receipts.php" role="button">Nouveau Recu &raquo;</a>
            </p>
        </div>

        <div class="col-lg-4">
            <img class="img-circle" src="static/images/store.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
            <h2>Rapports</h2>
            <p>Voici la section Rapports. Cliquez sur le bouton ci-dessous pour ouvrir le système de rapports</p>
            <p>
                <a class="btn btn-default" href="reports.php" role="button">Ouvrir Systeme de rapports &raquo;</a>
            </p>
        </div>

    </div>

</div>

<?php include ('footer.php'); ?>
