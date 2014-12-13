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
    <link rel="icon" href="static/images/myagrogreennotext3.ico">

    <title>Le Centre Add Receipts </title>

    <!-- Bootstrap core CSS -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="static/css/style.css" rel="stylesheet">
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
             <li><a href="contractslist.php">Liste de contrats</a></li>
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
        <h1>MyAgro Receipts Message</h1>
<?php
//include ("config.php");
//include ('lock.php');

function dateToMySQL($date) {
	$tabDate = explode('/', $date);
	$date    = $tabDate[2].'-'.$tabDate[1].'-'.$tabDate[0];
	$date    = date('Y-m-d', strtotime($date));
	return $date;
}

$login_session;
$task    = strtoupper(trim($_POST['task']));
$success = 0;//success is true
var_dump($_POST);
if ($task === 'RECEIPTS') {
	//$properties = parse_ini_file("_prop/packets.ini", true);
	$receiptId     = trim($_POST['receipt_id']);
	$agentZone     = strtoupper(trim($_POST['agentZone']));
	$agentNom      = strtoupper(trim($_POST['agent_Nom']));
	$agentID       = trim($_POST['agentID']);
	$boutiquierID  = strtoupper(trim($_POST['boutiquier_id']));
	$village       = strtoupper(trim($_POST['boutiquier_village']));
	$boutiquierNom = strtoupper(trim($_POST['boutiquier_Nom']));
	$montant_paye  = trim($_POST['montant_paye']);
	$montant_ecrit = trim($_POST['montant_ecrit']);
	$cf500         = $_POST['cr_500'];
	$cf1000        = $_POST['cr_1000'];
	$cf2000        = $_POST['cr_2000'];
	$cf5000        = $_POST['cr_5000'];
	$cf8000        = $_POST['cr_8000'];
	$cf10000       = $_POST['cr_10000'];
	$cf25000       = $_POST['cr_25000'];
	$vtc           = $_POST['vtc'];
	$cdadate       = dateToMySQL($_POST['cda_date']);
	$cdaheure      = $_POST['cda_heure'];
	$domheure      = $_POST['dom_heure'];
	$domdate       = dateToMySQL($_POST['dom_date']);
	$no_tel        = $_POST['no_tel'];
	$ref_num       = $_POST['ref_num'];
	$subtask       = $_POST['sub_task'];
	//$collectedAmount = $_POST['montant']

	$collectedCardAmount = (500*$cf500)+(1000*$cf1000)+(2000*$cf2000)+(5000*$cf5000)+(8000*$cf8000)+(10000*$cf10000)+(25000*$cf25000);
	$cdate_string        = $cdadate.' '.$cdaheure;
	$cdadate_main        = date('Y-m-d H:i:s', strtotime($cdate_string));
	$domdate             = date('Y-m-d', strtotime($domdate));
	$sql                 = "";

	if ($subtask === 'create') {
		# code...
		$sql = "INSERT INTO RECEIPTS(CreatedById, BA_id,Vendor_id,Receipt_Number,Date_Collected,Collected_Amount,SumOfCards,count_500,count_1000,count_2000,count_5000,count_8000,count_10000,count_25000,deposit_date, deposit_time,deposit_reference,deposit_phone) VALUES('$user_check','$agentID','$boutiquierID','$receiptId','$cdadate_main','$montant_paye','$collectedCardAmount','$cf500','$cf1000','$cf2000','$cf5000','$cf8000','$cf10000','$cf25000','$domdate','$domheure','$ref_num','$no_tel')";

		if (!mysqli_query($db, $sql)) {
			$success = 1;
			die('Error: '.mysqli_error($db));
		}

		if ($success === 0) {
			?><p class="lead">Vous avez cree avec success Receipt:<b>
			<?php echo $receiptId;?></b></p>
																																																																																																																																										                    <p><a class="btn btn-default" href="receipts.html" role="button">Nouveau Recu &raquo;</a></p>
			<?php
		} else {
			?>  <p class="lead">Une erreur s'est produite- Receipt:<b><?php echo $receiptId;?></b> Appelez le Siege!</p><p><a class="btn btn-default" href="receipts.php" role="button">Nouveau Recu &raquo;</a></p>
			<?php
		}
	} elseif ($subtask === 'update') {
		$update_id = $_POST['receipt_updateID'];
		$isEdited  = strtoupper(trim($_POST['isEdited']));
		echo ($isEdited);
		if ($isEdited === 'TRUE') {
			# code...
			$sql = "UPDATE RECEIPTS SET Collected_Amount ='$montant_paye',SumOfCards='$collectedCardAmount',count_500='$cf500',count_1000='$cf1000',count_2000='$cf2000',count_5000='$cf5000' ,count_8000='$cf8000',count_10000='$cf10000',count_25000='$cf25000',isVerified ='1' WHERE id='$update_id'";
		} else {
			echo "isNotEdited";
			$sql = "UPDATE RECEIPTS SET isVerified ='1' WHERE id='$update_id'";
		}
		if (!mysqli_query($db, $sql)) {
			$success = 1;
			die('Error: '.mysqli_error($db));
		}

		if ($success === 0) {
			header("Location: receiptslist.php");
		} else {
			?>  <p class="lead">Une erreur s'est produite- Receipt:<b><?php echo $receiptId;?></b> Appelez le Siege!</p><p><a class="btn btn-default" href="receipts.php" role="button">Nouveau Recu &raquo;</a></p>
			<?php
		}
	} else {
		$update_id = $_POST['receipt_updateID'];
		$sql       = "DELETE FROM RECEIPTS WHERE id = '$update_id'";
		if (!mysqli_query($db, $sql)) {
			$success = 1;
			die('Error: '.mysqli_error($db));
		}

		if ($success === 0) {
			?><p class="lead">Vous avez delete avec success</p>
																																																																																																												       <p><a class="btn btn-default" href="receipts.html" role="button">Nouveau Recu &raquo;</a></p>
			<?php
		} else {
			?>  <p class="lead">Une erreur s'est produite- Receipt:<b><?php echo $receiptId;?></b> Appelez le Siege!</p><p><a class="btn btn-default" href="receipts.php" role="button">Nouveau Recu &raquo;</a></p>
			<?php
		}
	}
}
//$sql = "INSERT INTO RECEIPTS(CreatedById, BA_id,Vendor_id,Receipt_Number,Date_Collected,Collected_Amount,count_500,count_2000,count_5000,count_8000,count_10000,count_25000,deposit_date, deposit_time,deposit_reference,deposit_phone) VALUES('$user_check','$agentID','$boutiquierID','$receiptId','$cdadate_main','$collectedAmount','$cf500','$cf2000','$cf5000','$cf8000','$cf10000','$cf25000','$domdate','$domheure','$ref_num','$no_tel')";
//var_dump("comparison to 1 true");

?>
</div>

</div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="static/js/jquery-2.1.1.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="static/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
