<?php 
	
	    $url = $_SERVER['REQUEST_URI'];
		
		if (
		    $url == '/index.php' ||
		    $url == '/index.php?' ||
		    $url == '/index.php?view=' ||
		    $url == '/?view=' ||
		    $url == '/' ||
		    $url == '/?'
		) { 
			 if($root->canShowLab($auth)){
		     	include_once 'views/main.php';
		 	 }else {
		 	 	include_once 'views/account/indexAccount.php';
		 	 }
		}

		if (isset($_GET['view'])) {
			if (!empty($_GET['view'])) {
				include_once  router::route($_GET['view']); 
			}
		}





 ?>