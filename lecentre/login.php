<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/myagrogreennotext3.ico">

    <title>Ngasene Contract System</title>

    <!-- Bootstrap core CSS -->
    <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="_css/signin.css" rel="stylesheet">

  </head>
   <body>
<?php
include ("config.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from Form
	$myusername = strtolower(mysqli_real_escape_string($db, $_POST['username']));
	$mypassword = mysqli_real_escape_string($db, $_POST['password']);

	$sql    = "SELECT id FROM users WHERE username='$myusername' and password='$mypassword'";
	$result = mysqli_query($db, $sql);
	$row    = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$active = $row['id'];
	$count  = mysqli_num_rows($result);

	// If result matched $myusername and $mypassword, table row must be 1 row
	if ($count == 1) {
		//session_register("myusername");
		$_SESSION['login_user'] = $myusername;
		$_SESSION['logged']     = 'YES';
		header("location: welcome.php");
	} else {
		$error = "Your Login Name or Password is invalid";
	}
}
?>

    <div class="container">

      <form class="form-signin" role="form" action="" method="post">
        <img src="images/myagrogreennotext.png" style="width: 190px; height: 184px;">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email" name='username' class="form-control" placeholder="Email address" required autofocus>
        <input type="password" name='password' class="form-control" placeholder="Password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
   <script src="_js/jquery-2.1.1.min.js"></script>
    <script src="_bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>