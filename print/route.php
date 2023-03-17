<?php 
	
	    $url = $_SERVER['REQUEST_URI'];
		
		if (
		    $url == '/lab/index.php' ||
		    $url == '/lab/index.php?' ||
		    $url == '/lab/index.php?view=' ||
		    $url == '/lab/?view=' ||
		    $url == '/lab/' ||
		    $url == '/lab/?'
		) {
		     include 'views/main.php';
		}

		if (isset($_GET['view'])) {
			if (!empty($_GET['view'])) {
				include  router::route($_GET['view']); 
			}
		}





 ?>