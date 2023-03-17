<?php session_start();
include '../../inc/conn.php';
include '../../vendor/autoload.php'; 
include '../../classes/declare.php';

	$stmt = $root->findById('invoices','service_id',$_POST['service_id']);
	$count = $stmt->rowCount();
	



	if ($count > 0) {

		$amount_paid = $account->inoviceAmount($_POST['service_id']);
		if ($amount_paid == $_POST['total_price']) {
			$root->setErrors("Invoice allready paid");
		}

		$amount = $account->inoviceAmount($_POST['service_id']);
		$remaining_amount = $_POST['total_price'] - $amount;
		

		if ($_POST['amount_paid'] > $remaining_amount ) {
			$root->setErrors("Amount is higher than remaining amount ("
				 .$remaining_amount.")");
		}
	}
	
	$root->checkAmount($_POST['amount_paid'],$_POST['total_price']);
	$errors = $root->getErrors(); 

	if (empty($errors)) {
		$user_id = $auth->getUserId();
		if ($count > 0) {
			$amount = $account->inoviceAmount($_POST['service_id']) + $_POST['amount_paid'];
			$remaining_amount = $_POST['total_price'] - $amount;
		}else {
			$remaining_amount = $_POST['total_price'] - $_POST['amount_paid'];
		}
		

		$data = [
			'service_id' => $_POST['service_id'],
			'amount_paid' => $_POST['amount_paid'],
			'remaining_amount' => $remaining_amount ,
			'total_price' => $_POST['total_price'],
			'user_id' => $user_id
		];
		
		$success = $root->saveWithoutId('invoices',$data);
		if ($success) {
			$_SESSION['done'] = "Invoice Created Successfully";
			header("Location:../../?view=showAccount&sid=".$_POST['service_id']);
			exit();
		}else {
			$_SESSION['error'] = "Something wrong happend try a gain";
			header("Location:../../?view=paymentAccount&service_id=".$_POST['service_id']."&price=".$_POST['total_price']);
			exit();
		}
	}else {
		$_SESSION['errArr'] = $errors;
		header("Location:../../?view=paymentAccount&service_id=".$_POST['service_id']."&price=".$_POST['total_price']);
		exit();
 	}
	
	

?>