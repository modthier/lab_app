<?php 
include '../../inc/conn.php';
include '../../vendor/autoload.php'; 
include '../../classes/declare.php';

 	

	$account = $service->deleteAccountingRecord($_POST['c_id'],$_POST['sid']);
	$lab = $service->deleteLabrequest($_POST['c_id'],$_POST['sid']);

	if ($account && $lab) {
		$_SESSION['done'] = "Test Canceled Successfully";
		header("Location:../../?view=detailsService&service_id=".$_POST['sid']);
	    exit();
	}else {
		if (is_array($lab) && is_array($account)) {
			$_SESSION['errArr'] = array_merge($lab,$account);
		}elseif(is_array($lab)){
			$_SESSION['errArr'] = $lab[2];
		}elseif (is_array($account)) {
			$_SESSION['errArr'] = $account[2];
		}
		
		header("Location:../../?view=detailsService&service_id=".$_POST['sid']);
	    exit();
	}

	
	
?>