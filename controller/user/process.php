<?php session_start();

    include '../../inc/conn.php';
    include '../../vendor/autoload.php'; 
    include '../../classes/declare.php';
    

    $error = array();
    


    try {
        $auth->login($_POST['email'], $_POST['password']);

        header("Location:../../index.php");
        exit();

    }
    catch (\Delight\Auth\InvalidEmailException $e) {
       $error[] = 'Wrong email address';
    }
    catch (\Delight\Auth\InvalidPasswordException $e) {
       $error[] = 'Wrong password';
    }
    catch (\Delight\Auth\EmailNotVerifiedException $e) {
        $error[] = 'Email not verified';
    }
    catch (\Delight\Auth\TooManyRequestsException $e) {
        $error[] = 'Too many requests';
    } catch (\Delight\Auth\AttemptCancelledException $e) {
    } catch (\Delight\Auth\AuthError $e) {
        $error[] = 'login failed sorry try again';
    }

    if(!empty($error)){
        $_SESSION['errArr'] = $error;
        header("Location:../../login.php");
        exit();
    }


