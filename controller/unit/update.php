<?php 
include '../../inc/conn.php';
include '../../vendor/autoload.php'; 
include '../../classes/declare.php';




$root->checkEmpty($_POST);

$errors = $root->getErrors();


if (empty($errors)) {
	
	$success = $root->updateTable('units',$_POST,$_GET['id']);
   
	if ($success) {
		$_SESSION['done'] = "Unit updated Successfully";
		header("Location:../../?view=editUnit&id=".$_GET['id']);
		exit();
	}else {
		$_SESSION['error'] = "Some error happend try a gain";
		header("Location:../../?view=editUnit&id=".$_GET['id']);
		exit();
	}
}else {
	$_SESSION['errArr'] = $errors;
	header("Location:../../?view=editUnit&id=".$_GET['id']);
	exit();
}
?>