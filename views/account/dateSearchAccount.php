<?php 
    $stmt = $service->getAccountsByDate($_GET['date_from'],$_GET['date_to']);
 ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Report Between Two Dates</div>
            
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
              Report Between Two Dates
          </div>
      </div>
      <div class="card-body">  
        <form action="index.php?view=hello" method="get">
              <input type="hidden" name="view" value="dateSearchAccount">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="position-relative form-group">
                          <label>Date From</label>
                          <input type="date" name="date_from" class="form-control" required>
                      </div>
                  </div>

                   <div class="col-lg-6">
                      <div class="position-relative form-group">
                          <label>Date To</label>
                          <input type="date" name="date_to" class="form-control" required>
                      </div>
                  </div>
              </div>

              <div class="position-relative form-group">
                  <input type="submit" value="Search" class="btn btn-success">
              </div>
          </form>
       </div>
    </div>
 



<div class="card">

	<div class="card-header">
		<a href="controller/exportAccounting.php?date_from=<?php echo $_GET['date_from'] ?>&date_to=<?php echo $_GET['date_to']; ?>" class="btn btn-primary">Export to Excel</a>
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