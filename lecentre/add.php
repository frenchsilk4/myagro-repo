   <!DOCTYPE html>
<?php
include ("config.php");
session_start();

$userlog    = $_SESSION['logged'];
$user_check = $_SESSION['login_user'];
if ($userlog == 'YES') {
	?>
																<html lang="en">
																					  <head>
																					    <meta charset="utf-8">
																					    <meta http-equiv="X-UA-Compatible" content="IE=edge">
																					    <meta name="viewport" content="width=device-width, initial-scale=1">
																					    <meta name="description" content="">
																					    <meta name="author" content="">
																					    <link rel="icon" href="images/myagrogreennotext3.ico">

																					    <title>Add contrats and groups</title>

																					    <!-- Bootstrap core CSS -->
																					    <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">

																					    <!-- Custom styles for this template -->
																					    <link href="_css/starter-template.css" rel="stylesheet">
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
															              <input type="text" placeholder="Email" readonly="true" value='<?php echo $_SESSION['login_user'];?>' class="form-control">
															            </div>
															            <button type="submit" id="signout" class="btn btn-success">Sign out</button>
															          </form>
																					        </div><!--/.nav-collapse -->
																					      </div>
																					    </div>
																					    <div class="container">

																					      <div class="starter-template">
																					        <h1>MyAgro Contrats Message</h1>
	<?php
	//var_dump($_POST);
	//include ("config.php");
	//include ('lock.php');
	//$properties = parse_ini_file("_prop/packets.ini", true);
	$clientID = 0;
	$nom      = "";
	$prenom   = "";
	$numero   = 0;
	$sex      = "";
	$village  = "";
	$jdp      = 0;
	$mdp      = 0;
	$ndpp     = 0;

	$task    = strtoupper(trim($_POST['task']));
	$success = 0;//success is true
	$kiva    = 0;//not a member of kiva
	//var_dump($_POST);
	if ($task === 'CONTRATS') {
		$properties = parse_ini_file("_prop/packets.ini", true);
		$clientID   = trim($_POST['myagro_num']);
		$nom        = strtoupper(trim($_POST['nom']));
		$prenom     = strtoupper(trim($_POST['prenom']));
		$numero     = trim($_POST['numero']);
		$sex        = ucfirst(trim($_POST['sex']));
		$village    = strtoupper(trim($_POST['village']));
		$jdp        = strtoupper(trim($_POST['jdp']));
		$mdp        = trim($_POST['mdp']);
		$ndpp       = trim($_POST['ndpp']);
		//$kiva       = trim($_POST['kiva']);
		if (array_key_exists('kiva', $_POST)) {
			$kiva = trim($_POST['kiva']);
		}
		$goallist  = $_POST['prod'];
		$cfa_total = $_POST['cfa_total'];
		$total_ha  = $_POST['total_ha'];
		$sg_name   = $_POST['sg_name'];
		$c_exists  = $_POST['client_exists'];

		$paks          = $goallist['paks'];
		$ha_s          = $goallist['ha'];
		$seeds         = $goallist['semence'];
		$cfa_sub_total = $goallist['cfa_sub_total'];
		$sg_names      = $goallist['ode'];

		if ($c_exists === 1) {
			$update_sql = "UPDATE Client_c_2 SET Sex_c='$sex', Phone_c='$numero', LastModifiedBy='$user_check', Client_code_c='$clientID',kiva='$kiva' WHERE Name='$clientID'";
			//var_dump("comparison to 1 true");
			if (!mysqli_query($db, $update_sql)) {
				$success = 1;
				die('Error: '.mysqli_error($db));
			}

		} else {
			$update_sql = "UPDATE Client_c_2 SET Name = '$clientID',Client_Code_c ='$clientID',First_Name_c='$prenom',Last_Name_c='$nom',Phone_c ='$numero',Sex_c = '$sex',Village_c ='$village',Country_c ='MALI',LastModifiedBy='$user_check',Client_code_c='$clientID',kiva='$kiva' WHERE Name='$clientID'";
			//var_dump("comparison to 1 false");
			$rs_result     = mysqli_query($db, $update_sql);
			//$row           = mysqli_fetch_array($rs_result, MYSQLI_ASSOC);
			if (!$rs_result) {
				$success = 1;
				die('Error: '.mysqli_error($db));
			}

			if(mysqli_affected_rows($db) == 0)
			{
				$create_sql = "INSERT INTO Client_c_2 (id,Name,Client_Code_c,First_Name_c,Last_Name_c,Phone_c,Sex_c,Village_c,Country_c,LastModifiedBy,kiva) VALUES('$clientID','$clientID','$clientID','$prenom','$nom','$numero','$sex','$village','MALI','$user_check','$kiva')";
				//var_dump($create_sql);
				if (!mysqli_query($db, $create_sql)) {
				$success = 1;
				die('Error: '.mysqli_error($db));
			}

			}				//createSavingGoal($sg_name,$user_check,$clientID,$cfa_total,$total_ha);

		}

		// estimates table
		$insert_estimates_sql = "INSERT INTO ESTIMATES (client_id, jdp,mdp,ndpp) VALUES ('$clientID','$jdp','$mdp','$ndpp')";
		if (!mysqli_query($db, $insert_estimates_sql)) {
			$success = 1;
			die('Error: '.mysqli_error($db));
		}

		// Savings Goals

		// Goal Items
		$packet_info         = [];
		$product_info        = [];
		$seed                = "";
		$gi_price            = 0;
		$count_desired_units = 0;
		$smhectare           = 1;

		for ($i = 1; $i < count($paks); $i++) {
			# code...
			if ($paks[$i] != '') {
				$product_c         = ucfirst((trim($paks[$i])));
				$seed              = strtoupper(trim($seeds[$i]));
				$cfa_sg_total      = $cfa_sub_total[$i];
				$total_sg_hectares = $ha_s[$i];
				$sg_name           = substr(strtoupper(trim($sg_names[$i])), 0, -1).$i;
				//$seed_name=$seeds[i];
				$packet_hectare = $ha_s[$i];

				//Add savings goal
				$insert_sg_sql = "INSERT INTO Savings_goal_c (Name, CreatedBy,Client_c,Year_c,Savings_Goal_Amount_c,Max_Desired_Hectares_c) VALUES('$sg_name','$user_check','$clientID',YEAR(NOW()),$cfa_sg_total,$total_sg_hectares)";
				if (!mysqli_query($db, $insert_sg_sql)) {
					$success = 1;
					die('Error: '.mysqli_error($db));
				}

				//var_dump($seed." ".$packet_hectare);
				//$result = mysql_query("SELECT min_ha, min_pa FROM packets_view WHERE year='2015' AND product_type= '$seed' AND '$packet_hectare' BETWEEN min_ha AND max_ha");
				$ssql      = "SELECT min_ha, min_pa FROM packets_view WHERE year='2015' AND product_type= '$seed' AND min_ha <= '$packet_hectare' and max_ha >='$packet_hectare'";
				$rs_result = mysqli_query($db, $ssql);
				if (!$rs_result) {
					die(mysqli_error());
				}
				$row                 = mysqli_fetch_array($rs_result, MYSQLI_ASSOC);
				$smhectare           = $row['min_ha'];
				$count_desired_units = $packet_hectare/$smhectare;
				$gi_price            = $row['min_pa'];
				//Select products salesforce ID's
				$salesforceID = '';
				$pssql        = '';
				//var_dump($product_c);
				if ($product_c == 'Mais PDS' && $packet_hectare >= 0.25) {
					$product_c = 'Mais PDS .25';
					$pssql     = "SELECT salesforceID from products where name='$product_c'";
					//var_dump($pssql);
				} 
				elseif($product_c == 'Mais HYB' && $packet_hectare >= 0.25){

					$product_c = 'Mais HYB .25';
					$pssql     = "SELECT salesforceID from products where name='$product_c'";
					//var_dump($pssql);
				}
				else { $pssql = "SELECT salesforceID from products where name='$product_c'";}
				$pd_result      = mysqli_query($db, $pssql);
				if (!$pd_result) {
					$success = 1;
					die('Error: '.mysqli_error($db));
				}
				$row2         = mysqli_fetch_array($pd_result, MYSQLI_ASSOC);
				$salesforceID = $row2['salesforceID'];
				//  var_dump($salesforceID);
				//Add goal Items
				for ($j = 0; $j < $count_desired_units; $j++) {
					# code...
					$gi_name       = 'GoalItem-'.$j;
					$gi_order      = $j+1;
					$insert_gi_sql = "INSERT INTO Goal_Items_c (Name,CreatedBy,Savings_Goal_c,product_c,Desired_Units_c,Goal_Item_Price_c,Sf_Product_ID,Savings_Order_c,Product_Name_c) VALUES('$gi_name','$user_check','$sg_name','$product_c','$smhectare','$gi_price','$salesforceID','$gi_order','$seed')";
					if (!mysqli_query($db, $insert_gi_sql)) {
						$success = 1;
						die('Error: '.mysqli_error($db));
					}
				}
			}

		}

		if ($success === 0) {
			?>
																																																				<p class="lead">Vous avez cree avec success Client:<b> <?php echo $clientID;?></b></p>
																																																				<p><a class="btn btn-default" href="contracts.php" role="button">Nouveau Contrat &raquo;</a></p>
			<?php
		} else {
			?>
																																																				<p class="lead">Une erreur s'est produite- Client:<b><?php echo $clientID;?></b> Appelez le Siege!</p>
																																																				<p><a class="btn btn-default" href="contracts.php" role="button">Nouveau Contrat &raquo;</a></p>

			<?php
		}
	} elseif ($task === 'NOTES') {
		# code...
		$clientID = $_POST['clientID_v'];
		$note     = $_POST['comments'];

		$update_sql = "UPDATE Savings_goal_c SET NOTE='$note' WHERE Client_c='$clientID'";
		if (!mysqli_query($db, $update_sql)) {
			$success = 1;
			die('Error: '.mysqli_error($db));
		}

		if ($success === 0) {
			?>
																																																				<p class="lead">Vous avez cree avec success Client:<b> <?php echo $clientID;?></b></p>
																																																				<p><a class="btn btn-default" href="contracts.php" role="button">Nouveau Contrat &raquo;</a></p>
			<?php
		} else {
			?>
																																																				<p class="lead">Une erreur s'est produite- Client:<b><?php echo $clientID;?></b> Appelez le Siege!</p>
																																																				<p><a class="btn btn-default" href="contracts.php" role="button">Nouveau Contrat &raquo;</a></p>

			<?php
		}

	} else {
		#code ...
		$message    = '';
		$properties = parse_ini_file("_prop/config.ini", true);
		$groupID    = $_POST['groupeID'];
		$village    = $_POST['village'];
		$nomgroupe  = $_POST['nomgroupe'];
		$grouplist  = $_POST['groupe'];
		$cfa_total  = $_POST['cfa_total'];
		$pres       = $_POST['presidente'];
		$mobi       = $_POST['mobilisatrice'];
		$jdr        = trim($_POST['jdr']);
		$jdp        = trim($_POST['jdp']);
		$bonus      = strtoupper(trim($_POST['bonus']));

		$groupecodes = $grouplist['codes'];
		$groupenom   = $grouplist['nom'];
		$groupecfa   = $grouplist['cfa'];
		$fiscalDate  = $properties['FISCAL_YEAR_BEGINS'];

		$sqlduplicate = "SELECT id, groupID, createdDate FROM GROUPS WHERE groupID = '$groupID' AND createdDate BETWEEN '$fiscalDate' AND date_add('$fiscalDate' ,INTERVAL 1 YEAR)";
		$result       = mysqli_query($db, $sqlduplicate);
		$row          = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$count        = mysqli_num_rows($result);

		if ($count == 1) {
			$message = "Group already exists.";
		} else {

			$sql = "INSERT INTO GROUPS(groupID, name, village, presidente,mobilistrace,jdr,jdp,bonus) VALUES ('$groupID', '$nomgroupe','$village','$pres','$mobi','$jdr','$jdp','$bonus')";
			if (!mysqli_query($db, $sql)) {
				$success = 1;
				die('Error: '.mysqli_error($db));
			} else {

				for ($i = 1; $i < count($groupecodes); $i++) {
					# code...
					//$sql = "INSERT INTO GROUPTEAMS(groupID, clientID, clientNom,butCFA) VALUES ($groupID, $groupecodes[$i],$groupenom[i],$groupecfa[i])";
					//$sql = "INSERT INTO GROUPTEAMS(groupID, clientID, clientNom,butCFA) SELECT * FROM (SELECT '$groupID' as groupID, '$groupecodes[$i]' as clientID,'$groupenom[i]' as clientNom,'$groupecfa[i]' as butCFA) AS TMP WHERE NOT EXISTS (SELECT id FROM GROUPTEAMS WHERE clientID = '$clientID' AND createdDate BETWEEN '$fiscalDate' AND date_add('$fiscalDate' ,INTERVAL 1 YEAR))";
					$cc  = $groupecodes[$i];
					$sql = "UPDATE client_c_2 SET group_id='$groupID' WHERE Client_Code_c='$cc'";
					if (!mysqli_query($db, $sql)) {
						$success = 1;
						die('Error: '.mysqli_error($db));
					}
				}

			}
		}

		if ($success === 0) {
			?>
																																																				<p class="lead">Vous avez cree avec success Group:<b> <?php echo $groupID;?></b></p>
																																																				<p><a class="btn btn-default" href="contracts.php" role="button">Nouveau Contrat &raquo;</a></p>
			<?php
		} else {
			?>
																																																				<p class="lead">Une erreur s'est produite- Group:<b><?php echo $groupID;?></b> Appelez le Siege!</p>
																																																				<p><a class="btn btn-default" href="groupcontracts.php" role="button">Nouveau Contrat &raquo;</a></p>

			<?php
		}

	}

	?>
	</div>

																					</div><!-- /.container -->


																					    <!-- Bootstrap core JavaScript
																					    ================================================== -->
																					    <!-- Placed at the end of the document so the pages load faster -->
																					    <script src="_js/jquery-2.1.1.min.js"></script>
																					    <script src="_bootstrap/js/bootstrap.min.js"></script>
																					    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
																					    <script src="_js/ie10-viewport-bug-workaround.js"></script>
																					  </body>
																					</html>
	<?php } else {header("location: contracts.php");}?>