<?php 
	$stmt = $service->getAccountDetails($_GET['sid']);

	$st = $pat->getPatientByServiceId($_GET['sid']);
    $r = $st->fetch();

    $q = "SELECT  sum(price) as 'total_price'
             FROM accounting 
             where service_id = ? and tab = 'lab' ";

    $s = $conn->prepare($q);
    $s->bindValue(1,$_GET['sid']);
    $s->execute();

    $price = $s->fetch();

    $invoice = $root->findById('invoices','service_id',$_GET['sid']);
    $c = $invoice->rowCount();

    $tool = new tools($conn);
 ?>

 <div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Account Details</div>
            
        </div>
        <div class="page-title-actions">
            
            <a href="?view=paymentAccount&service_id=<?php echo $_GET['sid'] ?>&price=<?php echo $price['total_price'] ;?>&title=Create Invoice" class="btn btn-primary">create invoice</a>

             <a href="?view=indexAccount&title=Accounting" class="btn btn-danger">Back</a>

            
        </div>
        
    </div>
</div> 

<?php include 'inc/msg.php'; ?>

<div class="card mb-2">
    <div class="card-header">
        <h3>Patient Invoices</h3>
    </div>
    <div class="card-body">
       <?php if ($c > 0) {?>
           <?php  echo "<h4 class='text-success'>Patient has <strong>".$tool->numberTowords($c)."</strong> Invoice(s)</h4>"; ?>
            
               <table class="table">
                   <th>Total Price</th>
                   <th>Amount Paid</th>
                   <th>Remaining Amount</th>
                   <th>Action</th>
                   <?php $i = 1; while ($p = $invoice->fetch()) {?>
                   <tr>
                       <td>
                          <?php echo number_format($p['total_price'],2)." SDG";  ?>
                        </td>
                       <td>
                          <?php echo number_format($p['amount_paid'],2)." SDG";  ?>
                       </td>
                       <td>
                          <?php echo number_format($p['remaining_amount'],2)." SDG";?>
                       </td>
                       <td>
                           <a href="print?view=invoiceReport&sid=<?php echo $_GET['sid']; ?>&invoice_id=<?php echo $p['id']; ?>" target="_blank" class="btn btn-warning">Print Invoice <?php echo $tool->numberTowords($i); ?> </a>
                       </td>
                   </tr>
                   <?php $i++; } ?>
               </table>
           
       <?php }else { ?>
           <?php  echo "<h4 class='text-danger'>Patient has no Invoice yet</h4>"; ?>
       <?php } ?>
    </div>
    <div class="card-footer"></div>
</div>

<div class="card mb-2">
            <div class="card-header">
                <div class="card-title">
                    <h3>Patient Information</h3>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead class="bg-gray">
                        <th>Patient Name</th>
                        <th>Age</th>
                        <th>Gender</th>

                        <tbody>
                            <tr>
                                <td><?php echo $r['patient_name']; ?></td>
                                <td><?php echo $pat->getAge($r['birthdate']); ?></td>
                                <td><?php echo $r['gender']; ?></td>
                            </tr>
                        </tbody>
                    </thead>
                </table>
            </div>

            <div class="card-footer">
                
            </div>
</div>

<div class="card mb-2">
            <div class="card-header">
                <div class="card-title">
                    <h3>Details</h3>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead class="bg-gray">
                        <th>Test Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Date</th>

                        <tbody>
                        	<?php while ($row = $stmt->fetch()) {?>
                            <tr>
                                <td><?php echo $row['checkup_name']; ?></td>
                                <td><?php echo $row['price'] ?></td>
                                <td>
                                    <?php 
                                        if ($row['status'] == 1) {
                                            echo "Paid";
                                        }else {
                                            echo "Unpaid";
                                        }
                                     ?>
                                </td>
                                <td><?php echo $row['date']; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td>Total</td>
                                <td><?php echo $price['total_price']; ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </thead>
                </table>
            </div>

            <div class="card-footer">
                
            </div>
</div>