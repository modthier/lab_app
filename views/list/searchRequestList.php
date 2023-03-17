 <?php 
    $st = $service->searchServiceByPatient($_GET['q']);
 
 ?>
 <div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Search Investigations Requested</div>
        </div>

    </div>
    
</div>   

<div class="card mb-3">
    <div class="card-header">
        <div class="card-title">
           Search Investigations Requested
        </div>
    </div>

    <div class="card-body">
        <form action="" method="get">
          <input type="hidden" name="view" value="searchRequestList">
          <div class="input-group">
              <input type="text" name="q" class="form-control">
              <div class="input-group-append">
                  <input type="submit" value="Search" class="btn btn-success">
              </div>
          </div>
        </form>
    </div>
</div> 
  
<?php if($st->rowCount() > 0) { ?>
<div class="row">

<?php while ($row = $st->fetch()) { ?>
    	<div class='col-md-12'>
    	<div class='main-card mb-3 card'>
    	<div class='card-header'> 
    		<?php echo $row['patient_name']; ?>
    	<div class='btn-actions-pane-right'>
    	<button type='button' data-toggle='collapse' href='#service-<?php echo $row['id'] ?>' class='btn btn-primary'>Show</button>
    	</div> </div>
    	<div class='card-body p-0'>
    	<div class='collapse' id='service-<?php echo $row['id'] ;?>'>
    	<?php $s = $root->getTestsByServiceId($row['id']); ?>
    	<table class='mb-0 table table-striped'>
        				<thead>
        					<th>Investigation</th>
        					<th>Date</th>
        					<th>Status</th>
        					<th>Action</th>
        				</thead>
        				<tbody> 
        <?php while ($r = $s->fetch()) { ?>
        	<tr>
        	<td>
        		<?php echo $root->getOneFieldById('checkup','checkup_name','id',$r['checkupid']); ?>
        	</td>
        	<td><?php echo $r['dateCreated']; ?></td>
        	<td>
        	        <?php  if($r['status'] == 0){
        	         	echo "Pendding";
        	         }else {
        	         	echo  "Finished";
        	         } ?>
        	</td>
        	<?php if ($r['status'] == 0){ ?>
        		<td><a href="?view=<?php echo $root->getOneFieldById('checkup','label','id',$r['checkupid']); ?>fForm&sid=<?php echo $row['serviceid']; ?>&c_id=<?php echo $r['checkupid']; ?>&lbr=<?php echo $r['id']; ?>" target='_blanck' class='btn btn-primary btn-sm' role='button'>Select</a>
        		</td>
        	<?php }else{ ?>
        		<td>
        		<a href="?view=viewUpdate&sid=<?php echo $row['id']; ?>&c_id=<?php echo $r['checkupid']; ?>&lbr=<?php echo $r['id']; ?>" target='_blanck' class='btn btn-success btn-sm' role='button'>Update</a>

        		<a href="print?view=printReport&sid=<?php echo $row['id']; ?>&c_id=<?php echo $r['checkupid']; ?>&lbr=<?php echo $r['id']; ?>" target='_blanck' class='btn btn-primary btn-sm' role='button'>View</a>

        		</td>
        	<?php } ?>

        	</tr>

        <?php } ?>

       </tbody>
        			</table>
        		
        	</div>
                          
        </div>

        <div class='card-footer'>
           
        </div>
     </div>
                                    
    </div>

   

<?php } ?>
</div>

<?php }else { ?>
  <h1 class="text-danger text-center">No Result Found!!!</h1>
<?php } ?>