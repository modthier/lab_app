<?php 
include '../../inc/conn.php';
include '../../vendor/autoload.php'; 
include '../../classes/declare.php';




$root->checkEmpty($_POST);

$errors = $root->getErrors();


if (empty($errors)) {
	
	$success = $root->saveWithoutId('units',$_POST);
   
	if ($success) {
		$_SESSION['done'] = "Unit Added Successfully";
		header("Location:../../?view=createUnit");
		exit();
	}else {
		$_SESSION['error'] = "Some error happend try a gain";
		header("Location:../../?view=createUnit");
		exit();
	}
}else {
	$_SESSION['errArr'] = $errors;
	header("Location:../../?view=createUnit");
	exit();
}
?>