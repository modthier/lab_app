<?php session_start();
    include '../inc/conn.php';
    include '../vendor/autoload.php'; 
    include '../classes/declare.php';
    
?>
<?php 
$type = $root->getTypeAndValue($_GET['c_id']);

$test_name = $root->getTestName($_GET['c_id']);
?>

<h5 class="text-center"><?php echo  'Investigations: '. $test_name; ?></h5>

 	<form   method='post' action='controller/inv/save.php'>
 	    <input type='hidden' name='service_id' value='<?php echo $_GET['sid']; ?>'>
 	    <input type='hidden' name='request_id' value='<?php echo $_GET['lbr']; ?>'>
 	    <input type='hidden' name='test_id' value='<?php echo $_GET['c_id']; ?>'>
 	    
 	    <?php include '../inc/msg.php'; ?>




<?php switch ($type['checkup_type']) {
	 case 'single': ?>

		<?php switch ($type['checkup_value']) {  
		 case 'text': ?>
		  <div class='form-row'>
					 <div class='col-md-2'>
						<div class='position-relative form-group'>
						  <label><?php echo $test_name; ?></label>
						  <input type='text' name='result' class='form-control' required>
						</div>
					 </div>

					 <div class='col-md-5'>
						<div class='position-relative form-group'>
						  <label>Refrance</label>
						  <select class='custom-select' name='reference_id' required>
						     <?php $st = $root->getRefranceById($_GET['c_id']); ?>
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>'>
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
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>'>
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
						  <label><?php echo $test_name; ?></label>
						  <input type='text' name='result' class='form-control' required>
						</div>
					 </div>

				    </div>
				
			<?php break; ?>

			<?php case 'number': ?>
				<div class='form-row'>
					 <div class='col-md-2'>
						<div class='position-relative form-group'>
						  <label><?php echo $test_name; ?></label>
						  <input type='number' name='result' class='form-control' required>
						</div>
					 </div>

					 <div class='col-md-5'>
						<div class='position-relative form-group'>
						  <label>Refrance</label>
						  <select class='custom-select' name='reference_id' required>
						     <?php $st = $root->getRefranceById($_GET['c_id']); ?>
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>'>
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
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>'>
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
						  <label><?php echo $test_name; ?></label>
						  <input type='number' name='result' class='form-control' required>
						</div>
					 </div>

					 
					
				    </div>
				
			<?php break; ?>

			<?php case 'report': ?>
				<div class='form-row'>
					 <div class='col-md-12'>
						<div class='position-relative form-group'>
						  <label><?php echo $test_name; ?></label>
						  <textarea rows='5' name='result' class='form-control' required></textarea>
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
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>'>
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
						     <?php while($row = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $row["id"]; ?>'>
						     	<?php echo $row['unit'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>
				   </div>
				
				<?php break; ?>

				<?php case 'selectionApp': ?>
				<div class='form-row'>
					<div class='col-md-12'>
						<div class='position-relative form-group'>
						  <label><?php echo $test_name; ?></label>
						  <?php echo $root->getTestSelection($_GET['c_id']); ?>
						</div>
					</div>

				   </div>
				
				<?php break; ?>
		
			
		<?php }// end ?>
		
		<?php break; ?>

	    <?php case "profile": ?>
		 <?php $stmt = $root->getProfileTest($_GET['c_id']); ?> 
		 <?php while ($row = $stmt->fetch()) { ?> 
		 <?php switch ($row['checkup_value']) {  

		  case 'text': ?> 	
			
		 <div class='form-row'>
					 <div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label><?php echo $row['checkup_name']; ?></label>
						  <input type='text' name='result-<?php echo $row['test_id'];?>' class='form-control' required>
						</div>
					 </div>

					 <div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label>Refrance</label>
						  <select class='custom-select' name='reference_id-<?php echo $row['test_id'];?>' required>
						     <?php $st = $root->getRefranceById($row['test_id']); ?>
						     <?php while($r = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $r["id"]; ?>'>
						     	<?php echo $r['reference'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>

					 <div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label>Unit</label>
						  <select class='custom-select' name='unit_id-<?php echo $row['test_id'];?>' required>
						     <?php $st = $root->getUnitById($row['test_id']); ?>
						     <?php while($r = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $r["id"]; ?>'>
						     	<?php echo $r['unit'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>
					</div> 
				
		 <?php break; ?> 


		 <?php case 'textApp': ?> 	
			
		 <div class='form-row'>
					 <div class='col-md-12'>
						<div class='position-relative form-group'>
						  <label><?php echo $row['checkup_name']; ?></label>
						  <input type='text' name='result-<?php echo $row['test_id'];?>' class='form-control' required>
						</div>
					 </div>

				 </div> 
			
		<?php break; ?> 

		<?php case 'number': ?> 	
			
		 <div class='form-row'>
					 <div class='col-md-2'>
						<div class='position-relative form-group'>
						  <label><?php echo $row['checkup_name']; ?></label>
						  <input type='number' name='result-<?php echo $row['test_id'];?>' class='form-control' required>
						</div>
					 </div>

					 <div class='col-md-5'>
						<div class='position-relative form-group'>
						  <label>Refrance</label>
						  <select class='custom-select' name='reference_id-<?php echo $row['test_id'];?>' required>
						     <?php $st = $root->getRefranceById($row['test_id']); ?>
						     <?php while($r = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $r["id"]; ?>'>
						     	<?php echo $r['reference'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>

					 <div class='col-md-5'>
						<div class='position-relative form-group'>
						  <label>Unit</label>
						  <select class='custom-select' name='unit_id-<?php echo $row['test_id'];?>' required>
						     <?php $st = $root->getUnitById($row['test_id']); ?>
						     <?php while($r = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $r["id"]; ?>'>
						     	<?php echo $r['unit'];?></option>
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
						  <label><?php echo $row['checkup_name'] ;?></label>
						  <input type='number' name='result-<?php echo $row['test_id'];?>' class='form-control' required>
						</div>
					 </div>
				  </div> 
				
			
			<?php break; ?>

			<?php case 'report': ?>
			  <div class='form-row'>
					 <div class='col-md-12'>
						<div class='position-relative form-group'>
						  <label><?php echo $row['checkup_name'] ;?></label>
						  <textarea rows='5' name='result-<?php echo $row['test_id']; ?>' class='form-control' required></textarea>
						</div>
					</div>
				   </div> 
				
			<?php break; ?> 

			<?php case 'selection': ?> 
				<div class='form-row'>
					<div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label><?php echo $row['checkup_name'] ;?></label>
						  <?php echo $root->getTestSelection($row['test_id'],'profile'); ?>
						</div>
					</div>

					<div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label>Refrance</label>
						  <select class='custom-select' name='reference_id-<?php echo $row['test_id'];?>' required>
						     <?php $st = $root->getRefranceById($row['test_id']); ?>
						     <?php while($r = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $r["id"]; ?>'>
						     	<?php echo $r['reference'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>

					 <div class='col-md-4'>
						<div class='position-relative form-group'>
						  <label>Unit</label>
						  <select class='custom-select' name='unit_id-<?php echo $row['test_id'];?>' required>
						     <?php $st = $root->getUnitById($row['test_id']); ?>
						     <?php while($r = $st->fetch()){ ?>
						     	
						     	<option value='<?php echo $r["id"]; ?>'>
						     	<?php echo $r['unit'];?></option>
						     <?php } ?>

						  </select>
						</div>
					 </div>
					</div>
				

				<?php break; ?> 

			  <?php case 'selectionApp': ?> 
				<div class='form-row'>
					<div class='col-md-12'>
						<div class='position-relative form-group'>
						  <label><?php echo $row['checkup_name']; ?></label>
				<?php echo $root->getTestSelection($row['test_id'],'profile'); ?>
						</div>
					</div>
				  </div>
				
				<?php break; ?> 
		
			
		   <?php  }  } ?> 
		   
	
	
<?php } ?>

        <div class='input-group input-group-lg'>
              <input type='submit' value='Save' class='btn btn-lg btn-primary'>
        </div>

	
  </form>
 

