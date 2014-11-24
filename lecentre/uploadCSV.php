<?php
include ('lock.php');
require ('PHPMailerAutoload.php');
require_once ('class.phpmailer.php');
?>
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
   <div class='container'>
<?php
//include ("lock.php");
//require ('PHPMailerAutoload.php');
//require_once ('class.phpmailer.php');

$task       = trim($_GET["task"]);
$todaysdate = date('Y-m-d_H_i');
$zone       = 'HQ';
$filename   = 'data/contrats/'.$todaysdate.'/client_c_2'.$zone.$todaysdate.'.csv';
$row2[]     = null;
$row3[]     = null;
$row4[]     = null;
$row8[]     = null;
$row5[]     = null;

//$email           = new PHPMailer();
//$email->IsSMTP();
//$email->SMTPAuth = true;
//$email->SMTPSecure ="tls";
//$email->Host = "smtp.gmail.com";
//$email->Port=587;
//$email->Username = "lecentre@myagro.org";
//$email->Password = "MyAgroRocks";
//$email->From     = $_SESSION['login_user'];
//$email->FromName = $_SESSION['login_user'];

//define the subject of the email
//$email->Subject = 'UPLOAD TO SALESFORCE:'.$_SESSION['login_user'];

//define the body
//$email->Body = "Attached file for upload";

//define the receiver of the email
//$email->AddAddress('lecentre@myagro.org');

//if windows machine
// $path = "C:\\dropbox\\\\{$image}";

if ($task == 'CONTRATS') {
	if (!file_exists('data/contrats/'.$todaysdate)) {
		mkdir('data/contrats/'.$todaysdate, 0777, true);
	}
	//$directory = 'data/contrats/'.$todaysdate;
	$result = mysqli_query($db, "SELECT * FROM Client_c_2 WHERE DATE(`LastModifiedDate`) = CURDATE()");
	while ($row = mysqli_fetch_assoc($result)) {
		$row2[] = implode(",", $row);
	}
	file_put_contents("$filename", implode("\r\n", $row2));

	$filename_sg = 'data/contrats/'.$todaysdate.'/saving_goals'.$zone.$todaysdate.'.csv';
	$result2  = mysqli_query($db, "SELECT * FROM main_client_view WHERE DATE(`CreatedDate`) = CURDATE()");
	while ($row = mysqli_fetch_assoc($result2)) {
		$row3[] = implode(",", $row);
	}
	file_put_contents("$filename_sg", implode("\r\n", $row3));

	$filename_gi = 'data/contrats/'.$todaysdate.'/goal_items'.$zone.$todaysdate.'.csv';
	$result3  = mysqli_query($db, "SELECT * FROM Goal_Items_c WHERE DATE(`CreatedDate`) = CURDATE()");
	while ($row = mysqli_fetch_assoc($result3)) {
		$row4[] = implode(",", $row);
	}
	file_put_contents("$filename_gi", implode("\r\n", $row4));

	$filename_grps = 'data/contrats/'.$todaysdate.'/groups'.$zone.$todaysdate.'.csv';
	$result8  = mysqli_query($db, "SELECT * FROM groups WHERE DATE(`CreatedDate`) = CURDATE()");
	while ($row = mysqli_fetch_assoc($result8)) {
		$row8[] = implode(",", $row);
	}
	file_put_contents("$filename_grps", implode("\r\n", $row8));

	$files_to_zip = array($filename, $filename_grps,$filename_sg,$filename_gi);

	$zip_result = create_zip($files_to_zip, 'data/compressed_zips/contrats/contrats_'.$zone.$todaysdate.'.zip');

	//$file_to_attach = 'data/compressed_zips/contrats/';
	//$NameOfFile     = "contrats_".$zone.$todaysdate.'.zip';
	$NameOfFile = 'data/compressed_zips/contrats/contrats_'.$zone.$todaysdate.'.zip';

	//echo $file_to_attach;

	//$email->AddAttachment($NameOfFile);

	//return $email->Send();
} else {
	if (!file_exists('data/receipts/'.$todaysdate)) {
		mkdir('data/receipts/'.$todaysdate, 0777, true);
	}
	$filename = 'data/receipts/'.$todaysdate.'/ receipts_'.$zone.$todaysdate.'.csv';
	$result4  = mysqli_query($db, "SELECT * FROM receipt_view WHERE DATE(`CreatedDate`) = CURDATE()");
	while ($row = mysqli_fetch_assoc($result4)) {
		$row5[] = implode(",", $row);
	}
	file_put_contents("$filename", implode("\r\n", $row5));

	//createZip('data/receipts/'.$todaysdate.'/', 'data/compressed_zips/receipts', $zone, $todaysdate, "receipts_");
	$files_to_zip =array($filename);
	$zip_result = create_zip($files_to_zip, 'data/compressed_zips/receipts'.'/receipts_'.$zone.$todaysdate.'.zip');

	//$file_to_attach = 'data/compressed_zips/receipts/';

	//$NameOfFile = "receipts_".$zone.$todaysdate.'.zip';
	$NameOfFile = 'data/compressed_zips/receipts'.'/receipts_'.$zone.$todaysdate.'.zip';

	//echo $NameOfFile;
	//if($zip_result){  
	//$email->AddAttachment('data\compressed_zips\receipts'.'\receipts_'.$zone.$todaysdate.'.zip');

	/*if(!$email->Send()){
		echo "Mailer Error: ". $email->ErrorInfo;
		echo 'Not sent: <pre>'.print_r(error_get_last(),true).'</pre>';

	}
	else{
		echo "Message sent!";
	}
	}
	else{ return $email -> Send(); }*/

}

/*function createZip($contentDir, $backupzips, $z, $tdate, $desc) {

	$upFiles = $contentDir;
	//echo $contentDir."\n";
	//this folder must be writeable by the server
	$backup   = $backupzips;
	$zip_file = $backup.'/'.$desc.$z.$tdate.'.zip';

	if ($handle = opendir($upFiles)) {
		$zip = new ZipArchive();

		if ($zip->open($zip_file, ZIPARCHIVE::CREATE) !== TRUE) {
			exit("cannot open filename \n");
		}

		while (false !== ($file = readdir($handle))) {
				$zip->addFile($contentDir.$file);
		}
		closedir($handle);
		echo "numfiles: ".$zip->numFiles."\n";
		echo "status:".$zip->status."\n";
		$zip->close();
		echo 'Zip File:'.$zip_file."\n";
	}

}*/
/* creates a compressed zip file */
function create_zip($files = array(),$destination = '',$overwrite = false) {
	//if the zip file already exists and overwrite is false, return false
	if(file_exists($destination) && !$overwrite) { return false; }
	//vars
	$valid_files = array();
	//if files were passed in...
	if(is_array($files)) {
		//cycle through each file
		foreach($files as $file) {
			//make sure the file exists
			if(file_exists($file)) {
				$valid_files[] = $file;
			}
		}
	}
	//if we have good files...
	if(count($valid_files)) {
		//create the archive
		$zip = new ZipArchive();
		if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
			return false;
		}
		//add the files
		foreach($valid_files as $file) {
			$zip->addFile($file,$file);
		}
		//debug
		echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
		
		//close the zip -- done!
		$zip->close();

		//check to make sure the file exists
		return file_exists($destination);
	}
	else
	{
		return false;
	}
}
?>
</div>