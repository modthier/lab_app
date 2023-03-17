<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Accounting</div>
            
        </div>
        <div class="page-title-actions">
        <button id="filter" class="btn btn-primary float-sm-right">Show Filters</button>
        </div>
    </div>
</div> 

<?php include 'inc/msg.php'; ?>


    <div class="card mb-3 filters">
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

    <div class="card mb-3 filters">
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
 

<div class="row">
    <div class="col-lg-4 col-xl-4">
        <div class="card mb-3">
        	<div class="card-header">
        		<div class="widget-heading">Total Today</div>
        	</div>
            <div class="card-body">
            	<?php echo number_format($account->totalToday(),2); ?> SDG
            </div>
         
        </div>
    </div>

    <div class="col-lg-4 col-xl-4">
        <div class="card mb-3">
        	<div class="card-header">
        		<div class="widget-heading">Total Week</div>
        	</div>
            <div class="card-body">
            	<?php echo number_format($account->totalWeek(),2); ?> SDG
            </div>
         
        </div>
    </div>


     <div class="col-lg-4 col-xl-4">
        <div class="card mb-3">
        	<div class="card-header">
        		<div class="widget-heading">Total Month</div>
        	</div>
            <div class="card-body">
            	<?php echo number_format($account->totalMonth(),2); ?> SDG
            </div>
         
        </div>
    </div>  

</div>

<div class="card">

	<div class="card-header">
		<a href="controller/exportAccounting.php" class="btn btn-primary">Export to Excel</a>
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

			<tbody id="accountList">
			</tbody>
		</table>
	</div>

	<div class="card-footer">
		<div class="ajax-loading"></div>
	</div>

</div>

<script type="text/javascript" src="assets/scripts/loadAccount.js" defer></script>