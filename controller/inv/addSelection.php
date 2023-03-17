<?php session_start();
	
include '../../inc/conn.php';
include '../../vendor/autoload.php'; 
include '../../classes/declare.php';


if(!empty($_POST['selection_value'])){
	$data = explode(",", $_POST['selection_value']);
	foreach ($data as $value) {
		
		$response = $service->checkSelectValue($value,$_POST['test_id']);
		if($response){
			$_SESSION['error'] = "Value Already There Chose Another Value";
		    header("Location:../../?view=showInv&c_id=".$_POST['test_id']);
		    exit();
			
		}
		
		
    		
			
		$data = [
			'test_id' => $_POST['test_id'],
			'select_value' => trim(ucfirst($value))
		];
		
		$root->saveWithoutId('checkup_select_values',$data);

		
	}

	$_SESSION['done'] = "Value Added Successfully";
	header("Location:../../?view=showInv&c_id=".$_POST['test_id']);
	exit();
}else {
	$_SESSION['error'] = "Please Add Values";
	header("Location:../../?view=showInv&c_id=".$_POST['test_id']);
	exit();
}

?>