<?php 
include '../../inc/conn.php';
include '../../vendor/autoload.php'; 
include '../../classes/declare.php';




$root->checkEmpty($_POST);

$errors = $root->getErrors();


if (empty($errors)) {
	
	$success = $root->updateTable('setting',$_POST,$_GET['id']);
   
	if ($success) {
		$_SESSION['done'] = "Information updated Successfully";
		header("Location:../../?view=indexSetting");
		exit();
	}else {
		$_SESSION['error'] = "Some error happend try a gain";
		header("Location:../../?view=editSetting&id=".$_GET['id']);
		exit();
	}
}else {
	$_SESSION['errArr'] = $errors;
	header("Location:../../?view=editSetting&id=".$_GET['id']);
	exit();
}
?>