<?php
//include ("config.php");
include ('lock.php');

$login_session;
$task    = strtoupper(trim($_GET['task']));
$success = 0;//success is true
$c       = trim($_GET['q']);
if ($task === 'AGENTS') {

	$sql = "SELECT * FROM AGENTS WHERE id LIKE '$c%'";
	//var_dump("comparison to 1 true");
	$rs_result = mysqli_query($db, $sql);

	$array = array();
	$i     = 0;

	while ($row = mysqli_fetch_array($rs_result, MYSQLI_ASSOC)) {
		$elem      = $row['id'].' , '.$row['name'].' , '.$row['zone'];
		$row_id = $row['id'];
		$array[$i] = array('label' => $elem, 'value' => $row_id);
		$i++;
	}
	$suggestions = array('suggestions' => $array);
	echo json_encode($suggestions);
	//echo json_encode($array);
	//echo json_encode('{"suggestions":[{"label":"45000 , ABDOULAYE SINAYOKO , DIALAKOROBA","value":"45000"},{"label":"45001 , MARIAM COULIBALY , DIALAKOROBA","value":"45001"},{"label":"45002 , SALIA SANOGO , DIALAKOROBA","value":"45002"}]};');
	//var_dump($suggestions);
}
if ($task === 'VENDOR') {

	$ba  = trim($_GET['ba']);
	$sql = "SELECT * FROM VENDORS WHERE BA_id = '$ba' AND id LIKE '$c%'";
	//var_dump("comparison to 1 true");
	$rs_result = mysqli_query($db, $sql);

	$array = array();
	$i     = 0;

	while ($row = mysqli_fetch_array($rs_result, MYSQLI_ASSOC)) {
		$elem      = $row['id'].' , '.$row['village_name'].' , '.$row['vendor_name'];
		$array[$i] = array('label' => $elem, 'value' => $row['id']);
		$i++;
	}
	$suggestions = array('suggestions' => $array);
	echo json_encode($suggestions);
	//echo json_encode($array);
	//echo json_encode('{"suggestions":[{"label":"45000 , ABDOULAYE SINAYOKO , DIALAKOROBA","value":"45000"},{"label":"45001 , MARIAM COULIBALY , DIALAKOROBA","value":"45001"},{"label":"45002 , SALIA SANOGO , DIALAKOROBA","value":"45002"}]};');
	//var_dump($suggestions);
}
if ($task === 'VILLAGE') {
	$vn  = strtoupper($c);
	$sql = "SELECT village_name, id FROM VENDORS WHERE village_name LIKE '$vn%'";
	//var_dump("comparison to 1 true");
	$rs_result = mysqli_query($db, $sql);

	$array = array();
	$i     = 0;

	while ($row = mysqli_fetch_array($rs_result, MYSQLI_ASSOC)) {
		$elem      = $row['id'].' , '.$row['village_name'];
		$array[$i] = array('label' => $elem, 'value' => $row['village_name']);
		$i++;
	}
	$suggestions = array('suggestions' => $array);
	echo json_encode($suggestions);
	//echo json_encode($array);
	//echo json_encode('{"suggestions":[{"label":"45000 , ABDOULAYE SINAYOKO , DIALAKOROBA","value":"45000"},{"label":"45001 , MARIAM COULIBALY , DIALAKOROBA","value":"45001"},{"label":"45002 , SALIA SANOGO , DIALAKOROBA","value":"45002"}]};');
	//var_dump($suggestions);
}

?>