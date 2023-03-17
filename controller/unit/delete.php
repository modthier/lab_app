<?php 
	
	include '../../inc/conn.php';
	include '../../vendor/autoload.php'; 
	include '../../classes/declare.php';

	
	$op = $root->deleteById('units',$_POST['id']);
	
	if(empty($op[2])){

		$_SESSION['done'] = "Unit deleted successfully";
		header("Location:../../?view=indexUnit");
		exit();
	}else {
		if ($op[1] == 1451) {
			$_SESSION['error'] = "you can not delete this Unit because it belonges to a test ";
		    header("Location:../../?view=indexUnit");
		    exit();
		}
	}
 ?>