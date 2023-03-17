<?php $type = $root->getTypeAndValue($_GET['c_id']); ?>
<?php $test_name = $root->getTestName($_GET['c_id']); ?> 
<div class='app-page-title'>
    <div class='page-title-wrapper'>
        <div class='page-title-heading'>
            <div class='page-title-icon'>
             <i class='fa fa-globe'>
             </i>
            </div>
            <div><?php echo  'Update: '. $test_name; ?></div>
        </div>
    </div>
</div>   
 <div class='main-card mb-3 card'>
 	<form   method='post' action='controller/inv/update.php'>
 	    <input type='hidden' name='service_id' value='<?php echo $_GET['sid']; ?>'>
 	    <input type='hidden' name='request_id' value='<?php echo $_GET['lbr']; ?>'>
 	    <input type='hidden' name='test_id' value='<?php echo $_GET['c_id']; ?>'>
 	    <div class='card-body'>
 	    <?php include 'inc/msg.php'; ?>


<?php switch ($type['checkup_type']) {
	case "single": ?>
		 <?php 
		     $stmt = $root->getTestResult($_GET['c_id'],$_GET['lbr'],$_GET['sid']); 
			 $r = $stmt->fetch(); 

		  ?>
		<?php switch ($type['checkup_value']) {

			case 'text': ?>
			   
				<div class='form-row'>
					 <div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label><?php echo  $r['checkup_name'] ;?></label>
						  <input type='text' name='result' class='form-control'
						     value='<?php echo $r['result'] ;?>'  required>
						</div>
					 </div>

					 <div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label>Refrance</label>
						  <select class='custom-select' name='reference_id' required>
						     <?php $st = $root->getRefranceById($_GET['c_id']); ?>
						     <option></option>
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>' <?php 
						     	if($r['reference_id'] == $row['id']) {echo 'selected';} ?> >
						     	<?php echo $row['reference'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>

					 <div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label>Unit</label>
						  <select class='custom-select' name='unit_id' required>
						     <?php $st = $root->getUnitById($_GET['c_id']); ?>
						     <option></option>
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>' <?php 
						     	 if($r['unit_id'] == $row['id']) {echo 'selected';} ?>>
						     	<?php echo $row['unit'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>
				</div>
				
			<?php break; ?>

			<?php case 'textApp': ?>
				<div class='form-row'>
				 <div class='col-md-6'>
					<div class='position-relative form-group'>
					  <label><?php echo  $r['checkup_name'] ;?></label>
					  <input type='text' name='result' class='form-control' value="<?php echo  $r['result'] ;?>" required>
					</div>
				 </div>
				</div>
				
			<?php break; ?>

			<?php case 'number': ?>
			   
				<div class='form-row'>
					 <div class='col-md-2'>
						<div class='position-relative form-group'>
						  <label><?php echo  $r['checkup_name'] ;?></label>
						  <input type='number' step="0.1" name='result' class='form-control'
						     value='<?php echo $r['result'] ;?>'  required>
						</div>
					 </div>

					 <div class='col-md-5'>
						<div class='position-relative form-group'>
						  <label>Refrance</label>
						  <select class='custom-select' name='reference_id' required>
						     <?php $st = $root->getRefranceById($_GET['c_id']); ?>
						     <option></option>
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>' <?php 
						     	if($r['reference_id'] == $row['id']) {echo 'selected';} ?> >
						     	<?php echo $row['reference'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>

					 <div class='col-md-5'>
						<div class='position-relative form-group'>
						  <label>Unit</label>
						  <select class='custom-select' name='unit_id' required>
						     <?php $st = $root->getUnitById($_GET['c_id']); ?>
						     <option></option>
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>' <?php 
						     	 if($r['unit_id'] == $row['id']) {echo 'selected';} ?>>
						     	<?php echo $row['unit'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>
				    </div>
				
			<?php break; ?>

			<?php case 'numberApp': ?>
				<div class='form-row'>
					 <div class='col-md-12'>
						<div class='position-relative form-group'>
						  <label><?php echo  $r['checkup_name'] ;?></label>
						  <input type='number' step="0.1" name='result' class='form-control' value="<?php echo $r['result'] ;?>" required>
						</div>
					 </div>

					 
					
				    </div>
				
			<?php break; ?>

			<?php case 'report': ?>
				<div class='form-row'>
					 <div class='col-md-12'>
						<div class='position-relative form-group'>
						  <label><?php echo $test_name; ?></label>
						  <textarea rows='5' name='result' class='form-control' required><?php echo str_replace('<br />', '', $r['result']) ;?></textarea>
						</div>
					</div>
				   </div>
				
			<?php break; ?>

			<?php case 'selection': ?>
				<div class='form-row'>
					<div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label><?php echo $test_name; ?></label>
						  <?php echo $root->getTestSelection($_GET['c_id']); ?>
						</div>
					</div>

					<div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label>Refrance</label>
						  <select class='custom-select' name='reference_id' required>
						     <?php $st = $root->getRefranceById($_GET['c_id']); ?>
						     <option></option>
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>' <?php 
						     	if($r['reference_id'] == $row['id']) {echo 'selected';} ?> >
						     	<?php echo $row['reference'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>

					 <div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label>Unit</label>
						  <select class='custom-select' name='unit_id' required>
						     <?php $st = $root->getUnitById($_GET['c_id']); ?>
						     <option></option>
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>' <?php 
						     	 if($r['unit_id'] == $row['id']) {echo 'selected';} ?>>
						     	<?php echo $row['unit'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>
				    </div>
				
			<?php break; ?>

			<?php case 'selectionApp': ?>
				<div class='form-row'>
					<div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label><?php echo $test_name; ?></label>
						  <?php echo $root->getTestSelectionUpdate($_GET['c_id'],$r['result'],''); ?>
						</div>
					</div>

			    </div>
				
			<?php break; ?>
		
			
		<?php }// end ?>
		
		<?php break; // break for single ?>

	<?php case "profile": ?>
		 <?php $stmt = $root->getTestResults($_GET['lbr'],$_GET['sid'],$_GET['c_id']); ?> 

		 <?php while ($r = $stmt->fetch()) { ?> 
		 <?php switch ($r['checkup_value']) { 

		  case 'text': ?> 
				<div class='form-row'>
					 <div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label><?php echo $r['checkup_name'] ; ?></label>
						  <input type='text' name='result-<?php echo $r['test_id']; ?>' class='form-control' 
						   value='<?php echo $r['result'] ;?>' required>
						</div>
					 </div>

					 <div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label>Refrance</label>
						  <select class='custom-select' name='reference_id-<?php echo $r['test_id']; ?>' required>
						     <?php $st = $root->getRefranceById($r['test_id']); ?>
						     <option></option>
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>' <?php 
						     	 if($r['reference_id'] == $row['id']) {echo 'selected';} ?>>
						     	<?php echo $row['reference'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>

					 <div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label>Unit</label>
						  <select class='custom-select' name='unit_id-<?php echo $r['test_id']; ?>' required>
						     <?php $st = $root->getUnitById($r['test_id']); ?>
						     <option></option>
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>' <?php 
						     	 if($r['unit_id'] == $row['id']) {echo 'selected';} ?>>
						     	<?php echo $row['unit'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>
					</div> 
				
			<?php break; ?> 

			<?php case 'textApp': ?>
				<div class='form-row'>
				  <div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label><?php echo $r['checkup_name'] ; ?></label>
						  <input type='text' name='result-<?php echo $r['test_id']; ?>' class='form-control' 
						   value='<?php echo $r['result'] ;?>' required>
						</div>
					 </div>

				</div>
				
			<?php break; ?>


		  <?php case 'number': ?> 
				<div class='form-row'>
					 <div class='col-md-2'>
						<div class='position-relative form-group'>
						  <label><?php echo $r['checkup_name'] ; ?></label>
						  <input type='number' step="0.1" name='result-<?php echo $r['test_id']; ?>' class='form-control' value='<?php echo $r['result'] ;?>' required>
						</div>
					 </div>

					 <div class='col-md-5'>
						<div class='position-relative form-group'>
						  <label>Refrance</label>
						  <select class='custom-select' name='reference_id-<?php echo $r['test_id']; ?>' required>
						     <?php $st = $root->getRefranceById($r['test_id']); ?>
						     <option></option>
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>' <?php 
						     	 if($r['reference_id'] == $row['id']) {echo 'selected';} ?>>
						     	<?php echo $row['reference'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>

					 <div class='col-md-5'>
						<div class='position-relative form-group'>
						  <label>Unit</label>
						  <select class='custom-select' name='unit_id-<?php echo $r['test_id']; ?>' required>
						     <?php $st = $root->getUnitById($r['test_id']); ?>
						     <option></option>
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>' <?php 
						     	 if($r['unit_id'] == $row['id']) {echo 'selected';} ?>>
						     	<?php echo $row['unit'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>
					</div> 
				
			<?php break; ?> 

			<?php case 'numberApp': ?> 
				<div class='form-row'>
					 <div class='col-md-12'>
						<div class='position-relative form-group'>
						  <label><?php echo $r['checkup_name'] ; ?></label>
						  <input type='number' step="0.1" name='result-<?php echo $r['test_id']; ?>' class='form-control' value='<?php echo $r['result'] ;?>' required>
						</div>
					 </div>

					</div> 
				
			<?php break; ?> 

			<?php case 'report': ?>
				<div class='form-row'>
					 <div class='col-md-12'>
						<div class='position-relative form-group'>
						  <label><?php echo $row['checkup_name']; ?></label>
						  <textarea rows='5' name='result-<?php echo $r['test_id']; ?>' class='form-control' required><?php echo str_replace('<br />', '', $r['result']) ;?></textarea>
						</div>
					</div>
				   </div> 
				
			<?php break; ?> 

			<?php case 'selection': ?> 
				<div class='form-row'>
					<div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label><?php echo $r['checkup_name']; ?></label>
						  <?php echo $root->getTestSelectionUpdate($r['test_id'],
						   $r['result'],'profile'); ?>
						</div>
					</div>

					<div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label>Refrance</label>
						  <select class='custom-select' name='reference_id-<?php echo $r['test_id']; ?>' required>
						     <?php $st = $root->getRefranceById($r['test_id']); ?>
						     <option></option>
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>' <?php 
						     	 if($r['reference_id'] == $row['id']) {echo 'selected';} ?>>
						     	<?php echo $row['reference'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>

					 <div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label>Unit</label>
						  <select class='custom-select' name='unit_id-<?php echo $r['test_id']; ?>' required>
						     <?php $st = $root->getUnitById($r['test_id']); ?>
						     <option></option>
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>' <?php 
						     	 if($r['unit_id'] == $row['id']) {echo 'selected';} ?>>
						     	<?php echo $row['unit'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>
					</div> 
				
			<?php  break; ?> 

			<?php case 'selectionApp': ?> 
				<div class='form-row'>
					<div class='col-md-12'>
						<div class='position-relative form-group'>
						  <label><?php echo $r['checkup_name']; ?></label>
						  <?php echo $root->getTestSelectionUpdate($r['test_id'],
						   $r['result'],'profile'); ?>
						</div>
					</div>
				  </div> 
					
				
			<?php  break; ?> 
		
			
		    <?php  }// end ?> 
		  <?php  }// end ?> 
		

		
	
	
<?php } ?>

</div> 
	<div class='card-footer'>
		<div class='input-group input-group-lg'>
              <input type='submit' value='Update' class='btn btn-lg btn-success'>
        </div>
 	    	
 	</div>
  </form>
 </div>
