<?php 
	
	include '../../inc/conn.php';
	include '../../vendor/autoload.php'; 
	include '../../classes/declare.php';
	


	
	
	if($root->deleteById('patients',$_POST['id'])){

		$_SESSION['done'] = "Patient deleted successfully";
		header("Location:../../?view=indexPatient");
		exit();

	}
	



 ?>