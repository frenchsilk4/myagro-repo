<?php
include ('lock.php');

$clientID=$_GET['ccid'];
$update_sql = "UPDATE client_c_2 SET Last_Audit_c=NOW() WHERE Client_Code_c='$clientID'";
		if (!mysqli_query($db, $update_sql)) {
			$success = 1;
			die('Error: '.mysqli_error($db));
		}
header("Location: contractslist.php");
?>