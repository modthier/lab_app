<?php 
	
	include '../../inc/conn.php';
	include '../../vendor/autoload.php'; 
	include '../../classes/declare.php';

	
	$op = $root->deleteById('refs',$_POST['id']);
	
	if(empty($op[2])){

		$_SESSION['done'] = "Reference deleted successfully";
		header("Location:../../?view=indexRef");
		exit();
	}else {
		if ($op[1] == 1451) {
			$_SESSION['error'] = "you can not delete this Reference because it currentlly in use ";
		    header("Location:../../?view=indexRef");
		    exit();
		}
	}
 ?>