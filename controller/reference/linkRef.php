<?php session_start();
	
include '../../inc/conn.php';
include '../../vendor/autoload.php'; 
include '../../classes/declare.php';




if(!empty($_POST['ref_id'])){
	foreach ($_POST['ref_id'] as $value) {
		
		$response = $service->checkLinkRef($value,$_POST['test_id']);
		if($response){
			$_SESSION['error'] = "Reference Already belongs to the test";
		    header("Location:../../?view=showInv&c_id=".$_POST['test_id']);
		    exit();
		}
		
		$data = [
			'test_id' => $_POST['test_id'],
			'ref_id' => $value
		];

		$root->saveWithoutId('checkup_ref',$data);
	}

	$_SESSION['done'] = "Reference Added Successfully";
	header("Location:../../?view=showInv&c_id=".$_POST['test_id']);
	exit();
}else {
	$_SESSION['error'] = "Please Select A Reference From the list";
	header("Location:../../?view=showInv&c_id=".$_POST['test_id']);
	exit();
}

?>