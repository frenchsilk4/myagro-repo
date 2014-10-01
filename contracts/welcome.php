<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/myagrogreennotext.ico">

    <title>Welcome to Contract System</title>

    <!-- Bootstrap core CSS -->
    <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="_css/jumbotron.css" rel="stylesheet">
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
          <a class="navbar-brand" href="#">NgaSene Contracts System</a>
        </div>
        <div class="navbar-collapse collapse">
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
      <div class="container">
        <h1>NgaSene Contracts System</h1>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
        <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="images/training.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Create Contract</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="addcontract.html" role="button">Create  contract &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/phone.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Update Contract</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="#" role="button">Update client contract &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/store.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Submit Contracts</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">Review et Submit contracts &raquo;</a></p>
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