<?php 
     $st = $pat->getPatientByServiceId($_GET['service_id']);
     $row = $st->fetch();

     $s = $root->getTestsByServiceId($_GET['service_id']);
     $count = $s->rowCount();  
 ?>

 <div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Patient Information</div>
        </div>

        <div class="page-title-actions">
            
             <a href="?view=historyService&title=Services" class="btn btn-danger">Back</a>

            
        </div>

    </div>
</div>   

<?php include 'inc/msg.php'; ?>

<div class="row">
    <div class="col-md-12">
        
        <div class="card mb-2 d-flex ">
            <div class="card-header">
                <div class="card-title">
                    Patient Information
                </div>
            </div>
            <div class="card-body p-0 pb-3 align-items-stretch">
                <table class="table">
                    <thead class="bg-gray">
                        <th>Patient Name</th>
                        <th>Age</th>
                        <th>Gender</th>

                        <tbody>
                            <tr>
                                <td><?php echo $row['patient_name']; ?></td>
                                <td><?php echo $pat->getAge($row['birthdate']); ?></td>
                                <td><?php echo $row['gender']; ?></td>
                            </tr>
                        </tbody>
                    </thead>
                </table>
            </div>

            <div class="card-footer">
                
            </div>
        </div>
    </div>

    
</div>




<?php if($count > 0){ ?>
<div class="card">
    <div class="card-header">
        <div class="card-title">
            Investigations Requested
        </div>

       <div class='btn-actions-pane-right'>
        <a class='btn btn-warning' target='_blank' href='print?view=allPrintReport&sid=<?php echo $_GET['service_id']; ?>'>Print All</a>
        <a href="print?view=printRequestReport&service_id=<?php echo $_GET['service_id']; ?>" class="btn btn-primary" target="_blank">Print Request</a>
       </div>
    </div>
    <div class="card-body p-0">
        <table class="table">
            <thead class="bg-gray">
               <th>Investigation</th>
               <th>Date</th>
               <th>Status</th>
              

                <tbody>
                    <?php while ($r = $s->fetch()) {?>

                    <tr>
                        <td><?php echo $root->getOneFieldById('checkup','checkup_name','id',$r['checkupid']); ?></td>
                        <td><?php echo $r['dateCreated']; ?></td>
                        <td>
                            <?php 
                               if($r['status'] == 0){
                                  echo  "Pendding";
                               }else {
                                echo  "Finished";
                                 } 
                            ?>     
                        </td>
                        
                    </tr>
                  <?php } ?>
                </tbody>
            </thead>
        </table>
    </div>

    <div class="card-footer">
        
    </div>
</div>
<?php }else { ?>
    <h1 class="text-center text-danger">No Investigations Requested Yet</h1>
<?php } ?>