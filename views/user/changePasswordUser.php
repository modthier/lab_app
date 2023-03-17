<?php if ($root->canShow($auth)) {?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Change Password By Admin</div>
            
        </div>
        <div class="page-title-actions">
            <a href="?view=indexUser" class="btn btn-danger">Back</a>    
        </div>
    </div>
</div>   



<div class="card">
	 <form class="form" action="controller/user/resetpassword.php?id=<?php echo $_GET['id']; ?>" method="POST">
	   <div class="card-body">
	        
	        <div class="form-group">
	            <label>New Password</label>
	            <input type="text" name="password" class="form-control" required>
	        </div>

       </div>
       <div class="card-footer">
       		 <button type="submit" class="btn btn-primary">Reset</button>
       </div>
    </form>
	
		
	
</div>

<?php }else {?>
  <img src="assets/images/access.png" width="100%" height="478px;">
<?php } ?>
