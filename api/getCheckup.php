<?php 
	
    include '../inc/conn.php';
    include '../vendor/autoload.php'; 
    include '../classes/declare.php';
    
    if (isset($_POST['search'])) {
   		$stmt = $root->searchCheckup($_POST['search']);
    }else {
    	$q = "select * from checkup
           where checkup_type 
           in ('appearance','single') limit 20 ";
      $stmt = $conn->prepare($q);
      $stmt->execute();
    }

	



	$response = array();

	while ($row = $stmt->fetch()) {
		$response[] = array(
              'id' => $row['id'] ,
              'text' => $row['checkup_name']
         );
	}

	echo json_encode($response);

 ?>