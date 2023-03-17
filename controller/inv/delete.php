<?php 
	
	include '../../inc/conn.php';
	include '../../vendor/autoload.php'; 
	include '../../classes/declare.php';
	


	$root->deleteByFiled('checkup_profile_tests','parent_id',$_POST['test_id']);

	$root->deleteByFiled('checkup_select_values','test_id',$_POST['test_id']);
	
	
	if($root->deleteById('checkup',$_POST['test_id'])){

		$root = $_SERVER['DOCUMENT_ROOT']."lab";
		$fileCreate = $root."/views/form/".$_POST['label']."fForm.php";
		$fileUpdate = $root."/views/update/".$_POST['label']."uUpdate.php";

		
		if(file_exists($fileCreate)){
			unlink($fileCreate);
		}

		if (file_exists($fileUpdate)) {
			unlink($fileUpdate);
		}
		
		

		$_SESSION['done'] = "Test deleted successfully";
		header("Location:../../?view=indexInv");
		exit();

	  
	}
	



 ?>