<?php 
    $day = date('Y-m-d');
    $st = $service->searchServiceByPatient($_GET['q'],$day);
 
 ?>
 <div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Search Service List Today</div>
        </div>
        <div class="page-title-actions">
            
             <a href="?view=indexService&title=Services" class="btn btn-danger">Back</a>

            
        </div>

    </div>
    
</div> 

<div class="card mb-3">
    <div class="card-header">
        <div class="card-title">
           Search Service
        </div>
    </div>

    <div class="card-body">
        <form action="" method="get">
          <input type="hidden" name="view" value="searchService">
          <div class="input-group">
              <input type="text" name="q" class="form-control">
              <div class="input-group-append">
                  <input type="submit" value="Search" class="btn btn-success">
              </div>
          </div>
        </form>
    </div>
</div>  
<?php include 'inc/msg.php'; ?>

<?php if($st->rowCount() > 0) { ?>
<div class="row">

<?php while ($row = $st->fetch()) { ?>
 <div class="col-md-12">
      <div class="main-card mb-3 card">
      	<div class="card-header">
      		<?php echo $row['patient_name'] ;?>

      		<div class="btn-actions-pane-right">
      			<a href="?view=detailsService&service_id=<?php echo $row['id']; ?>" class="btn btn-primary">Details</a>
      		</div>
      	</div>
        
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                   <th>Service No</th>
                   <th>Referred From</th>
                   <th>created At</th>
                </thead>
                <tbody>
                   <tr>
                     <td><?php echo $row['id']; ?></td>
                     <td><?php echo $row['referral']; ?></td>
                     <td><?php echo $row['created_at']; ?></td>
                   </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
           
        </div>
     </div>
                                    
 </div>

<?php } ?>



</div>
<?php }else { ?>
  <h1 class="text-danger text-center">No Result Found!!!</h1>
<?php } ?>