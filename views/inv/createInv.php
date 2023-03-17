<?php 
	$stmt = $root->display('checkup_types');
?>

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Add New Investigation</div>
        </div>

        <div class="page-title-actions">
            
             <a href="?view=indexInv&title=Investigations" class="btn btn-danger">Back</a>

            
        </div>
    </div>
</div>   

<?php include 'inc/msg.php'; ?>

 <div class="main-card mb-3 card">
 	<form class="needs-validation" novalidate="" method="post" action="controller/inv/saveInv.php">
 	    <div class="card-body">
 		
 			
 			<div class="form-row">
 				<div class="col-md-6">
 					<div class="position-relative form-group">
 						<label for="checkup_name">Investigation Name</label>
 						<input name="checkup_name" id="checkup_name" type="text" 
 						class="form-control" required> 
 						
 					</div>
 				</div>

 				<div class="col-md-6">
 					 <div class="position-relative form-group">
              <label for="price">Price</label>
              <input name="price" id="price" type="number" 
              class="form-control" required> 
           </div>
 				</div>
 			</div>

 			<div class="form-row">
 				<div class="col-md-6">
 					<div class="position-relative form-group">
 						<label for="checkup_type">Type</label>
 						<select name="checkup_type" id="checkup_type" class="custom-select" required>
              <option></option>
 							<option value="single">Single Value</option>
 							<option value="profile">Profile</option>
              <option value="appearance">Appearance</option>
 						</select>
 					</div>
 				</div>

 				<div class="col-md-6">
 					<div class="position-relative form-group">
 						<label for="checkup_value">Value</label>
 						<select name="checkup_value" id="checkup_value" class="custom-select" required>
              <option></option>
              <option value="text">Text</option>
              <option value="textApp">Text No Ref No Unit</option>
 							<option value="number">Numaric</option>
              <option value="numberApp">Numaric No Ref No Unit</option>
 							<option value="report">Report</option>
 							<option value="selection">Selection</option>
              <option value="selectionApp">Selection No Ref No Unit</option>
 							<option value="profile">For profile</option>
 						</select>
 					</div>
 				</div>
 			</div>

 		

 			<div class="form-row">
 				<div class="col-md-6">
 					<div class="position-relative form-group">
 						<label for="test_id">Profile Includes (if profile is selected)</label>
 						<select name="test_id[]" id="test_id" class="custom-select" multiple style="width: 100%;">
 							<option></option>
 						</select>
 					</div>
 				</div>

 				<div class="col-md-6">
 					<div class="position-relative form-group">
 						<label for="selection_value">Selection Value (if selection is selected)</label>
 						<input name="selection_value" id="selection_value" type="text" 
 						class="form-control" placeholder="Enter value and press Enter">
 					</div>
 				</div>
 			</div>

      <div class="position-relative form-group">
            <label for="test_id">Reference</label>
            <select name="ref_id[]" id="ref_id" class="custom-select" multiple style="width: 100%;">
              <option></option>
            </select>
      </div>

      <div class="position-relative form-group">
            <label for="selection_value">Unit</label>
             <select name="unit_id[]" id="unit_id" class="custom-select" multiple style="width: 100%;">
              <option></option>
            </select>
      </div>

       

 	    </div>

     

 	    <div class="card-footer">
 	    	<div class="input-group input-group-lg">
              <input type="submit" value="Save" class="btn btn-lg btn-primary">
            </div>
 	    	
 	    </div>
 	</form>
 </div>