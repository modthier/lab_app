<?php 
	
    include '../inc/conn.php';
    include '../vendor/autoload.php'; 
    include '../classes/declare.php';
    
    if (isset($_POST['search'])) {
   		$stmt = $service->searchReference($_POST['search']);
    }else {
    	$stmt = $root->displayWithLimit('refs',5);
    }

	



	$response = array();

	while ($row = $stmt->fetch()) {
		$response[] = array(
              'id' => $row['id'] ,
              'text' => $row['reference']
         );
	}

	echo json_encode($response);

 ?>