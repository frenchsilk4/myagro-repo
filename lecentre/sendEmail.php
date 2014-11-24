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

    <title>Le Centre System</title>

    <!-- Bootstrap core CSS -->
    <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="_css/jumbotron.css" rel="stylesheet">
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
          <a class="navbar-brand" href="#">Bienvenue! Le Centre</a>
        </div>
        <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a href="contractslist.php">Liste de contrats</a></li>
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
<?php

$clientID = $_POST['clientID_v'];
$email = $_POST['email'];
$comments = $_POST['comments'];
$success = 0;

$insert_sql = "INSERT INTO contratslog (clientID,CreatedBy,comment) VALUES ('$clientID','$email','$comments')";
	//var_dump($export_sql);
	//$result = mysqli_query($db, export_sql);
	if (!mysqli_query($db, $insert_sql)) {
			$success = 1;
			die('Error: '.mysqli_error($db));
		}

	$update_sql = "UPDATE client_c_2 SET Last_Audit_c=NOW() WHERE Client_Code_c='$clientID'";
		if (!mysqli_query($db, $update_sql)) {
			$success = 1;
			die('Error: '.mysqli_error($db));
		}
if ($success === 0) {
			?>
	<p class="lead">Message envoye</p><p><a class="btn btn-default" href="contractslist.php" role="button">liste de contrats &raquo;</a></p>
			<?php
		} else {
			?>
	<p class="lead">Une erreur s'est produite</b> Appelez le Siege!</p>	<p><a class="btn btn-default" href="contractslist.php" role="button">liste de contrats &raquo;</a></p>
<?php
}

//email component is not working on windows OS
/*if (isset($_POST['email'])) {

	// EDIT THE 2 LINES BELOW AS REQUIRED

	$email_to = "lecentre@myagro.org";

	$email_subject = "NOTICE: Note added for Client: ".$_POST['clientID_v'];

	function died($error) {

		// your error code can go here

		echo "We are very sorry, but there were error(s) found with the form you submitted. ";

		echo "These errors appear below.<br /><br />";

		echo $error."<br /><br />";

		echo "Please go back and fix these errors.<br /><br />";

		die();

	}

	// validation expected data exists

	$email_from = $_POST['email'];// required

	$comments = $_POST['comments'];// required

	$error_message = "";

	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

	if (!preg_match($email_exp, $email_from)) {

		$error_message .= 'The Email Address you entered does not appear to be valid.<br />';

	}

	$string_exp = "/^[A-Za-z .'-]+$/";

	/*if (!preg_match($string_exp, $first_name)) {

	$error_message .= 'The First Name you entered does not appear to be valid.<br />';

	}

	if (!preg_match($string_exp, $last_name)) {

	$error_message .= 'The Last Name you entered does not appear to be valid.<br />';

	}

	if (strlen($comments) < 2) {

		$error_message .= 'The Comments you entered do not appear to be valid.<br />';

	}

	if (strlen($error_message) > 0) {

		died($error_message);

	}

	$email_message = "Form details below.\n\n";

	function clean_string($string) {

		$bad = array("content-type", "bcc:", "to:", "cc:", "href");

		return str_replace($bad, "", $string);

	}

	$email_message .= "Email: ".clean_string($email_from)."\n";


	$email_message .= "Comments: ".clean_string($comments)."\n";

	// create email headers

	$headers = 'From: '.$email_from."\r\n".

	'Reply-To: '.$email_from."\r\n".

	'X-Mailer: PHP/'.phpversion();

	@mail($email_to, $email_subject, $email_message, $headers);

	?>
	<div class="container">
	<!-- include your own success html here -->



						Thank you for contacting us. We will be in touch with you very soon.

	</div>

	<?php

}
*/
?>