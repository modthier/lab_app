<?php session_start();
	
include '../../inc/conn.php';
include '../../vendor/autoload.php'; 
include '../../classes/declare.php';


$st = $root->getProfileTest($_POST['parent_id']);


while ($r = $st->fetch()) {
    $data = ['position' => $_POST['position-'.$r['test_id']] ];
    $success = $root->updateTable('checkup_profile_tests',$data,$r['id']);
    
}

header("Location:../../?view=showInv&c_id=".$_POST['parent_id']);
exit();
?>