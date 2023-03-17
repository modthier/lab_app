<?php 
    $stmt = $root->findById('patients','id',$_GET['id']);
    $row = $stmt->fetch();

    $count = $stmt->rowCount();
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Update Patient</div>
        </div>

        <div class="page-title-actions">
            
             <a href="?view=indexPatient&title=Patients" class="btn btn-danger">Back</a>

            
        </div>
        
    </div>
</div>   

<?php include 'inc/msg.php'; ?>

<?php if ($count > 0) { ?>
  


 <div class="main-card mb-3 card">
 	<form  method="post" 
        action="controller/patient/update.php">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
 	    <div class="card-body">
 		
 			
 			<div class="form-row">
 				<div class="col-md-6">
 					<div class="position-relative form-group">
 						<label for="patient_name">Name</label>
 						<input name="patient_name"  type="text" 
 						class="form-control" value="<?php echo $row['patient_name']; ?>" required> 
 						
 					</div>
 				</div>

        <div class="col-md-6">
          <div class="position-relative form-group">
            <label for="birthdate">Date of birth</label>
            <input name="birthdate" id="birthdate" type="date" 
            class="form-control" value="<?php echo $row['birthdate']; ?>" required> 
            
          </div>
        </div>

        <div class="col-md-6">
          <div class="position-relative form-group">
            <label for="checkup_name">Gender</label>
            <select class="custom-select" name="gender" required>
                <option></option>
                <option value="Male" <?php if($row['gender'] == 'Male') echo "selected"; ?> >Male</option>
                <option value="Female"  <?php if($row['gender'] == 'Female') echo "selected"; ?>>Female</option>
            </select>
            
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


<?php }else { ?>
  <h1 class="text-center text-danger">This Patient Maybe has been delete please check</h1>
<?php } ?>

