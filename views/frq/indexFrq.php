<?php 
	
	$q = "SELECT COUNT(labrequests.checkupid) as FRQ, labrequests.checkupid , checkup.checkup_name ,  
	      checkup.price as 'price' , checkup.price * COUNT(labrequests.checkupid) as 'total_price'
	      FROM labrequests LEFT JOIN checkup 
	      on checkup.id = labrequests.checkupid
          GROUP BY labrequests.checkupid";

    $stmt = $conn->prepare($q);
    $stmt->execute();
    

 ?>


  <div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Frq Investigations Report</div>
        </div>

    </div>
    
</div>  

 <div class="card mb-3">
      <div class="card-header">
          <div class="card-title">
              Report Between Two Dates
          </div>
      </div>
      <div class="card-body">  
        <form action="index.php?view=hello" method="get">
              <input type="hidden" name="view" value="searchFrq">
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


 <div class="main-card mb-3 card">
 	<div class="card-body">
 		<table class="table table-striped">
 			<thead>
 				<th>Investigation Name</th>
 				<th>Unit Price</th>
 				<th>Total Price</th>
 				<th>FRQ</th>
 			</thead>

 			<tbody>
 				<?php while ($row = $stmt->fetch()) { ?>
 					<tr>
 						<td><?php echo $row['checkup_name']; ?></td>
 						<td><?php echo $row['price']; ?></td>
 						<td><?php echo $row['total_price']; ?></td>
 						<td><?php echo $row['FRQ']; ?></td>
 					</tr>
 				<?php } ?>
 			</tbody>
 		</table>
 	</div>
 </div>