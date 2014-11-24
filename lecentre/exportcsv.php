<?php
include ('lock.php');

$task       = trim($_GET["task"]);
$todaysdate = date('Y-m-d_H_i');
$zone       = 'DIA';
//$foldername = 'C:\\\Users\\\Aboudou\\\Dropbox\\\Aisha\\\HQ\\\\';
$foldername ='C:\\\Users\\\TOSHIBA\\\Dropbox\\\DIA\\\\';
//$filename   = 'client_c_2'.$zone.$todaysdate.'.csv';
$filename   = $todaysdate.'-'.$zone.'-'.'1client_c_2.csv';
$filename_sg   = $todaysdate.'-'.$zone.'-'.'2saving_goals.csv';
$filename_gi  = $todaysdate.'-'.$zone.'-'.'3goal_items.csv';
$filename_grps  = $todaysdate.'-'.$zone.'-'.'4groups.csv';
$filename_errs  = $todaysdate.'-'.$zone.'-'.'5errors.csv';
$filename_receipts  = $todaysdate.'-'.$zone.'-'.'receipts.csv';

$success = 0;

if ($task == 'CONTRATS') {
	//if (!file_exists('data/contrats/'.$todaysdate)) {
	//	mkdir('data/contrats/'.$todaysdate, 0777, true);
	//}
	$export_sql = "SELECT Name,Last_Name_c,First_Name_c,Village_c,Sex_c,Phone_c,group_id,Country_c,kiva,sf_ID,CreatedDate INTO OUTFILE '".$foldername.$filename."' FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' FROM Client_c_2 WHERE LastModifiedDate IS NOT NULL";
	//var_dump($export_sql);
	//$result = mysqli_query($db, export_sql);
	if (!mysqli_query($db, $export_sql)) {
			$success = 1;
			die('Error: '.mysqli_error($db));
		}

	if($success ===0)
	{
		
		$export_sql = "SELECT savings_goal_c.Name,savings_goal_c.Client_c,goal_items_c.Savings_Goal_c, goal_items_c.CreatedDate,goal_items_c.product_c,goal_items_c.Sf_Product_ID, goal_items_c.Product_Name_c,SUM(goal_items_c.Goal_Item_Price_c) as price,SUM(goal_items_c.Desired_Units_c) as hectares INTO OUTFILE '".$foldername.$filename_sg."' FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'  FROM savings_goal_c,goal_items_c WHERE savings_goal_c.Name=goal_items_c.Savings_Goal_c GROUP BY goal_items_c.Savings_Goal_c ORDER BY savings_goal_c.Client_c ASC";
	//var_dump($export_sql);
	//$result = mysqli_query($db, export_sql);
	if (!mysqli_query($db, $export_sql)) {
			$success = 1;
			die('Error: '.mysqli_error($db));
		}
	//IF saving the sg was successfull, now save the goal items
	if($success ===0)
	{
		
		$export_sql = "SELECT * INTO OUTFILE '".$foldername.$filename_gi."' FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'  FROM goal_items_c";
	//var_dump($export_sql);
	//$result = mysqli_query($db, export_sql);
	if (!mysqli_query($db, $export_sql)) {
			$success = 1;
			die('Error: '.mysqli_error($db));
		}
		
	$export_sql = "SELECT * INTO OUTFILE '".$foldername.$filename_grps."' FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'  FROM groups";
	//var_dump($export_sql);
	//$result = mysqli_query($db, export_sql);
	if (!mysqli_query($db, $export_sql)) {
			$success = 1;
			die('Error: '.mysqli_error($db));
		}

	}	

	}
	$export_sql = "SELECT * INTO OUTFILE '".$foldername.$filename_errs."' FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'  FROM contratslog";
	//var_dump($export_sql);
	//$result = mysqli_query($db, export_sql);
	if (!mysqli_query($db, $export_sql)) {
			$success = 1;
			die('Error: '.mysqli_error($db));
		}

}
else{
	//$foldername = 'C:\\\Users\\\Aboudou\\\Dropbox\\\Aisha\\\HQ\\\Receipts\\\\';
	$foldername ='C:\\\Users\\\TOSHIBA\\\Dropbox\\\DIA\\\Receipts\\\\';
	$export_sql = "SELECT * INTO OUTFILE '".$foldername.$filename_receipts."' FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'  FROM receipts";
	//var_dump($export_sql);
	//$result = mysqli_query($db, export_sql);
	if (!mysqli_query($db, $export_sql)) {
			$success = 1;
			die('Error: '.mysqli_error($db));
		}


}

header("Location: contractslist.php");
?>