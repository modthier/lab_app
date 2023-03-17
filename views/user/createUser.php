<?php if ($root->canShow($auth)) {?>
	

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Add New User</div>
            
        </div>
        <div class="page-title-actions">
            <a href="?view=indexUser" class="btn btn-danger">Back</a>    
        </div>
    </div>
</div>   



<div class="card">
	 <form class="form" action="controller/user/register.php" method="POST">
	   <div class="card-body">
	        <div class="form-group">
	            <label for="email">username</label>
	            <input type="text" class="form-control" name="username" required>
	         </div>

	        <div class="form-group">
	            <label for="email">email</label>
	            <input type="email" class="form-control" name="email" required>
	            
	        </div>
	        <div class="form-group">
	            <label>Password</label>
	            <input type="password" name="password" class="form-control" required>
	        </div>

	        <div class="form-group">
	            <label for="role">Role</label>
	            <select name="role" id="role" class="form-control" required>
	                <option value="1">Admin</option>
	                <option value="2048">Lab Tech</option>
	                <option value="8192">Accountant</option>
	            </select>
	        </div>
       </div>
       <div class="card-footer">
       		 <button type="submit" class="btn btn-primary">Save</button>
       </div>
    </form>
	
		
	
</div>

<?php }else {?>
	<img src="assets/images/access.png" width="100%" height="478px;">
<?php } ?>
