<?php 
    $stmt = $service->getAccountsByPatient($_GET['name']);
 ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Search By Patient</div>
            
        </div>
        <div class="page-title-actions">
          <a href="?view=indexAccount&title=Accounting" class="btn btn-danger">Back</a>
        </div>
        
    </div>
</div> 

<?php include 'inc/msg.php'; ?>


 
    <div class="card mb-3">
    <div class="card-header">
        <div class="card-title">
           Search Accounting
        </div>
    </div>

    <div class="card-body">
        <form action="" method="get">
          <input type="hidden" name="view" value="patientSearchAccount">
          <div class="input-group">
              <input type="text" name="name" class="form-control">
              <div class="input-group-append">
                  <input type="submit" value="Search" class="btn btn-success">
              </div>
          </div>
        </form>
    </div>
</div>
 



<div class="card">

	<div class="card-header">
		<a href="controller/exportAccounting.php?name=<?php echo $_GET['name']; ?>" class="btn btn-primary">Export to Excel</a>
	</div>

	<div class="card-body p-0">
		<table class="table table-striped">
			<thead>
				<th>Patient Name</th>
				<th>Total Price</th>
        <th>Amount Paid</th>
        <th>Remaining Amount</th>
				<th>Date</th>
				<th>Action</th>
			</thead>

			<tbody>
        <?php while ($row = $stmt->fetch()) {?>
        
            <tr>
            <td><?php echo $row['patient_name']; ?></td>
            <td><?php echo number_format($row['total_price'],2)." SDG"; ?></td>
            <td><?php echo number_format($account->inoviceAmount($row['service_id']),2)." SDG"; ?></td>
            <td><?php echo number_format(($row['total_price'] - $account->inoviceAmount($row['service_id'])),2)." SDG"; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td>
              <a class='btn btn-primary' href='?view=showAccount&sid=<?php echo $row['service_id']; ?>'>Details</a>
           </td>
           </tr>
        
       <?php } ?>

			</tbody>
		</table>
	</div>

	<div class="card-footer">
		<div class="ajax-loading"></div>
	</div>

</div>

<script type="text/javascript" src="assets/scripts/loadAccount.js" defer></script>