<?php 
	
    include '../inc/conn.php';
    include '../vendor/autoload.php'; 
    include '../classes/declare.php';
    
    if (isset($_POST['search'])) {
   		$stmt = $pat->searchByName($_POST['search']);
    }else {
    	$stmt = $pat->displayWithLimit('patients',20);
    }

	



	$response = array();

	while ($row = $stmt->fetch()) {
		$response[] = array(
              'id' => $row['id'] ,
              'text' => $row['patient_name']
         );
	}

	echo json_encode($response);

 ?>

