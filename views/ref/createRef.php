<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Add New Reference</div>
        </div>

        <div class="page-title-actions">
            
             <a href="?view=indexRef&title=References" class="btn btn-danger">Back</a>

            
        </div>

    </div>
</div>   

<?php include 'inc/msg.php'; ?>

 <div class="main-card mb-3 card">
 	<form class="needs-validation" novalidate="" method="post" action="controller/reference/save.php">
 	    <div class="card-body">
 		 
         <div class="position-relative form-group">
                <label for="reference">Reference</label>
                <input name="reference" id="reference" type="text" 
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