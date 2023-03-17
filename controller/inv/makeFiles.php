<?php 

$ourFileName =$filename;
$path = $_SERVER['DOCUMENT_ROOT']."lab/views/form/";
$ourFileHandle = fopen($path.$ourFileName, 'w');

$written = "";
$written .= "<?php \$test_name = \$root->getTestName(\$_GET['c_id']); ?> \n";
$written .= "<div class='app-page-title'>
    <div class='page-title-wrapper'>
        <div class='page-title-heading'>
            <div class='page-title-icon'>
             <i class='fa fa-globe'>
             </i>
            </div>
            <div><?php echo  'Investigations: '. \$test_name; ?></div>
        </div>
    </div>
</div> \n  ";
$written .= " <div class='main-card mb-3 card'>\n
 	<form   method='post' action='controller/inv/save.php'>\n
 	    <input type='hidden' name='service_id' value='<?php echo \$_GET['sid']; ?>'>\n
 	    <input type='hidden' name='request_id' value='<?php echo \$_GET['lbr']; ?>'>\n
 	    <input type='hidden' name='test_id' value='<?php echo \$_GET['c_id']; ?>'>\n
 	    <div class='card-body'>\n
 	    <?php include 'inc/msg.php'; ?>
";



switch ($_POST['checkup_type']) {
	case "single":

		switch ($_POST['checkup_value']) {
			case 'text':
				$written .= "<div class='form-row'>\n
					 <div class='col-md-2'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$test_name; ?></label>\n
						  <input type='text' name='result' class='form-control' required>\n
						</div>\n
					 </div>\n

					 <div class='col-md-5'>\n
						<div class='position-relative form-group'>\n
						  <label>Refrance</label>\n
						  <select class='custom-select' name='reference_id' required>\n
						     <?php \$st = \$root->getRefranceById(\$_GET['c_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>'>
						     	<?php echo \$row['reference'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n

					 <div class='col-md-5'>\n
						<div class='position-relative form-group'>\n
						  <label>Unit</label>\n
						  <select class='custom-select' name='unit_id' required>\n
						     <?php \$st = \$root->getUnitById(\$_GET['c_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>'>
						     	<?php echo \$row['unit'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n
				    </div>\n
				";
				break;


			case 'textApp':
				$written .= "<div class='form-row'>\n
					 <div class='col-md-6'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$test_name; ?></label>\n
						  <input type='text' name='result' class='form-control' required>\n
						</div>\n
					 </div>\n

				    </div>\n
				";
				break;

			case 'number':
				$written .= "<div class='form-row'>\n
					 <div class='col-md-2'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$test_name; ?></label>\n
						  <input type='number' name='result' class='form-control' required>\n
						</div>\n
					 </div>\n

					 <div class='col-md-5'>\n
						<div class='position-relative form-group'>\n
						  <label>Refrance</label>\n
						  <select class='custom-select' name='reference_id' required>\n
						     <?php \$st = \$root->getRefranceById(\$_GET['c_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>'>
						     	<?php echo \$row['reference'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n

					 <div class='col-md-5'>\n
						<div class='position-relative form-group'>\n
						  <label>Unit</label>\n
						  <select class='custom-select' name='unit_id' required>\n
						     <?php \$st = \$root->getUnitById(\$_GET['c_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>'>
						     	<?php echo \$row['unit'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n
				    </div>\n
				";
				break;

			case 'report':
				$written .= "<div class='form-row'>\n
					 <div class='col-md-12'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$test_name; ?></label>\n
						  <textarea rows='5' name='result' class='form-control' required></textarea>\n
						</div>\n
					</div>\n
				   </div>\n
				";
				break;

			case 'selection':
				$written .= "<div class='form-row'>\n
					<div class='col-md-4'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$test_name; ?></label>\n
						  <?php echo \$root->getTestSelection(\$_GET['c_id']); ?>\n
						</div>\n
					</div>\n

					<div class='col-md-4'>\n
						<div class='position-relative form-group'>\n
						  <label>Refrance</label>\n
						  <select class='custom-select' name='reference_id' required>\n
						     <?php \$st = \$root->getRefranceById(\$_GET['c_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>'>
						     	<?php echo \$row['reference'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n

					 <div class='col-md-4'>\n
						<div class='position-relative form-group'>\n
						  <label>Unit</label>\n
						  <select class='custom-select' name='unit_id' required>\n
						     <?php \$st = \$root->getUnitById(\$_GET['c_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>'>
						     	<?php echo \$row['unit'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n
				   </div>\n
				";
				break;
		
			default:
				
				break;
		}// end
		
		break;

	case "profile":
		 $written .= "<?php \$stmt = \$root->getProfileTest(\$_GET['c_id']); ?> \n";
		 $written .= "<?php while (\$row = \$stmt->fetch()) { ?> \n";
		 $written .= "<?php switch (\$row['checkup_value']) {  \n";

		 $written .= " case 'text': ?> \n";	
			
		 $written .= "<div class='form-row'>\n
					 <div class='col-md-4'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$row['checkup_name']; ?></label>\n
						  <input type='text' name='result-<?php echo \$row['test_id'];?>' class='form-control' required>\n
						</div>\n
					 </div>\n

					 <div class='col-md-4'>\n
						<div class='position-relative form-group'>\n
						  <label>Refrance</label>\n
						  <select class='custom-select' name='reference_id-<?php echo \$row['test_id'];?>' required>\n
						     <?php \$st = \$root->getRefranceById(\$row['test_id']); ?>\n
						     <option></option>\n
						     <?php while(\$r = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$r[\"id\"]; ?>'>
						     	<?php echo \$r['reference'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n

					 <div class='col-md-4'>\n
						<div class='position-relative form-group'>\n
						  <label>Unit</label>\n
						  <select class='custom-select' name='unit_id-<?php echo \$row['test_id'];?>' required>\n
						     <?php \$st = \$root->getUnitById(\$row['test_id']); ?>\n
						     <option></option>\n
						     <?php while(\$r = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$r[\"id\"]; ?>'>
						     	<?php echo \$r['unit'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n
					</div> \n
				";
		 $written .= "<?php break; ?> \n";


		 $written .= "<?php case 'textApp': ?> \n";	
			
		 $written .= "<div class='form-row'>\n
					 <div class='col-md-12'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$row['checkup_name']; ?></label>\n
						  <input type='text' name='result-<?php echo \$row['test_id'];?>' class='form-control' required>\n
						</div>\n
					 </div>\n

				 </div> \n
				";
		 $written .= "<?php break; ?> \n";

		 $written .= "<?php case 'number': ?> \n";	
			
		 $written .= "<div class='form-row'>\n
					 <div class='col-md-2'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$row['checkup_name']; ?></label>\n
						  <input type='number' name='result-<?php echo \$row['test_id'];?>' class='form-control' required>\n
						</div>\n
					 </div>\n

					 <div class='col-md-5'>\n
						<div class='position-relative form-group'>\n
						  <label>Refrance</label>\n
						  <select class='custom-select' name='reference_id-<?php echo \$row['test_id'];?>' required>\n
						     <?php \$st = \$root->getRefranceById(\$row['test_id']); ?>\n
						     <option></option>\n
						     <?php while(\$r = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$r[\"id\"]; ?>'>
						     	<?php echo \$r['reference'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n

					 <div class='col-md-5'>\n
						<div class='position-relative form-group'>\n
						  <label>Unit</label>\n
						  <select class='custom-select' name='unit_id-<?php echo \$row['test_id'];?>' required>\n
						     <?php \$st = \$root->getUnitById(\$row['test_id']); ?>\n
						     <option></option>\n
						     <?php while(\$r = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$r[\"id\"]; ?>'>
						     	<?php echo \$r['unit'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n
			</div> \n
				";
			$written .= "<?php break; ?> \n";
			$written .= "<?php case 'numberApp': ?> \n";
			
				$written .= "<div class='form-row'>\n
					 <div class='col-md-12'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$row['checkup_name'] ;?></label>\n
						  <input type='number' name='result-<?php echo \$row['test_id'];?>' class='form-control' required>\n
						</div>\n
					 </div>\n
				  </div> \n
				";
			
			$written .= "<?php break; ?> \n";

			$written .= "<?php case 'report': ?> \n";
				$written .= "<div class='form-row'>\n
					 <div class='col-md-12'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$row['checkup_name'] ;?></label>\n
						  <textarea rows='5' name='result-<?php echo \$row['test_id']; ?>' class='form-control' required></textarea>\n
						</div>\n
					</div>\n
				   </div> \n
				";

			$written .= "<?php break; ?> \n";

			$written .= "<?php case 'selection': ?> \n";
				$written .= "<div class='form-row'>\n
					<div class='col-md-4'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$row['checkup_name'] ;?></label>\n
						  <?php echo \$root->getTestSelection(\$row['test_id'],'profile'); ?>\n
						</div>\n
					</div>\n

					<div class='col-md-4'>\n
						<div class='position-relative form-group'>\n
						  <label>Refrance</label>\n
						  <select class='custom-select' name='reference_id-<?php echo \$row['test_id'];?>' required>\n
						     <?php \$st = \$root->getRefranceById(\$row['test_id']); ?>\n
						     <option></option>\n
						     <?php while(\$r = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$r[\"id\"]; ?>'>
						     	<?php echo \$r['reference'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n

					 <div class='col-md-4'>\n
						<div class='position-relative form-group'>\n
						  <label>Unit</label>\n
						  <select class='custom-select' name='unit_id-<?php echo \$row['test_id'];?>' required>\n
						     <?php \$st = \$root->getUnitById(\$row['test_id']); ?>\n
						     <option></option>\n
						     <?php while(\$r = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$r[\"id\"]; ?>'>
						     	<?php echo \$r['unit'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n
					</div>
				";

			$written .= "<?php break; ?> \n";

			$written .= "<?php case 'selectionApp': ?> \n";
				$written .= "<div class='form-row'>\n
					<div class='col-md-12'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$row['checkup_name']; ?></label>\n
				<?php echo \$root->getTestSelection( \$row['test_id'],'profile'); ?>\n
						</div>\n
					</div>\n
				  </div>
				";
			$written .= "<?php break; ?> \n";
		
			
		   $written .= "<?php  }  } ?> \n";
		   
	
	
}

$written .= "</div> \n
	<div class='card-footer'>\n
		<div class='input-group input-group-lg'>\n
              <input type='submit' value='Save' class='btn btn-lg btn-primary'>\n
        </div>\n
 	    	
 	</div>\n
  </form>\n
 </div>\n
";
fwrite($ourFileHandle,$written);

fclose($ourFileHandle);


$fileName =$filenameUpdate;
$path = $_SERVER['DOCUMENT_ROOT']."lab/views/update/";
$handle = fopen($path.$fileName, 'w');

$write = "";
$write .= "<?php \$test_name = \$root->getTestName(\$_GET['c_id']); ?> \n";
$write .= "<div class='app-page-title'>
    <div class='page-title-wrapper'>
        <div class='page-title-heading'>
            <div class='page-title-icon'>
             <i class='fa fa-globe'>
             </i>
            </div>
            <div><?php echo  'Update: '. \$test_name; ?></div>
        </div>
    </div>
</div> \n  ";
$write .= " <div class='main-card mb-3 card'>\n
 	<form   method='post' action='controller/inv/update.php'>\n
 	    <input type='hidden' name='service_id' value='<?php echo \$_GET['sid']; ?>'>\n
 	    <input type='hidden' name='request_id' value='<?php echo \$_GET['lbr']; ?>'>\n
 	    <input type='hidden' name='test_id' value='<?php echo \$_GET['c_id']; ?>'>\n
 	    <div class='card-body'>\n
 	    <?php include 'inc/msg.php'; ?>
";

switch ($_POST['checkup_type']) {
	case "single":
		 $write .= "<?php \$stmt = \$root->getTestResult(\$_GET['c_id'],\$_GET['lbr'],\$_GET['sid']); \n
			        \$r = \$stmt->fetch(); ?>";
		switch ($_POST['checkup_value']) {

			case 'text':
			   
				$write .= "<div class='form-row'>\n
					 <div class='col-md-4'>
						<div class='position-relative form-group'>\n
						  <label><?php echo  \$r['checkup_name'] ;?></label>\n
						  <input type='text' name='result' class='form-control'
						     value='<?php echo \$r['result'] ;?>'  required>\n
						</div>\n
					 </div>\n

					 <div class='col-md-4'>\n
						<div class='position-relative form-group'>\n
						  <label>Refrance</label>\n
						  <select class='custom-select' name='reference_id' required>\n
						     <?php \$st = \$root->getRefranceById(\$_GET['c_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>' <?php 
						     	if(\$r['reference_id'] == \$row['id']) {echo 'selected';} ?> >
						     	<?php echo \$row['reference'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n

					 <div class='col-md-4'>\n
						<div class='position-relative form-group'>\n
						  <label>Unit</label>\n
						  <select class='custom-select' name='unit_id' required>\n
						     <?php \$st = \$root->getUnitById(\$_GET['c_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>' <?php 
						     	 if(\$r['unit_id'] == \$row['id']) {echo 'selected';} ?>>
						     	<?php echo \$row['unit'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n
				    </div>\n
				";
				break;

			case 'number':
			   
				$write .= "<div class='form-row'>\n
					 <div class='col-md-2'>
						<div class='position-relative form-group'>\n
						  <label><?php echo  \$r['checkup_name'] ;?></label>\n
						  <input type='number' name='result' class='form-control'
						     value='<?php echo \$r['result'] ;?>'  required>\n
						</div>\n
					 </div>\n

					 <div class='col-md-5'>\n
						<div class='position-relative form-group'>\n
						  <label>Refrance</label>\n
						  <select class='custom-select' name='reference_id' required>\n
						     <?php \$st = \$root->getRefranceById(\$_GET['c_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>' <?php 
						     	if(\$r['reference_id'] == \$row['id']) {echo 'selected';} ?> >
						     	<?php echo \$row['reference'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n

					 <div class='col-md-5'>\n
						<div class='position-relative form-group'>\n
						  <label>Unit</label>\n
						  <select class='custom-select' name='unit_id' required>\n
						     <?php \$st = \$root->getUnitById(\$_GET['c_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>' <?php 
						     	 if(\$r['unit_id'] == \$row['id']) {echo 'selected';} ?>>
						     	<?php echo \$row['unit'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n
				    </div>\n
				";
				break;

			case 'report':
				$write .= "<div class='form-row'>\n
					 <div class='col-md-12'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$test_name; ?></label>\n
						  <textarea rows='5' name='result' class='form-control' required><?php echo str_replace('<br />', '', \$r['result']) ;?></textarea>\n
						</div>\n
					</div>\n
				   </div>\n
				";
				break;

			case 'selection':
				$write .= "<div class='form-row'>\n
					<div class='col-md-4'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$test_name; ?></label>\n
						  <?php echo \$root->getTestSelection(\$_GET['c_id']); ?>\n
						</div>\n
					</div>\n

					<div class='col-md-4'>\n
						<div class='position-relative form-group'>\n
						  <label>Refrance</label>\n
						  <select class='custom-select' name='reference_id' required>\n
						     <?php \$st = \$root->getRefranceById(\$_GET['c_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>' <?php 
						     	if(\$r['reference_id'] == \$row['id']) {echo 'selected';} ?> >
						     	<?php echo \$row['reference'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n

					 <div class='col-md-4'>\n
						<div class='position-relative form-group'>\n
						  <label>Unit</label>\n
						  <select class='custom-select' name='unit_id' required>\n
						     <?php \$st = \$root->getUnitById(\$_GET['c_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>' <?php 
						     	 if(\$r['unit_id'] == \$row['id']) {echo 'selected';} ?>>
						     	<?php echo \$row['unit'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n
				    </div>\n
				";
				break;
		
			default:
				
				break;
		}// end
		
		break; // break for single

	case "profile":
		 $write .= "<?php \$stmt = \$root->getTestResults(\$_GET['lbr'],\$_GET['sid'],\$_GET['c_id']); ?> \n";

		 $write .= "<?php while (\$r = \$stmt->fetch()) { ?> \n";
		 $write .= "<?php switch (\$r['checkup_value']) { \n";

		 $write .= " case 'text': ?> \n";
				$write .= "<div class='form-row'>\n
					 <div class='col-md-4'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$r['checkup_name'] ; ?></label>\n
						  <input type='text' name='result-<?php echo \$r['test_id']; ?>' class='form-control' value='<?php echo \$r['result'] ;?>' required>\n
						</div>\n
					 </div>\n

					 <div class='col-md-4'>\n
						<div class='position-relative form-group'>\n
						  <label>Refrance</label>\n
						  <select class='custom-select' name='reference_id-<?php echo \$r['test_id']; ?>' required>\n
						     <?php \$st = \$root->getRefranceById(\$r['test_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>' <?php 
						     	 if(\$r['reference_id'] == \$row['id']) {echo 'selected';} ?>>
						     	<?php echo \$row['reference'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n

					 <div class='col-md-4'>\n
						<div class='position-relative form-group'>\n
						  <label>Unit</label>\n
						  <select class='custom-select' name='unit_id-<?php echo \$r['test_id']; ?>' required>\n
						     <?php \$st = \$root->getUnitById(\$r['test_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>' <?php 
						     	 if(\$r['unit_id'] == \$row['id']) {echo 'selected';} ?>>
						     	<?php echo \$row['unit'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n
					</div> \n
				";
			$write .= "<?php break; ?> \n";


		 $write .= " case 'number': ?> \n";
				$write .= "<div class='form-row'>\n
					 <div class='col-md-2'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$r['checkup_name'] ; ?></label>\n
						  <input type='number' name='result-<?php echo \$r['test_id']; ?>' class='form-control' value='<?php echo \$r['result'] ;?>' required>\n
						</div>\n
					 </div>\n

					 <div class='col-md-5'>\n
						<div class='position-relative form-group'>\n
						  <label>Refrance</label>\n
						  <select class='custom-select' name='reference_id-<?php echo \$r['test_id']; ?>' required>\n
						     <?php \$st = \$root->getRefranceById(\$r['test_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>' <?php 
						     	 if(\$r['reference_id'] == \$row['id']) {echo 'selected';} ?>>
						     	<?php echo \$row['reference'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n

					 <div class='col-md-5'>\n
						<div class='position-relative form-group'>\n
						  <label>Unit</label>\n
						  <select class='custom-select' name='unit_id-<?php echo \$r['test_id']; ?>' required>\n
						     <?php \$st = \$root->getUnitById(\$r['test_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>' <?php 
						     	 if(\$r['unit_id'] == \$row['id']) {echo 'selected';} ?>>
						     	<?php echo \$row['unit'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n
					</div> \n
				";
			$write .= "<?php break; ?> \n";

			$write .= "<?php case 'numberApp': ?> \n";
				$write .= "<div class='form-row'>\n
					 <div class='col-md-12'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$r['checkup_name'] ; ?></label>\n
						  <input type='number' name='result-<?php echo \$r['test_id']; ?>' class='form-control' value='<?php echo \$r['result'] ;?>' required>\n
						</div>\n
					 </div>\n

					</div> \n
				";
			$write .= "<?php break; ?> \n";

			$write .= "<?php case 'report': ?>";
				$write .= "<div class='form-row'>\n
					 <div class='col-md-12'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$row['checkup_name']; ?></label>\n
						  <textarea rows='5' name='result-<?php echo \$r['test_id']; ?>' class='form-control' required><?php echo str_replace('<br />', '', \$r['result']) ;?></textarea>\n
						</div>\n
					</div>\n
				   </div> \n
				";
			$write .= "<?php break; ?> \n";

			$write .= "<?php case 'selection': ?> \n";
				$write .= "<div class='form-row'>\n
					<div class='col-md-4'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$r['checkup_name']; ?></label>\n
						  <?php echo \$root->getTestSelectionUpdate(\$r['test_id'],
						   \$r['result'],'profile'); ?>\n
						</div>\n
					</div>\n

					<div class='col-md-4'>\n
						<div class='position-relative form-group'>\n
						  <label>Refrance</label>\n
						  <select class='custom-select' name='reference_id-<?php echo \$r['test_id']; ?>' required>\n
						     <?php \$st = \$root->getRefranceById(\$r['test_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>' <?php 
						     	 if(\$r['reference_id'] == \$row['id']) {echo 'selected';} ?>>
						     	<?php echo \$row['reference'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n

					 <div class='col-md-4'>\n
						<div class='position-relative form-group'>\n
						  <label>Unit</label>\n
						  <select class='custom-select' name='unit_id-<?php echo \$r['test_id']; ?>' required>\n
						     <?php \$st = \$root->getUnitById(\$r['test_id']); ?>\n
						     <option></option>\n
						     <?php while(\$row = \$st->fetch()){ ?>\n
						     	
						     	<option value='<?php echo \$row[\"id\"]; ?>' <?php 
						     	 if(\$r['unit_id'] == \$row['id']) {echo 'selected';} ?>>
						     	<?php echo \$row['unit'];?></option>\n
						     <?php } ?>\n

						  </select>\n
						</div>\n
					 </div>\n
					</div> \n
				";
			$write .= "<?php  break; ?> \n";

			$write .= "<?php case 'selectionApp': ?> \n";
				$write .= "<div class='form-row'>\n
					<div class='col-md-12'>
						<div class='position-relative form-group'>\n
						  <label><?php echo \$r['checkup_name']; ?></label>\n
						  <?php echo \$root->getTestSelectionUpdate(\$r['test_id'],
						   \$r['result'],'profile'); ?>\n
						</div>\n
					</div>\n
				  </div> \n
					
				";
			$write .= "<?php  break; ?> \n";
		
			
		    $write .= "<?php  }// end ?> \n";
		  $write .= "<?php  }// end ?> \n";
		

		
	
	
}


$write .= "</div> \n
	<div class='card-footer'>\n
		<div class='input-group input-group-lg'>\n
              <input type='submit' value='Update' class='btn btn-lg btn-success'>\n
        </div>\n
 	    	
 	</div>\n
  </form>\n
 </div>\n
";

fwrite($handle,$write);
fclose($handle);

 ?>