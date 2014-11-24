<?php
//--------------------------------------------------------------------------
// 1) Connect to mysql database
//--------------------------------------------------------------------------
include 'config.php';
//$con = mysql_connect($host, $user, $pass);
//$dbs = mysql_select_db($databaseName, $con);

//--------------------------------------------------------------------------
// 2) Query database for data
//--------------------------------------------------------------------------
$command = $_GET['command'];
if ($command == '1') {
	$db_id  = $_GET['id'];
	$result = mysqli_query($db, "SELECT First_Name_c,Last_Name_c,Village_c,Sex_c,Phone_c FROM Client_c_2 WHERE Client_Code_c='$db_id'");//query
	$array  = mysqli_fetch_array($result, MYSQLI_ASSOC);//fetch result

	//--------------------------------------------------------------------------
	// 3) echo result as json
	//--------------------------------------------------------------------------
	echo json_encode($array);

} else {
	$nowyear = date("Y");
	$db_prod = strtoupper(trim($_GET['product']));
	$ha_size = $_GET['ha'];
	//$result  = mysql_query("SELECT Packet_Type, Price FROM Packets WHERE Product='$db_prod' AND Size='$ha_size' AND Year = $nowyear");//query
	//$result = mysql_query("SELECT Packet_Type, Price, MIN(Size) AS Size_c FROM Packets WHERE Product='$db_prod' AND Year = $nowyear");//query
	$result = mysqli_query($db, "SELECT product_name,min_pa,min_ha FROM packets_view WHERE year='2015' AND product_type= '$db_prod' AND min_ha <='$ha_size' AND max_ha >='$ha_size'");
	$array  = mysqli_fetch_array($result, MYSQLI_ASSOC);//fetch result

	//--------------------------------------------------------------------------
	// 3) echo result as json
	//--------------------------------------------------------------------------
	echo json_encode($array);
}

?>