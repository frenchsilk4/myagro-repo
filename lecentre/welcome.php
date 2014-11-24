<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/myagrogreennotext3.ico">

    <title>Le Centre System</title>

    <!-- Bootstrap core CSS -->
    <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="_css/jumbotron.css" rel="stylesheet">
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
          <a class="navbar-brand" href="#">Bienvenue! Le Centre</a>
        </div>
        <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
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
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <img src="images/CornImage143.jpg" class="img-responsive" alt="Responsive image" id="welcome_img">
    </div>

    <div class="container">
      <!-- Example row of columns -->
        <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="images/training.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Contrats</h2>
          <p>Voici la section du contrat. Cliquez sur le bouton ci-dessous pour créer un nouveau contrat</p>
          <p><a class="btn btn-default" href="contracts.php" role="button">Nouveau Contrat &raquo;
            </a>&nbsp
<a class="btn btn-default" href="groupcontracts.php" role="button">Groupe Contrat &raquo;
          </a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/dollars.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Recu</h2>
          <p>Voici la section recus. Cliquez sur le bouton ci-dessous pour créer de nouvelles recus</p>
          <p><a class="btn btn-default" href="receipts.php" role="button">Nouveau Recu &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/store.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Rapports</h2>
          <p>Voici la section Rapports. Cliquez sur le bouton ci-dessous pour ouvrir le système de rapports</p>
          <p><a class="btn btn-default" href="reports.php" role="button">Ouvrir Systeme de rapports &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

      <hr>

      <footer>
        <p>&copy; myAgro 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="_js/jquery-2.1.1.min.js"></script>
    <script src="_bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>