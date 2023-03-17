<?php 
    $st = $pat->getPatientByServiceId($_GET['service_id']);
    $r = $st->fetch();
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Create Invoice</div>
            
        </div>
        
    </div>
</div> 
<?php include 'inc/msg.php'; ?>

<div class="card">
	<div class="card-header"></div>
	<form action="controller/account/createInvoice.php" method="post">
		<input type="hidden" name="service_id" 
			value="<?php echo $_GET['service_id']; ?>">
		<div class="card-body">
			<div class="form-group">
				<label for="patient_name">Name</label>
				<input type="text" name="patient_name" class="form-control"
				 value="<?php echo $r['patient_name'];  ?>" required>
			</div>

			<div class="form-group">
				<label for="total_price">Total Price</label>
				<input type="number" name="total_price" class="form-control"
				value="<?php echo $_GET['price']; ?>"  required>
			</div>

			<div class="form-group">
				<label for="amount_paid">Amount Paid</label>
				<input type="number" name="amount_paid" class="form-control">
			</div>

			
		</div>
		<div class="card-footer">
			<input type="submit" value="Save" class="btn btn-primary">
		</div>
	</form>
</div>