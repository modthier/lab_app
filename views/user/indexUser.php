<?php if ($root->canShow($auth)) {?>
<?php 
    $stmt = $root->display('users');

?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>List of Users</div>
            
        </div>
        <div class="page-title-actions">
            <a href="?view=createUser" class="btn btn-primary">Add New</a>    
        </div>
    </div>
</div>

<?php include 'inc/msg.php'; ?>

<div class="card">

    <div class="card-body p-0">
          <table class="table table-striped">
            <thead>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </thead>

            <tbody>
                <?php while ($row = $stmt->fetch()){ ?>
                    <tr>

                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php if($row['roles_mask'] == 1) {echo 'Admin';}
                        elseif($row['roles_mask'] == 8192) {echo 'Accountant';}else {
                            echo 'Lab Tech';
                        } ?></td>
                        <td>
                            <!--<a href="?view=editUser&id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit <i class="fa fa-edit"></i></a>-->
                            <a href="?view=changePasswordUser&id=<?php echo $row['id']; ?>" class="btn btn-danger">Force change Password</a>
                            
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        
    </div>
</div>

<?php }else {?>
    <img src="assets/images/access.png" width="100%" height="478px;">
<?php } ?>
