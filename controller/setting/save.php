<?php 
include '../../inc/conn.php';
include '../../vendor/autoload.php'; 
include '../../classes/declare.php';




$root->checkEmpty($_POST);

$errors = $root->getErrors();


if (empty($errors)) {
	
	$success = $root->saveWithoutId('setting',$_POST);
   
	if ($success) {
		$_SESSION['done'] = "Information Added Successfully";
		header("Location:../../?view=indexSetting");
		exit();
	}else {
		$_SESSION['error'] = "Some error happend try a gain";
		header("Location:../../?view=createSetting");
		exit();
	}
}else {
	$_SESSION['errArr'] = $errors;
	header("Location:../../?view=createSetting");
	exit();
}
?>