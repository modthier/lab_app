<?php 
     $st = $pat->getPatientByServiceId($_GET['service_id']);
     $row = $st->fetch();

     $s = $root->getTestsByServiceId($_GET['service_id']);
     $count = $s->rowCount();  

     $generator = new Picqer\Barcode\BarcodeGeneratorSVG();
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
            
             <a href="?view=invList&title=Investigations%20Requested" class="btn btn-danger">Back</a>

            
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
                <a class='btn btn-warning' target='_blanck' href='print?view=allPrintReport&sid=<?php echo $_GET['service_id']; ?>'>Print All</a>
               </div>
    </div>
    <div class="card-body p-0">
        <table class="table">
            <thead class="bg-gray">
               <th>Investigation</th>
               <th>Barcode</th>
               <th>Date</th>
               <th>Status</th>
               <th>Action</th>

                <tbody>
                    <?php while ($r = $s->fetch()) {?>

                    <tr>
                        <td><?php echo $root->getOneFieldById('checkup','checkup_name','id',$r['checkupid']); ?></td>
                        <td> 
                          <div id="barcode-<?php echo $r['id']; ?>">
                            <?php echo  $generator->getBarcode($r['uid'], $generator::TYPE_CODE_128,1)."<br \>".$root->getOnePatientByServiceId($r['serviceid'])." - ".$root->getOneFieldById('checkup','checkup_name','id',$r['checkupid']);
                             ?>
                            
                           </div>
                        </td>
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
                        <td>
                           
                          <?php if ($r['status'] == 0){ ?>
                          <a href="?view=viewForm&sid=<?php echo $r['serviceid']; ?>&c_id=<?php echo $r['checkupid']; ?>&lbr=<?php echo $r['id']; ?>" class='btn btn-primary btn-sm' role='button'>    Select
                          </a>
            
                          <?php  }else{ ?>
                          <a href="?view=viewUpdate&sid=<?php echo $r['serviceid']; ?>&c_id=<?php echo $r['checkupid']; ?>&lbr=<?php echo $r['id']; ?>" class='btn btn-success btn-sm' role='button'>    Update
                          </a>

                          <a href="print?view=printReport&sid=<?php echo $r['serviceid']; ?>&c_id=<?php echo $r['checkupid']; ?>&lbr=<?php echo $r['id']; ?>" target='_blanck' class='btn btn-primary btn-sm' role='button'>View</a>

                          <?php  } ?>
                          <button class='print btn btn-warning btn-sm' data-id="<?php echo $r['id']; ?>"> Print Label</button>
           
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