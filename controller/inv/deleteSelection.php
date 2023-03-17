<?php session_start();
	
	include '../../inc/conn.php';
	include '../../vendor/autoload.php'; 
	include '../../classes/declare.php';
	


	
	
	if($root->deleteById('checkup_select_values',$_POST['id'])){

		$_SESSION['done'] = "Value Deleted successfully";
		header("Location:../../?view=showInv&c_id=".$_POST['test_id']);
		exit();

	}
	



 ?>