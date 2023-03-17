<?php 
	$stmt = $root->findById('checkup','id',$_GET['id']);
  $row = $stmt->fetch();
 ?>

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Update : <?php echo $row['checkup_name']; ?></div>
        </div>
        <div class="page-title-actions">
             <a href="?view=indexInv&title=Investigations" class="btn btn-danger">Back</a>
        </div>
    </div>
</div>   

<?php include 'inc/msg.php'; ?>

 <div class="main-card mb-3 card">
 	<form class="needs-validation" novalidate="" method="post" action="controller/inv/updateInv.php?id=<?php echo $_GET['id']; ?>">
 	    <div class="card-body">
 		
 			
 			<div class="form-row">
 				<div class="col-md-6">
 					<div class="position-relative form-group">
 						<label for="checkup_name">Investigation Name</label>
 						<input name="checkup_name" id="checkup_name" type="text" 
 						class="form-control" value="<?php echo $row['checkup_name'] ?>" required> 
 						
 					</div>
 				</div>

 				<div class="col-md-6">
 					  
            <div class="position-relative form-group">
                <label for="price">Price</label>
                <input name="price" id="price" type="number" 
                class="form-control" value="<?php echo $row['price'] ?>" required> 
            </div>

 				</div>
 			</div>

 		
 	    </div>

 	    <div class="card-footer">
 	    	<div class="input-group input-group-lg">
              <input type="submit" value="Update" class="btn btn-lg btn-primary">
            </div>
 	    	
 	    </div>
 	</form>
 </div>