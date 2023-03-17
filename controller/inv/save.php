<?php session_start();
	
	include '../../inc/conn.php';
    include '../../vendor/autoload.php'; 
    include '../../classes/declare.php';
    

    $type = $root->getTypeAndValue($_POST['test_id']);
    $user_id = $auth->getUserId();
  
    switch ($type['checkup_type']) {
    	case 'single':
    		if ($type['checkup_value'] == 'report') {
    			$result = nl2br($_POST['result']);
    		}else {
    			$result = $_POST['result'];
    		}
    		if(
    		  $type['checkup_value'] == 'number' ||
    		  $type['checkup_value'] == 'selection' ||
    		  $type['checkup_value'] == 'text'
	    	){
	    		$reference_id = $_POST['reference_id'];
	    		$unit_id = $_POST['unit_id'];

	    		$data = [
		    		'test_id' => $_POST['test_id'] ,
		    		'result' => $result,
		    		'reference_id' => $reference_id,
		    		'unit_id' => $unit_id,
		    		'service_id' => $_POST['service_id'],
		    		'request_id' => $_POST['request_id'],
		    		'user_id' => $user_id
		    	];
	    	}else {
	    		$data = [
		    		'test_id' => $_POST['test_id'] ,
		    		'result' => $result,
		    		'service_id' => $_POST['service_id'],
		    		'request_id' => $_POST['request_id'],
		    		'user_id' => $user_id
		    	];
	    	}

	    	

	    	 $success = $root->saveWithoutId('results',$data);

	    
	    	if ($success) {

	    		$status = ['status' => 1];
	    		$root->updateTable('labrequests',$status,$_POST['request_id']);


				header("Location:../../?view=invList&title=Investigations Requested");
				exit();
	    	}else {
	    		$_SESSION['error'] = "Something wrong happed please try a gain";
	    		header("Location:../../?view=invList&title=Investigations Requested");
				exit();
	    	}
    		break;
    	
    	
    	case 'profile':
    		$stmt = $root->getProfileTest($_POST['test_id']);


    		while ($row = $stmt->fetch()) {
    			$t= $root->getTypeAndValue($row['test_id']);
    			
    			if ($type['checkup_value'] == 'report') {
    			   $result = nl2br($_POST['result-'.$row['test_id']]);
	    		}else {
	    			$result = $_POST['result-'.$row['test_id']];
	    		}
    			if(
	    		  $t['checkup_value'] == 'number' ||
	    		  $t['checkup_value'] == 'selection' ||
	    		  $t['checkup_value'] == 'text'
		    	){
		    		$reference_id = $_POST['reference_id-'.$row['test_id']];
		    		$unit_id = $_POST['unit_id-'.$row['test_id']];

		    		$data = [
			    		'test_id' => $row['test_id'] ,
			    		'result' => $result,
			    		'reference_id' => $reference_id,
			    		'unit_id' => $unit_id,
			    		'service_id' => $_POST['service_id'],
			    		'request_id' => $_POST['request_id'],
			    		'user_id' => $user_id ,
			    		'parent_id' => $_POST['test_id']
	    	         ];

		    	}else {
		    		$data = [
			    		'test_id' => $row['test_id'] ,
			    		'result' => $_POST['result-'.$row['test_id']],
			    		'service_id' => $_POST['service_id'],
			    		'request_id' => $_POST['request_id'],
			    		'user_id' => $user_id ,
			    		'parent_id' => $_POST['test_id']
		    	    ];
		    	}

		    	
		    	

	    	    $root->saveWithoutId('results',$data);
	    	    $status = ['status' => 1];
		    	$root->updateTable('labrequests',$status,$_POST['request_id']);
	    	    

    		}

    		header("Location:../../?view=invList&title=Investigations Requested");
					exit();
    		break;
    }



 ?>