<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Add New Unit</div>
        </div>

        <div class="page-title-actions">
            
             <a href="?view=indexUnit&title=Units" class="btn btn-danger">Back</a>

            
        </div>

    </div>
</div>   

<?php include 'inc/msg.php'; ?>

 <div class="main-card mb-3 card">
 	<form class="needs-validation" novalidate="" method="post" action="controller/unit/save.php">
 	    <div class="card-body">
 		 
         <div class="position-relative form-group">
                <label for="unit">Unit</label>
                <input name="unit" id="unit" type="text" 
                class="form-control" required> 
                
         </div>
 		
 	    </div>

 	    <div class="card-footer">
 	    	<div class="input-group input-group-lg">
              <input type="submit" value="Save" class="btn btn-lg btn-primary">
            </div>
 	    	
 	    </div>
 	</form>
 </div>