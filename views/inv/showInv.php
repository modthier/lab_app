<?php 
	$stmt = $root->findById('checkup','id',$_GET['c_id']);
    $row = $stmt->fetch();
 ?>


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

<div class="row">
    <div class="col-lg-6 col-xl-6">
        <div class="card mb-3 widget-content">
            <div class="widget-content-wrapper">
                <div class="widget-content-left">
                    <div class="widget-heading">Price</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-success"><span><?php echo $row['price']; ?> SDG</span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-xl-6">
        <div class="card mb-3 widget-content">
            <div class="widget-content-wrapper">
                <div class="widget-content-left">
                    <div class="widget-heading">Type</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-success"><span><?php echo $row['checkup_type']; ?></span></div>
                </div>
            </div>
        </div>
    </div>


    

</div>

<?php if ($row['checkup_type'] === 'profile') {?>
    <?php $st = $root->getProfileTest($_GET['c_id']); ?>
 
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Tests included in the profile
            </div>
        </div>

        <div class="card-body p-0">
                    <div class="p-2">
                        <form action="controller/inv/linkTest.php" method="post">
                            <input type="hidden" name="parent_id" value="<?php echo $_GET['c_id']; ?>" >

                             <div class="form-group">
                                <label for="test_id" class="pr-2">Test Name</label>
                                <select name="test_id[]" id="test_id" class="custom-select" multiple required>
                                    <option></option>
                                </select>
                            </div>
                               
                             <input type="submit" value="Add" 
                              class="btn btn-success">                           
                        </form>
                    </div>
                    <hr>
                    <div class="p-2">
                        <a href="?view=posInv&c_id=<?php echo $_GET['c_id']; ?>" class="btn btn-warning"> Change position </a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <th>Test Name</th>
                            <th> Position </th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php while ($r = $st->fetch()) {?>
                            
                                <tr>
                                    <td><?php echo $r['checkup_name']; ?></td>
                                    <td> <?php echo $r['position']; ?>  </td>
                                    <td>
                                        <form action='controller/inv/detachTest.php' id="delete_test_<?php echo $r['id'] ?>" class='float-left ml-2 mr-2' method='post'>

                                        <input type='hidden' name='id' value='<?php echo $r['id'] ?>' >
                                        <input type='hidden' name='test_id' value='<?php echo $_GET['c_id'] ?>' >
                                       
                                       <button class='btn btn-danger' type='submit' 
                                         onclick =  "event.preventDefault();
                                         var r = confirm('are you sure ?');
                                         if (r == true) {
                                         document.getElementById('delete_test_<?php echo $r['id']; ?>').submit();} ">Remove Link <i class='fa fa-trash'></i>
                                       </button>
                                       </form>
                                   </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>

    </div>
   
<?php } ?>

<?php if ($row['checkup_type'] == 'single') {?>
   
     <?php if(
          $row['checkup_value'] == 'selection' ||
          $row['checkup_value'] == 'selectionApp'
          ) { ?>
        <?php $sel = $root->getTestSelectionList($_GET['c_id']); ?>

        <div class="card mb-3">
            <div class="card-header">
                <div class="card-title">Appearance Select Values</div>
            </div>

            <div class="card-body p-0">
                <div class="mb-3 mt-3 ml-2 mr-2">
                    <form action="controller/inv/addSelection.php" method="post">
                        <input type="hidden" name="test_id" value="<?php echo $_GET['c_id']; ?>">
                        <div class="position-relative form-group">
                            <label for="selection_value">Selection Values</label>
                            <input name="selection_value" id="selection_value" type="text" 
                            class="form-control" placeholder="Enter value and press Enter">
                        </div>

                        <input type="submit" value="Add" class="btn btn-success">
                    </form>
                </div>
                <table class="table table-striped">
                    <thead>
                        <th>Value</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        <?php while ($values = $sel->fetch()) {?>
                           
                        <tr>
                            <td><?php echo $values['select_value']; ?></td>
                            <td>
                                 <form action='controller/inv/deleteSelection.php' id="delete_selection_<?php echo $values['id'] ?>" class='float-left ml-2 mr-2' method='post'>

                                        <input type='hidden' name='id' value='<?php echo $values['id'] ?>' >
                                       
                                        <input type='hidden' name='test_id' value='<?php echo $_GET['c_id']; ?>' >
                                       <button class='btn btn-danger' type='submit' 
                                         onclick =  "event.preventDefault();
                                         var r = confirm('are you sure ?');
                                         if (r == true) {
                                         document.getElementById('delete_selection_<?php echo $values['id']; ?>').submit();} ">Delete<i class='fa fa-trash'></i>
                                       </button>
                                       </form>
                            </td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
     <?php } ?>

      <?php 
        if (
            $row['checkup_value'] == 'number' ||
            $row['checkup_value'] == 'selection' ||
            $row['checkup_value'] == 'text' 
          ) 
        {
     ?>

<?php $ref = $service->getRefById($_GET['c_id']); ?>
<div class="card mb-3">
        <div class="card-header">
            <div class="card-title">
                Test References
            </div>
        </div>

        <div class="card-body p-0">
                    <div class="p-2">
                         <form action="controller/reference/linkRef.php" method="post">
                             <input type="hidden" name="test_id" value="<?php echo $_GET['c_id']; ?>">
                         
                             <div class="position-relative form-group">
                                <label for="ref_id">Reference</label>
                                <select name="ref_id[]" id="ref_id" class="custom-select" multiple style="width: 100%;">
                                  <option></option>
                                </select>
                              </div>

                              <input type="submit" value="Add" class="btn btn-success">
                          </form>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <th>Reference</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php while ($r = $ref->fetch()) {?>
                            
                                <tr>
                                    <td><?php echo $r['reference']; ?></td>
                                     <td>
                                        <form action='controller/reference/detachRef.php' id="delete_ref_<?php echo $r['id'] ?>" class='float-left ml-2 mr-2' method='post'>

                                        <input type='hidden' name='id' value='<?php echo $r['id'] ?>' >
                                        <input type='hidden' name='test_id' value='<?php echo $_GET['c_id'] ?>' >
                                       
                                       <button class='btn btn-danger' type='submit' 
                                         onclick =  "event.preventDefault();
                                         var r = confirm('are you sure ?');
                                         if (r == true) {
                                         document.getElementById('delete_ref_<?php echo $r['id']; ?>').submit();} ">Remove Link <i class='fa fa-trash'></i>
                                       </button>
                                       </form>
                                   </td>
                                   
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>

    </div>


    <?php $unit = $service->getUById($_GET['c_id']); ?>
<div class="card mb-3">
        <div class="card-header">
            <div class="card-title">
                Test Units
            </div>
        </div>

        <div class="card-body p-0">
                    <div class="p-2">
                         <form action="controller/unit/linkUnit.php" method="post">
                             <input type="hidden" name="test_id" value="<?php echo $_GET['c_id']; ?>">
                         
                             <div class="position-relative form-group">
                                <label for="unit_id">Unit</label>
                                <select name="unit_id[]" id="unit_id" class="custom-select" multiple style="width: 100%;">
                                  <option></option>
                                </select>
                              </div>

                              <input type="submit" value="Add" class="btn btn-success">
                          </form>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <th>Units</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php while ($r = $unit->fetch()) {?>
                            
                                <tr>
                                    <td><?php echo $r['unit']; ?></td>
                                    <td>
                                        <form action='controller/unit/detachUnit.php' id="delete_unit_<?php echo $r['id'] ?>" class='float-left ml-2 mr-2' method='post'>

                                        <input type='hidden' name='id' value='<?php echo $r['id'] ?>' >
                                        <input type='hidden' name='test_id' value='<?php echo $_GET['c_id'] ?>' >
                                       
                                       <button class='btn btn-danger' type='submit' 
                                         onclick =  "event.preventDefault();
                                         var r = confirm('are you sure ?');
                                         if (r == true) {
                                         document.getElementById('delete_unit_<?php echo $r['id']; ?>').submit();} ">Remove Link <i class='fa fa-trash'></i>
                                       </button>
                                       </form>
                                   </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>

    </div>
   

     <?php } ?>

<?php } ?>

<?php if ($row['checkup_type'] == 'appearance') { ?>
         <?php if(
          $row['checkup_value'] == 'selection' ||
          $row['checkup_value'] == 'selectionApp'
          ) { ?>
        <?php $sel = $root->getTestSelectionList($_GET['c_id']); ?>

        <div class="card mb-3">
            <div class="card-header">
                <div class="card-title">Appearance Select Values</div>
            </div>

            <div class="card-body p-0">
                <div class="mr-2 ml-2 mb-1">
                    <form action="controller/inv/addSelection.php" method="post">
                        
                        <input type="hidden" name="test_id" value="<?php echo $_GET['c_id']; ?>">
                        <div class="position-relative form-group">
                            <label for="selection_value">Selection Values</label>
                            <input name="selection_value" id="selection_value" type="text" 
                            class="form-control" placeholder="Enter value and press Enter">
                        </div>

                        <input type="submit" value="Add" class="btn btn-success">
                    </form>
                
                </div>
                <table class="table table-striped">
                    <thead>
                        <th>Value</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        <?php while ($values = $sel->fetch()) {?>
                           
                        <tr>
                            <td><?php echo $values['select_value']; ?></td>
                            <td>
                                 <form action='controller/inv/deleteSelection.php' id="delete_selection_<?php echo $values['id'] ?>" class='float-left ml-2 mr-2' method='post'>

                                        <input type='hidden' name='id' value='<?php echo $values['id'] ?>' >
                                       
                                       <input type='hidden' name='test_id' 
                                       value='<?php echo $_GET['c_id']; ?>' >

                                       <button class='btn btn-danger' type='submit' 
                                         onclick =  "event.preventDefault();
                                         var r = confirm('are you sure ?');
                                         if (r == true) {
                                         document.getElementById('delete_selection_<?php echo $values['id']; ?>').submit();} ">Delete<i class='fa fa-trash'></i>
                                       </button>
                                       </form>
                            </td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
     <?php } ?>

     <?php 
        if (
            $row['checkup_value'] == 'number' ||
            $row['checkup_value'] == 'selection' ||
            $row['checkup_value'] == 'text' 
          ) 
        {
     ?>

<?php $ref = $service->getRefById($_GET['c_id']); ?>
<div class="card mb-3">
        <div class="card-header">
            <div class="card-title">
                Appearance References
            </div>
        </div>

        <div class="card-body p-0">
                    <div class="p-2">
                         <form action="controller/reference/linkRef.php" method="post">
                             <input type="hidden" name="test_id" value="<?php echo $_GET['c_id']; ?>">
                         
                             <div class="position-relative form-group">
                                <label for="ref_id">Reference</label>
                                <select name="ref_id[]" id="ref_id" class="custom-select" multiple style="width: 100%;">
                                  <option></option>
                                </select>
                              </div>

                              <input type="submit" value="Add" class="btn btn-success">
                          </form>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <th>Reference</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php while ($r = $ref->fetch()) {?>
                            
                                <tr>
                                    <td><?php echo $r['reference']; ?></td>
                                     <td>
                                        <form action='controller/reference/detachRef.php' id="delete_ref_<?php echo $r['id'] ?>" class='float-left ml-2 mr-2' method='post'>

                                        <input type='hidden' name='id' value='<?php echo $r['id'] ?>' >
                                        <input type='hidden' name='test_id' value='<?php echo $_GET['c_id'] ?>' >
                                       
                                       <button class='btn btn-danger' type='submit' 
                                         onclick =  "event.preventDefault();
                                         var r = confirm('are you sure ?');
                                         if (r == true) {
                                         document.getElementById('delete_ref_<?php echo $r['id']; ?>').submit();} ">Remove Link <i class='fa fa-trash'></i>
                                       </button>
                                       </form>
                                   </td>
                                   
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>

    </div>


<?php $unit = $service->getUById($_GET['c_id']); ?>
<div class="card mb-3">
        <div class="card-header">
            <div class="card-title">
                Test Units
            </div>
        </div>

        <div class="card-body p-0">
                    <div class="p-2">
                         <form action="controller/unit/linkUnit.php" method="post">
                             <input type="hidden" name="test_id" value="<?php echo $_GET['c_id']; ?>">
                         
                             <div class="position-relative form-group">
                                <label for="unit_id">Unit</label>
                                <select name="unit_id[]" id="unit_id" class="custom-select" multiple style="width: 100%;">
                                  <option></option>
                                </select>
                              </div>

                              <input type="submit" value="Add" class="btn btn-success">
                          </form>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <th>Units</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php while ($r = $unit->fetch()) {?>
                            
                                <tr>
                                    <td><?php echo $r['unit']; ?></td>
                                    <td>
                                        <form action='controller/unit/detachUnit.php' id="delete_unit_<?php echo $r['id'] ?>" class='float-left ml-2 mr-2' method='post'>

                                        <input type='hidden' name='id' value='<?php echo $r['id'] ?>' >
                                        <input type='hidden' name='test_id' value='<?php echo $_GET['c_id'] ?>' >
                                       
                                       <button class='btn btn-danger' type='submit' 
                                         onclick =  "event.preventDefault();
                                         var r = confirm('are you sure ?');
                                         if (r == true) {
                                         document.getElementById('delete_unit_<?php echo $r['id']; ?>').submit();} ">Remove Link <i class='fa fa-trash'></i>
                                       </button>
                                       </form>
                                   </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>

    </div>
   

     <?php }  ?>

<?php } ?>



