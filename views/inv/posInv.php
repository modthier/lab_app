<?php 
	$stmt = $root->findById('checkup','id',$_GET['c_id']);
    $row = $stmt->fetch();
 ?>
 <?php $st = $root->getProfileTest($_GET['c_id']); ?>


<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div><?php echo $row['checkup_name']; ?></div>
        </div>

        
        <div class="page-title-actions">
            
             <a href="?view=indexInv&title=Investigations" class="btn btn-danger">Back</a>

            
        </div>
    </div>
</div>   

<?php include 'inc/msg.php'; ?>

<div class="card">
        <div class="card-header">
            <div class="card-title">
                Change Position of tests
            </div>
        </div>

        <div class="card-body p-0">
                    <div class="p-2">
                        <form action="controller/inv/changePos.php" method="post">
                            <input type="hidden" name="parent_id" value="<?php echo $_GET['c_id']; ?>">
                    
                            <div class="row">
                            <?php while ($r = $st->fetch()) {?>
                            
                               
                                  
                                <div class="form-group col-lg-6">
                                    <label for="">Checkup name</label>
                                    <input type="text" name="checkup_name" id="" value="<?php echo $r['checkup_name']; ?>" class="form-control">
                                    
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="position-<?php echo $r['test_id'] ;?>">Position</label>
                                    <input type="text" name="position-<?php echo $r['test_id'] ;?>" class="form-control" 
                                    id="position-<?php echo $r['test_id'] ;?>" value="<?php echo $r['position']; ?>" required>
                                    
                                </div>
                                  
                                    
                                    
                            <?php } ?>
                            </div>
                            <div class="form-group mt-2">
                                <input type="submit" value="Update" class="btn btn-success btn-lg">
                            </div>
                     
                </div>

    </div>