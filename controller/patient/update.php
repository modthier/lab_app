<?php 
include '../../inc/conn.php';
include '../../vendor/autoload.php'; 
include '../../classes/declare.php';



$root->checkEmpty($_POST);

$errors = $root->getErrors();

if (empty($errors)) {
	$data = [
		'patient_name' => $_POST['patient_name'],
		'birthdate' => $_POST['birthdate'],
		'gender' => $_POST['gender']
	];
	$success = $root->updateTable('patients',$data,$_POST['id']);

	if ($success) {
	 	$_SESSION['done'] = "Patient successfully Updated";
		header("Location:../../?view=indexPatient");
		exit();
	}else {
		$_SESSION['done'] = "Some error happend try a gain";
		header("Location:../../?view=editPatient&id=".$_POST['id']);
		exit();
	}
}else {
	$_SESSION['errArr'] = $errors;
	header("Location:../../?view=editPatient&id=".$_POST['id']);
	exit();
}
?>