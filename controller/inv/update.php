<?php session_start();
	
	include '../../inc/conn.php';
    include '../../vendor/autoload.php'; 
    include '../../classes/declare.php';
    

    $type = $root->getTypeAndValue($_POST['test_id']);
    $row_user = $root->getUser($_POST['test_id'],$_POST['request_id'],$_POST['service_id'],$type);
    $current_user = $auth->getUserId();
    if (!$root->validateUser($current_user,$row_user)) {
    	$_SESSION['error'] = "Sorry you can not update the result(s)";
    	header('Location:../../?view=viewUpdate&sid='.$_POST['service_id'].'&c_id='.$_POST['test_id'].'&lbr='
    		.$_POST['request_id']);
    	exit();
    }
  
    switch ($type['checkup_type']) {
    	case 'single':
    	  $stmt = $root->getTestResult($_POST['test_id'],$_POST['request_id'],$_POST['service_id']);
    	  $row = $stmt->fetch();

    	    if ($row['checkup_value'] == 'report') {
    			$result = nl2br($_POST['result']);
    		}else {
    			$result = $_POST['result'];
    		}
    		if(
    		  $row['checkup_value'] == 'number' ||
    		  $row['checkup_value'] == 'selection' ||
    		  $row['checkup_value'] == 'text' 
	    	){
	    		$reference_id = $_POST['reference_id'];
	    		$unit_id = $_POST['unit_id'];

	    		$data = [
		    		'test_id' => $_POST['test_id'] ,
		    		'result' => $result,
		    		'reference_id' => $reference_id,
		    		'unit_id' => $unit_id,
		    		'service_id' => $_POST['service_id'],
		    		'request_id' => $_POST['request_id'] 
		    	];
	    	}else {
	    		$data = [
		    		'test_id' => $_POST['test_id'] ,
		    		'result' => $result,
		    		'service_id' => $_POST['service_id'],
		    		'request_id' => $_POST['request_id']
		    	];
	    	}

	    	

	    	$success = $root->updateTable('results',$data,$row['id']);

	    	if ($success) {

				header("Location:../../?view=detailsList&service_id=".$_POST['service_id']);
				exit();
	    	}else {
	    		$_SESSION['error'] = "Something wrong happed please try a gain";
	    		header("Location:../../?view=detailsList&service_id=".$_POST['service_id']);
				exit();
	    	}
    		break;
    	
    	
    	case 'profile':
    		$stmt = $root->getTestResults($_POST['request_id'],$_POST['service_id'],$_POST['test_id']);
			$errors = [];
    		while ($row = $stmt->fetch()) {
    			if ($row['checkup_value'] == 'report') {
	    			$result = nl2br($_POST['result-'.$row['test_id']]);
	    		}else {
	    			$result = $_POST['result-'.$row['test_id']];
	    		}
    			if(
	    		  $row['checkup_value'] == 'number' ||
	    		  $row['checkup_value'] == 'selection' ||
	    		  $row['checkup_value'] == 'text'
		    	){
		    		$reference_id = $_POST['reference_id-'.$row['test_id']];
		    		$unit_id = $_POST['unit_id-'.$row['test_id']];

		    		$data = [
			    		'result' => $result,
			    		'reference_id' => $reference_id,
			    		'unit_id' => $unit_id,
	    	         ];

		    	}else {
		    		$data = [
			    		'result' => $result,
		    	    ];
		    	}
		    	

	    	    $success = $root->updateTable('results',$data,$row['id']);
				
	    	    if (!$success) {
					$errors[] = 1;
		    	}
    		} // end of while loop

			
			if(empty($errors)){
				header("Location:../../?view=detailsList&service_id=".$_POST['service_id']);
			    exit();
			}else {
				$_SESSION['error'] = "Something wrong happed please try a gain";
				header("Location:../../?view=errorList&service_id=".$_POST['service_id']);
				exit();
			}
			

			
    		break;
    }



 ?>
