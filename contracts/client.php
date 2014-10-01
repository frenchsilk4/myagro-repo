<?php
//--------------------------------------------------------------------------
// 1) Connect to mysql database
//--------------------------------------------------------------------------
include 'DB.php';
$con = mysql_connect($host, $user, $pass);
$dbs = mysql_select_db($databaseName, $con);

//--------------------------------------------------------------------------
// 2) Query database for data
//--------------------------------------------------------------------------
$command = $_POST['command'];
if ($command == '1') {
	$db_id  = $_POST['id'];
	$result = mysql_query("SELECT First_Name_c,Last_Name_c,Village_c,Sex_c,Phone_c FROM $tableName WHERE Client_Code_c='$db_id'");//query
	$array  = mysql_fetch_row($result);//fetch result

	//--------------------------------------------------------------------------
	// 3) echo result as json
	//--------------------------------------------------------------------------
	echo json_encode($array);

} else {
	$nowyear = date("Y");
	$db_prod = $_POST['product'];
	$ha_size = $_POST['ha'];
	$result  = mysql_query("SELECT Packet_Type, Price FROM Packets WHERE Product='$db_prod' AND Size='$ha_size' AND Year = $nowyear");//query
	$array   = mysql_fetch_row($result);//fetch result

	//--------------------------------------------------------------------------
	// 3) echo result as json
	//--------------------------------------------------------------------------
	echo json_encode($array);
}

?>