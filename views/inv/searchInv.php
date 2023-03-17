 <div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Search Investigation</div>
            
        </div>
         <div class="page-title-actions">
            
             <a href="?view=indexInv&title=Investigations" class="btn btn-danger">Back</a>

            
        </div>
       
    </div>
</div>   

<?php include 'inc/msg.php'; ?>
<div class="card mb-3">
    <div class="card-header">
        <div class="card-title">
           Search Investigation
        </div>
    </div>

    <div class="card-body">
        <form action="" method="get">
          <input type="hidden" name="view" value="searchInv">
          <div class="input-group">
              <input type="text" name="q" class="form-control">
              <div class="input-group-append">
                  <input type="submit" value="Search" class="btn btn-success">
              </div>
          </div>
        </form>
    </div>
</div>
<?php 
	$stmt = $root->searchCheckupAll($_GET['q']);
	$count = $stmt->rowCount();
 ?>


 <div class="card">
  <div class="card-body p-0">
      <table class="table table-striped">
        <thead>
          <th>Test</th>
          <th>Test Type</th>
          <th>Price</th>
          <th>Actions</th>
        </thead>
        <tbody>
        	<?php if ($count > 0) {?>
        		
        	<?php while ($row = $stmt->fetch()) {?>
        		<tr>
        			<td><?php echo $row['checkup_name']; ?></td>
        			<td><?php echo ucfirst($row['checkup_type']); ?></td>
        			<td><?php echo number_format($row['price'],2) ." SDG"; ?></td>
        			<td>
        				<a href="?view=editInv&id=<?php echo $row['id'] ?>" class="btn btn-success float-left">Edit <i class="fa fa-edit"></i>
        			    </a>

               
                  <a href='?view=showInv&c_id=<?php echo $row['id'] ?>' class='btn btn-primary float-left ml-2'>View <i class='fa fa-eye'></i></a>
         


                       <form action="controller/inv/delete.php" 
                        id="delete_inv_<?php echo $row['id'];?>" class="float-left ml-2 mr-2" method="post">

                        <input type="hidden" name="test_id" 
                        	value="<?php echo $row['id']; ?>" >
                        <input type="hidden" name="label" 
                        	value="<?php echo $row['label']; ?>" >
  
                       <button class='btn btn-danger' type='submit' onclick="event.preventDefault();
					      var r = confirm('are you sure ?');
					      if (r == true) {
					        document.getElementById('delete_inv_<?php echo $row['id']; ?>').submit();}">Delete <i class="fa fa-trash"></i></button>
					   </form>
					</td>
        		</tr>
        	<?php } ?>

        <?php } else { //end of count ?>
       
        	<h1 class="text-center text-danger">No result found !!!</h1>
        <?php } ?>
 		

          
        </tbody>
      </table>
  </div>

  <div class="card-footer ajax-loading">
    
  </div>
</div>