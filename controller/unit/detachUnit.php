<?php 
	
	include '../../inc/conn.php';
	include '../../vendor/autoload.php'; 
	include '../../classes/declare.php';



	
	
	if($root->deleteById('checkup_unit',$_POST['id'])){

		$_SESSION['done'] = "Unit unlinked successfully";
		header("Location:../../?view=showInv&c_id=".$_POST['test_id']);
		exit();

	}
	



 ?>