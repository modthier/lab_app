<?php session_start();
	
include '../../inc/conn.php';
include '../../vendor/autoload.php'; 
include '../../classes/declare.php';




if(!empty($_POST['test_id'])){
	foreach ($_POST['test_id'] as $value) {
		
		$response = $service->checkLinkTest($_POST['parent_id'],$value);
		if($response){
			$_SESSION['error'] = $root->getTestName($value)." Already Included in the Profile";
		    header("Location:../../?view=showInv&c_id=".$_POST['parent_id']);
		    exit();
		}
		
		$data = [
			'parent_id' => $_POST['parent_id'],
			'test_id' => $value
		];
		$root->saveWithoutId('checkup_profile_tests',$data);
	}

	$_SESSION['done'] = "Test Added Successfully";
	header("Location:../../?view=showInv&c_id=".$_POST['parent_id']);
	exit();
}else {
	$_SESSION['error'] = "Please Select A test From the list";
	header("Location:../../?view=showInv&c_id=".$_POST['parent_id']);
	exit();
}

?>