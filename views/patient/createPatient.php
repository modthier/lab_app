<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Add New Patient</div>
        </div>

        <div class="page-title-actions">
            
             <a href="?view=indexPatient&title=Patients" class="btn btn-danger">Back</a>

            
        </div>
        
    </div>
</div>   

<?php include 'inc/msg.php'; ?>

 <div class="main-card mb-3 card">
 	<form class="needs-validation" novalidate="" method="post" 
        action="controller/patient/save.php">
 	    <div class="card-body">
 		
 			
 			<div class="form-row">
 				<div class="col-md-6">
 					<div class="position-relative form-group">
 						<label for="patient_name">Name</label>
 						<input name="patient_name"  type="text" 
 						class="form-control" required> 
 						
 					</div>
 				</div>

        <div class="col-md-6">
          <div class="position-relative form-group">
            <label for="birthdate">Date of birth</label>
            <input name="birthdate" id="birthdate" type="date" 
            class="form-control" required> 
            
          </div>
        </div>

        <div class="col-md-6">
          <div class="position-relative form-group">
            <label for="checkup_name">Gender</label>
            <select class="custom-select" name="gender" required>
                <option></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            
          </div>
        </div>

 				
 			</div>





 		
 	    </div>

 	    <div class="card-footer">
 	    	<div class="input-group input-group-lg">
              <input type="submit" value="Save" class="btn btn-lg btn-primary">
            </div>
 	    	
 	    </div>
 	</form>
 </div>