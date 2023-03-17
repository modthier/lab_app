<style type="text/css">
  .select2-container .select2-selection--single {
    height: calc(2.25rem + 2px); 
  }
</style>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Add New Service Ticket</div>
        </div>

        <div class="page-title-actions">
            
             <a href="?view=indexService&title=Services" class="btn btn-danger">Back</a>

            
        </div>

    </div>
</div>   

<?php include 'inc/msg.php'; ?>

 <div class="main-card mb-3 card">
 	<form class="needs-validation" novalidate="" method="post" 
        action="controller/service/save.php">
 	    <div class="card-body">
 		
 			
 			<div class="form-row">
 				<div class="col-md-6">
 					<div class="position-relative form-group">
 						<label for="patient_id">Patient Name</label>
 						 <select class="custom-select" name="patient_id" id="patient_name" style="width: 100%;" required>
               <option></option>
             </select>
 						
 					</div>
 				</div>

        <div class="col-md-6">
          <div class="position-relative form-group">
            <label for="birthdate">Referred From/By (if applicable)</label>
            <input name="referral" id="referral" type="text" 
            class="form-control" required> 
            
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