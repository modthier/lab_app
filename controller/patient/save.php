<?php 
include '../../inc/conn.php';
include '../../vendor/autoload.php'; 
include '../../classes/declare.php';



$root->checkEmpty($_POST);

$errors = $root->getErrors();

if (empty($errors)) {
	$success = $root->saveWithoutId('patients',$_POST);

	if ($success) {
	 	$_SESSION['done'] = "Patient successfully Added";
		header("Location:../../?view=createPatient");
		exit();
	}else {
		$_SESSION['done'] = "Some error happend try a gain";
		header("Location:../../?view=createPatient");
		exit();
	}
}else {
	$_SESSION['errArr'] = $errors;
	header('Location:../../?view=createPatient');
	exit();
}
?>