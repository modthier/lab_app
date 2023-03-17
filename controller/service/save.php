<?php 
include '../../inc/conn.php';
include '../../vendor/autoload.php'; 
include '../../classes/declare.php';



$root->checkEmpty($_POST['patient_id']);

$errors = $root->getErrors();


if (empty($errors)) {
	if($service->checkService($_POST['patient_id']) ) {
		$_SESSION['error'] = "Patient Allready Has Open Service Today";
		header('Location:../../?view=createService');
		exit();
	}
	$success = $root->saveWithoutId('service_request',$_POST);
    $id = $conn->lastInsertId();
	if ($success) {
		header("Location:../../?view=detailsService&service_id=".$id);
		exit();
	}else {
		$_SESSION['error'] = "Some error happend try a gain";
		header("Location:../../?view=createService");
		exit();
	}
}else {
	$_SESSION['errArr'] = $errors;
	header('Location:../../?view=createService');
	exit();
}
?>