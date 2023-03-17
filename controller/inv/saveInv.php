<?php session_start();
	
include '../../inc/conn.php';
include '../../vendor/autoload.php'; 
include '../../classes/declare.php';


$testData = $_POST;


unset($testData['test_id']);
unset($testData['selection_value']);

$root->checkEmpty($testData);

$errors = $root->getErrors();

if (empty($errors)) {

	if($_POST['checkup_type'] == 'profile'){
		if(empty($_POST['test_id'])){
			$_SESSION['error'] = "Please chose tests that is included in the profile";
			header('Location:../../?view=createInv');
			exit();
		}
	}

	if($_POST['checkup_value'] == 'selection' || 
		$_POST['checkup_value'] == 'selectionApp' ){
		if(empty($_POST['selection_value'])){
			$_SESSION['error'] = "Please insert selection values for the test";
			header('Location:../../?view=createInv');
			exit();
		}
	}

	if($_POST['checkup_value'] == 'selection' || 
		$_POST['checkup_value'] == 'number' ||
		$_POST['checkup_value'] == 'text'
	){
		if(empty($_POST['ref_id']) || empty($_POST['unit_id'])){
			$_SESSION['error'] = "Please choose reference and unit for the test";
			header('Location:../../?view=createInv');
			exit();
		}
	}

	$uniqid = uniqid();
	$filename = $uniqid."fForm.php";
	$filenameUpdate = $uniqid."uUpdate.php";

	$data = [
	'checkup_name' => $_POST['checkup_name'],
	'checkup_type' => $_POST['checkup_type'],
	'checkup_value' => $_POST['checkup_value'],
	'label' => $uniqid,
	'price' => $_POST['price']
    ];

    $success = $root->saveWithoutId('checkup',$data);

    if ($success) {
    	$id = $conn->lastInsertId();
    	

    	if(!empty($_POST['selection_value'])){
    		$data = explode(",", $_POST['selection_value']);
			foreach ($data as $value) {
				$data = [
					'test_id' => $id,
					'select_value' => trim(ucfirst($value))
				];
				$root->saveWithoutId('checkup_select_values',$data);
			}
		}

		if(!empty($_POST['test_id'])){
			foreach ($_POST['test_id'] as $value) {
				$data = [
					'parent_id' => $id,
					'test_id' => $value
				];
				$root->saveWithoutId('checkup_profile_tests',$data);
			}
		}

		if(!empty($_POST['ref_id'])){
    		
			foreach ($_POST['ref_id'] as $value) {
				$data = [
					'test_id' => $id,
					'ref_id' => $value
				];
				$root->saveWithoutId('checkup_ref',$data);
			}
		}

		if(!empty($_POST['unit_id'])){
    		
			foreach ($_POST['unit_id'] as $value) {
				$data = [
					'test_id' => $id,
					'unit_id' => $value
				];
				$root->saveWithoutId('checkup_unit',$data);
			}
		}
        
        
    	

    	$_SESSION['done'] = "Test successfully Added";
		header("Location:../../?view=indexInv");
		exit();
    }

}else {
	$_SESSION['errArr'] = $errors;
	header('Location:../../?view=createInv');
	exit();
}


 ?>