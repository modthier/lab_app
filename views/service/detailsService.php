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
            
             <a href="?view=indexService&title=Services" class="btn btn-danger">Back</a>

            
        </div>

    </div>
</div>   

<?php include 'inc/msg.php'; ?>

<div class="row">
    <div class="col-md-6">
        
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

    <div class="col-md-6">
        <div class="card mb-2 d-flex">
            <div class="card-header">
                <div class="card-title">
                    Request Investigation
                </div>
                
            </div>
            <div class="card-body p-0 pl-3 pr-3 align-items-stretch" style="padding-bottom: 1px !important;">
               <form action="controller/service/addTest.php" method="post">
                    <input type="hidden" name="service_id" value="<?php echo $_GET['service_id'] ?>">


                    <div class="position-relative form-group">
                        <label for="test_id">Investigation</label>
                        <select name="test_id[]" id="request_test" class="custom-select" multiple style="width: 100%;">
                            <option></option>
                        </select>
                    </div>

                    <input type="submit" value="Save" class="btn btn-primary" style="margin-bottom: 1px !important;">
                        
               </form>
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

                <a href="print?view=printRequestReport&service_id=<?php echo $_GET['service_id']; ?>" class="btn btn-primary" target="_blank">Print Request</a>
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
                            <?php if($r['status'] == 0){?>
                                
                          
                           <form action='controller/service/cancel.php' id="delete_inv_<?php echo $r['checkupid']; ?>" class='float-left ml-2 mr-2' method='post'>

                           <input type='hidden' name='c_id' value="<?php echo $r['checkupid']; ?>" >
                           <input type='hidden' name='sid' value="<?php echo $_GET['service_id']; ?>" >
                            <button class='btn btn-danger btn-sm' type='submit' 
                              onclick = ' event.preventDefault();
                              var r = confirm("are you sure ?");
                              if (r == true) {
                                document.getElementById("delete_inv_<?php echo $r['checkupid'] ?>").submit();} '>Cancel <i class='fa fa-trash'></i></button>
                           </form>  
                            <?php }   ?>
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