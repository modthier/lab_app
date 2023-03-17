<?php session_start();

    include '../../inc/conn.php';
    include '../../vendor/autoload.php'; 
    include '../../classes/declare.php';
    

    $error = array();
    

    try {
        $userId =  $auth->register($_POST['email'], $_POST['password'], $_POST['username']);

        if (isset($_POST['role'])){
            if ($_POST['role'] == 1) {
                $auth->admin()->addRoleForUserById($userId,\Delight\Auth\Role::ADMIN);
            }

            if ($_POST['role'] == 8192) {
             $auth->admin()->addRoleForUserById($userId,\Delight\Auth\Role::MANAGER);
            }

            if ($_POST['role'] == 2048) {
             $auth->admin()->addRoleForUserById($userId,\Delight\Auth\Role::EMPLOYEE);
            }
        }
    } catch (\Delight\Auth\AuthError $e) {
        $error[] = "User not creation failed";
    } catch (\Delight\Auth\InvalidEmailException $e) {
        $error[] = "Email id not valid";
    } catch (\Delight\Auth\InvalidPasswordException $e) {
        $error[] = "password does not match our criteria";
    } catch (\Delight\Auth\TooManyRequestsException $e) {
        $error[] = "You have tried so many time";
    } catch (\Delight\Auth\UserAlreadyExistsException $e) {
        $error[] = "User Already Exists";
    } catch (\Delight\Auth\UnknownIdException $e) {
        $error[] = "Unknown error try a gain";
    }

    if(empty($error)){
        $_SESSION['done'] = "User Saved Successfully";
        header("Location:../../index.php?view=indexUser");
        exit();
    }else {
        $_SESSION['errArr'] = $error;
        header("Location:../../index.php?view=createUser");
        exit();
    }

