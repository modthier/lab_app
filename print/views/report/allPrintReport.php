<?php 
	$patient = $root->getPatientByServiceId($_GET['sid']);
	$info = $patient->fetch();

	$setting = $root->display('setting');
	$r = $setting->fetch();

	$ser = $root->findById('service_request','id',$_GET['sid']);
	$s = $ser->fetch();

	$all = $service->printAllTests($_GET['sid']);
	$count = $all->rowCount();

	
 ?>
<div class="container-fluid" style="border: 2px solid black;">
	<div class="content-block">
	<div class="">
		<img src="../dist/img/heading.png" style="width: 100%;" alt="">
	</div>
	
	<table class="table table-bordered table-striped">
		<tr>
			<td>Name : <?php echo $info['patient_name']; ?> </td>
			<td>Age : <?php echo $root->getAge($info['birthdate']); ?></td>
			
		</tr>

		<tr>
			<td>Gender : <?php echo $info['gender']; ?> </td>
			<td>Referred From/By : <?php echo $s['referral']; ?></td>
		</tr>
	</table>
</div>

<?php if($count > 0){ ?>

<?php while ($p = $all->fetch()) {?>

<?php if ($p['checkup_type'] == 'single') {?>
	
	
    <?php 
     $results = $root->getTestResult($p['checkupid'],$p['id'],$p['serviceid']);
    ?>

	<?php if ($p['checkup_value'] == 'report') {?>
		<p style="page-break-after: always;"></p>
		<h4 class="text-center mt-1">
		   <?php echo $root->getTestName($p['checkupid']); ?>
	    </h4>
		<?php $report = $results->fetch(); ?>
		
		<p>
			<?php echo $report['result']; ?>
		</p>
		<p style="page-break-after: always;"></p>
	<?php }else { ?>

	<h4 class="text-center mt-1">
		<?php echo $root->getTestName($p['checkupid']); ?>
	</h4>
	<table class="table table-striped table-bordered">
		<thead class="bg-gray">
			<th>Test Name</th>
			<th>Result</th>
			<th>Unit</th>
			<th>Reference</th>
			
		</thead>
			<tbody>
				

				<?php while ($single = $results->fetch()) {?>
			
				<tr>
					<td><?php echo $root->getTestName($single['test_id']); ?></td>
					<td><?php echo $single['result']; ?></td>
					<td>
						<?php if(
							$root->getValue($single['test_id']) == 'number' || 
							$root->getValue($single['test_id']) == 'selection' ||
							$root->getValue($single['test_id']) == 'text'

						) {?>
						<?php echo $root->getOneFieldById('units','unit','id',$single['unit_id']); ?>
							
						<?php } ?>	
					</td>
					<td>

						<?php if(
							$root->getValue($single['test_id']) == 'number' || 
							$root->getValue($single['test_id']) == 'selection' ||
							$root->getValue($single['test_id']) == 'text'

						) {?>
						<?php
						if (strpos($root->getOneFieldById('refs','reference','id',$single['reference_id']), "#")) {
								$arr = explode("#",$root->getOneFieldById('refs','reference','id',$single['reference_id']) );
								foreach ($arr as  $value) {
									echo $value."<br \>";
								}
							}else {
								echo $root->getOneFieldById('refs','reference','id',$single['reference_id']);
							}
						  ?>
						 <?php } ?>	
					</td>
				</tr>
			  <?php } ?>
			</tbody>
		
	</table>

<?php } ?>
<?php }elseif ($p['checkup_type'] == 'profile') {?>

	<h4 class="text-center mt-1">
		<?php echo $root->getTestName($p['checkupid']); ?>	
	</h4>

	<table class="table table-striped table-bordered">
		<thead class="bg-gray">
			<th>Test Name</th>
			<th>Result</th>
			<th>Unit</th>
			<th>Reference</th>
		</thead>
			<tbody>
				<?php $results = $root->getTestResults($p['id']
						,$p['serviceid'],$p['checkupid']);
					
				?>

				<?php while ($single = $results->fetch()) {?>
			
				<tr>
					<td><?php echo $root->getTestName($single['test_id']); ?></td>
					<td><?php echo $single['result']; ?></td>
					<td>
						<?php if(
							$root->getValue($single['test_id']) == 'number' || 
							$root->getValue($single['test_id']) == 'selection' ||
							$root->getValue($single['test_id']) == 'text'

						) {?>
						<?php echo $root->getOneFieldById('units','unit','id',$single['unit_id']); ?>
							
						<?php } ?>	
					</td>
					<td>

						<?php if(
							$root->getValue($single['test_id']) == 'number' || 
							$root->getValue($single['test_id']) == 'selection' ||
							$root->getValue($single['test_id']) == 'text'

						) {?>
						<?php
						if (strpos($root->getOneFieldById('refs','reference','id',$single['reference_id']), "#")) {
								$arr = explode("#",$root->getOneFieldById('refs','reference','id',$single['reference_id']) );
								foreach ($arr as  $value) {
									echo $value."<br \>";
								}
							}else {
								echo $root->getOneFieldById('refs','reference','id',$single['reference_id']);
							}
						  ?>
						 <?php } ?>	
					</td>
				</tr>
			  <?php } ?>
			</tbody>
		
	</table>


    <?php } ?>
    
  <?php } ?>

<?php } ?>


</div>