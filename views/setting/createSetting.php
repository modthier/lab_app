<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Lab Information</div>
        </div>
    </div>
</div>   
<?php include 'inc/msg.php'; ?>



<div class="card">
    <form action="controller/setting/save.php" method="post">
        <div class="card-body">
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="lab_name">Lab Name</label>
                        <input type="text" name="lab_name" class="form-control" required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                </div>
            </div>

             <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control" required>
                    </div>
                </div>

                <div class="col-lg-6">
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <input type="submit" value="Save" class="btn btn-primary">
        </div>
    </form>
</div>
