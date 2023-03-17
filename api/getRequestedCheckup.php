<?php 
	
    include '../inc/conn.php';
    include '../vendor/autoload.php'; 
    include '../classes/declare.php';
    
    if (isset($_POST['search'])) {
   		$q = "select * from checkup where checkup_name like ? and checkup_type 
           in ('profile','single')";
      $stmt = $conn->prepare($q);
      $stmt->bindValue(1,"%".$_POST['search']."%");
      $stmt->execute();

    }else {
    	$q = "select * from checkup
           where checkup_type 
           in ('profile','single') limit 20 ";
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