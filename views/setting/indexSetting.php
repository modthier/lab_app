<?php 
	$stmt = $root->display('setting');
    $row = $stmt->fetch();

    $count = $stmt->rowCount();
?>

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Lab Information</div>
        </div>
        <?php if($count > 0){ ?>
         <div class="page-title-actions">
            <a href="?view=editSetting&id=1&title=Update Information" class="btn btn-primary">Update Information</a>    
        </div>
        <?php } ?>
    </div>
</div>   
<?php include 'inc/msg.php'; ?>

<?php if($count > 0){ ?>

<div class="card">
    <div class="card-body">
        <div class="info">
           Name : <?php echo $row['lab_name']; ?>
        </div>

        <div class="info">
           Address : <?php echo $row['address']; ?>
        </div>

        <div class="info">
           Phone : <?php echo $row['phone']; ?>
        </div>

        <div class="info">
           Email : <?php echo $row['email']; ?>
        </div>

    </div>
    <div class="card-footer">
        
    </div>
</div>

<?php }else { ?>

    <h1 class="text-center">No information added yet</h1>
    <div class="text-center">
        <a href="?view=createSetting&title=Add Inforamtion" class="btn btn-success">Add Inforamtion</a>
    </div>

<?php } ?>