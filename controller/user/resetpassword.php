<?php session_start();

    include '../../inc/conn.php';
    include '../../vendor/autoload.php'; 
    include '../../classes/declare.php';

    $error = array();

    try {
		$auth->admin()
		 ->changePasswordForUserById($_GET['id'], $_POST['password']);
		 $_SESSION['done'] = "User password has been reset successfully";
		 header("Location:../../?view=indexUser");
		 exit();
	}
	catch (\Delight\Auth\UnknownIdException $e) {
		$error[] = 'unknown ID';
	}
	catch (\Delight\Auth\InvalidPasswordException $e) {
		
		$error[] = 'invalid password';
	}
							

	if(!empty($error)){
        $_SESSION['errArr'] = $error;
        header("Location:../../login.php");
        exit();
    }