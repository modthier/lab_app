<?php 
    $stmt = $root->findById('setting','id',$_GET['id']);
    $row = $stmt->fetch();
 ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Update Information</div>
        </div>
    </div>
</div>   




<div class="card">
    <form action="controller/setting/update.php?id=<?php echo $row['id']; ?>" method="post">
        <div class="card-body">
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="lab_name">Lab Name</label>
                        <input type="text" name="lab_name" class="form-control"  
                         value="<?php echo $row['lab_name']; ?>" required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" 
                          value="<?php echo $row['address']; ?>" required>
                    </div>
                </div>
            </div>

             <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control" 
                          value="<?php echo $row['phone']; ?>" required>
                    </div>
                </div>

                <div class="col-lg-6">
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" 
                         value="<?php echo $row['email']; ?>" required>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <input type="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
</div>
