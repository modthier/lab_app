<?php 
include '../../inc/conn.php';
include '../../vendor/autoload.php'; 
include '../../classes/declare.php';



if (count($_POST['test_id']) == 0) {
	$root->setErrors("Please Select a Test");
}


$errors = $root->getErrors();
$data = array();
$account = array();

if (empty($errors)) {

	foreach ($_POST['test_id'] as $id) {

		$result = $service->checkRequestedTest($_POST['service_id'],$id);
		if($result){
			$_SESSION['error'] = "Test ".$root->getTestName($id)." Allready Requested";
	        header("Location:../../?view=detailsService&service_id=".$_POST['service_id']);
	        exit();
			
		}

		$uid = uniqid();

		$data = [
			'serviceid' => $_POST['service_id'] ,
			'checkupid' => $id ,
			'uid' => $uid
		];

		$success = $root->saveWithoutId('labrequests',$data);

		if ($success) {
			$account = [
			'price' => $service->getPriceById($id),
			'tab' => "lab" ,
			'item_id' => $id ,
			'service_id' => $_POST['service_id']
		];

		  $pat->saveWithoutId('accounting',$account);
		}
		
	}
	

	
	 $_SESSION['done'] = "Test successfully Added";
	 header("Location:../../?view=detailsService&service_id=".$_POST['service_id']);
	 exit();
	
	
	
}else {
	$_SESSION['errArr'] = $errors;
	header("Location:../../?view=detailsService&service_id=".$_POST['service_id']);
	 exit();
}
?>