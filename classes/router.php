<?php 
	

	class router 
	{
		
		function __construct()
		{
			
		}


		public static function route($file)
		{
			$fullpath = 'views/';
			$words = router::getFolderName($file);
		    $count = count($words);
		    $last = $count - 1;

		    $foldername = $words[$last];
		    $folder = strtolower($foldername);

			if (is_dir($fullpath.$folder."/")) {
				if (file_exists($fullpath.$folder."/".$file.".php") ) {
					
					return $fullpath.$folder.'/'.$file.'.php';
				} else {
					return  $fullpath.'404.php';
				  }
				}else {
					return  $fullpath.'404.php';
				}
		}


		public static function getFolderName($name)
		{
		 
			$re = '/(?#! splitCamelCase Rev:20140412)
			    # Split camelCase "words". Two global alternatives. Either g1of2:
			      (?<=[a-z])      # Position is after a lowercase,
			      (?=[A-Z])       # and before an uppercase letter.
			    | (?<=[A-Z])      # Or g2of2; Position is after uppercase,
			      (?=[A-Z][a-z])  # and before upper-then-lower case.
			    /x';
			$a = preg_split($re, $name);
			
			return $a;

		}
			
	}
	

 ?>