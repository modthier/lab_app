<?php 
	
	include '../../inc/conn.php';
	include '../../vendor/autoload.php'; 
	include '../../classes/declare.php';
	$auth = new \Delight\Auth\Auth($conn);


	
	
	if($root->deleteById('checkup_ref',$_POST['id'])){

		$_SESSION['done'] = "Reference unlinked successfully";
		header("Location:../../?view=showInv&c_id=".$_POST['test_id']);
		exit();

	}
	



 ?>