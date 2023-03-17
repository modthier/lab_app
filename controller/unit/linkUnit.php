<?php session_start();
	
include '../../inc/conn.php';
include '../../vendor/autoload.php'; 
include '../../classes/declare.php';




if(!empty($_POST['unit_id'])){
	foreach ($_POST['unit_id'] as $value) {
		
		$response = $service->checkLinkUnit($value,$_POST['test_id']);
		if($response){
			$_SESSION['error'] = "Unit Already belongs to the test";
		    header("Location:../../?view=showInv&c_id=".$_POST['test_id']);
		    exit();
		}
		
		$data = [
			'test_id' => $_POST['test_id'],
			'unit_id' => $value
		];

		$root->saveWithoutId('checkup_unit',$data);
	}

	$_SESSION['done'] = "Unit Added Successfully";
	header("Location:../../?view=showInv&c_id=".$_POST['test_id']);
	exit();
}else {
	$_SESSION['error'] = "Please Select A Unit From the list";
	header("Location:../../?view=showInv&c_id=".$_POST['test_id']);
	exit();
}

?>