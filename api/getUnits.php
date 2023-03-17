<?php 
	
    include '../inc/conn.php';
    include '../vendor/autoload.php'; 
    include '../classes/declare.php';
    
    if (isset($_POST['search'])) {
   		$stmt = $service->searchUnit($_POST['search']);
    }else {
    	$stmt = $root->displayWithLimit('units',5);
    }

	



	$response = array();

	while ($row = $stmt->fetch()) {
		$response[] = array(
              'id' => $row['id'] ,
              'text' => $row['unit']
         );
	}

	echo json_encode($response);

 ?>