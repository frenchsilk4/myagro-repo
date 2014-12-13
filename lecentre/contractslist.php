<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/myagrogreennotext3.ico">

    <title>Contracts List</title>

    <!-- Bootstrap core CSS -->
    <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <script language="javascript" type="text/javascript" src="_js/jquery-2.1.1.min.js"></script>
  <script language="javascript" type="text/javascript" src="_js/myagro_script.js"></script>

  <link rel="stylesheet" type="text/css" href="_css/style.css">
  </head>

  <body>
<?php
include ('lock.php');
?>
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
            <li><a href="contractslist.php">Liste de contrats</a></li>
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
$sql        = "SELECT id,Client_Code_c,First_Name_c,Last_Name_c,Phone_c,Sex_c,Village_c,Last_Audit_c FROM client_c_2 WHERE LastModifiedDate >=(CURDATE() - INTERVAL 1 DAY ) ORDER BY LastModifiedDate ASC LIMIT $start_from, 50";
$rs_result  = mysqli_query($db, $sql);
?><table class="table table-hover">
<thead>
<tr><th>id</th><th>Client ID</th><th>Nom</th><th>Prenom</th><th>Numero</th><th>Sexe</th><th>Village</th><th>Verifier?</th></tr>
</thead>
<tbody>
<?php while ($row = mysqli_fetch_array($rs_result, MYSQLI_ASSOC)) {
	?>
																															                                        <tr>
																															                                        <td><?php echo $row['id'];?></td>
																															                                        <td><?php echo $row['Client_Code_c'];?></td>
																															                                        <td><?php echo $row['Last_Name_c'];?></td>
																															                                        <td><?php echo $row['First_Name_c'];?></td>
																															                                        <td><?php echo $row['Phone_c'];?></td>
																															                                        <td><?php echo $row['Sex_c'];?></td>
																															                                        <td><?php echo $row['Village_c'];?></td>
																											                                                <td>
																											                                                  <form method='post' action="vcontracts.php">
	<?php
	if ($row['Last_Audit_c'] == null) {
		?>
																			                                                                        <input type="hidden" name="id" value=<?php echo $row['Client_Code_c'];?>>
				                                                                                                      <input type="submit" class="btn btn-success" value="Verifier">
		<?php } else {?>
				                                                                                                        <input type="hidden" name="id" value=<?php echo $row['Client_Code_c'];?>>
				                                                                                                        <input type="button" class="btn btn-success" value="Done" disabled>
		<?php }?>
	</form>
																											                                                </td>
																										                                                  </tr>
	<?php
};
?>
</tbody>
</table>
<?php
$sql           = "SELECT COUNT(id) AS idCount FROM client_c_2 WHERE LastModifiedDate >=(CURDATE() - INTERVAL 1 DAY )";
$rs_result     = mysqli_query($db, $sql);
$row           = mysqli_fetch_array($rs_result, MYSQLI_ASSOC);
$total_records = $row['idCount'];
$total_pages   = ceil($total_records/100);

for ($i = 1; $i <= $total_pages; $i++) {
	echo "<a href='vcontracts.php?page=".$i."'>".$i."</a> ";
};
?>

      </div>
      <div class="row">
            <div class="col-md-12" style="text-align:center; padding-top:20px;">
              <p><a class="btn btn-default" href="contracts.php" role="button">Nouveau Contrat &raquo;</a></p>
              <p>Apres avoir verifie les contrats, cliquez sur le bouton ci-dessous pour les envoyer au siege</p>
              <p><a class="btn btn-default" href="exportcsv.php?task=CONTRATS" role="button">Envoyer au siege &raquo;</a></p>
              </div>
         </div>


    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="_bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>