<!DOCTYPE html>
<?php
include ('lock.php');
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/myagrogreennotext3.ico">

    <title>Create new contracts</title>

    <!-- Bootstrap core CSS -->
    <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <script language="javascript" type="text/javascript" src="_js/jquery-2.1.1.min.js"></script>
  <script language="javascript" type="text/javascript" src="_js/myagro_script.js"></script>

  <link rel="stylesheet" type="text/css" href="_css/style.css">
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="welcome.php">Le Centre</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="welcome.php">Home</a></li>
            <li><a href="contractslist.php">Liste de contracts</a></li>
            <li><a href="searchpage.php">Chercher contrats</a></li>
            <li><a href="receiptslist.php">Liste de recus</a></li>
          </ul>
          <form class="navbar-form navbar-right" role="form" action='logout.php' method="post">
            <div class="form-group">
              <input type="text" placeholder="Email" readonly="true" value='<?php echo $login_session;?>' class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign out</button>
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
<?php
//include ('config.php');
if (isset($_GET["page"])) {$page = $_GET["page"];} else { $page = 1;};

$start_from = ($page-1)*20;
$sql        = "SELECT id,Receipt_Number,Date_Collected,Collected_Amount,SumOfCards,deposit_date,deposit_time,deposit_reference FROM RECEIPTS WHERE isVerified=0 ORDER BY CreatedDate DESC LIMIT $start_from, 50";
$rs_result  = mysqli_query($db, $sql);
?><table class="table table-hover">
<thead>
<tr><th>id</th><th>Receipt Number</th><th>Collect Date</th><th>Montant (CFA)</th><th>Total des Cartes</th><th>Dépôt Date</th><th>Dépôt heure</th><th>Ref No</th><th>Verifier?</th></tr>
</thead>
<tbody>
<?php while ($row = mysqli_fetch_array($rs_result, MYSQLI_ASSOC)) {
	?>
																  <tr>
																      <td><?php echo $row["id"];?></td>
																      <td><?php echo $row["Receipt_Number"];?></td>
																      <td><?php echo $row["Date_Collected"];?></td>
																      <td><?php echo $row["Collected_Amount"];?></td>
								                      <td><?php echo $row["SumOfCards"];?></td>
																      <td><?php echo $row["deposit_date"];?></td>
																      <td><?php echo $row["deposit_time"];?></td>
																      <td><?php echo $row["deposit_reference"];?></td>
																      <td>
																          <form method='post' action="vreceipts.php">
																          <input type="hidden" name="id" value=<?php echo $row["id"];?>>
																          <input type="submit" class="btn btn-success" value="Verifier">
																         </form>
																      </td>
																  </tr>

	<?php
};
?></tbody>
      </div>
          <div class="row">
            <div class="col-md-12" style="text-align:center; padding-top:20px;">
              <p><a class="btn btn-default" href="receipts.php" role="button">Nouveau Recu &raquo;</a></p>
              <p>Apres avoir verifie les Recus, cliquez sur le bouton ci-dessous pour les envoyer au siege
              <p><a class="btn btn-default" href="exportcsv.php?task=RECEIPTS" role="button">Envoyer au siege &raquo;</a></p>
              </div>
         </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="_bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>