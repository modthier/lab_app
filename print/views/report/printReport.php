<?php 
	$patient = $root->getPatientByServiceId($_GET['sid']);
	$info = $patient->fetch();

	$setting = $root->display('setting');
	$r = $setting->fetch();

	$service = $root->findById('service_request','id',$_GET['sid']);
	$s = $service->fetch();
 ?>
<div class="container">
	<div class="content-block">
	<div class="mt-2">
		<div class="row align-items-center">
			<div class="col-3">
				<span class="text-center"> <?php echo $r['phone'] ;?> </span>
			</div>
			<div class="col-6">
				<h1 class="text-center"><?php echo $r['lab_name']; ?></h1>
			</div>
			<div class="col-3">
				<span class="text-center"><?php echo $r['address'] ;?> </span>
				
			</div>
		</div>
		<hr class="border-dark">
		<hr class="border-dark">
	</div>
</div>
<?php $type = $root->getTypeAndValue($_GET['c_id']); ?>

<?php if ($type['checkup_type'] == 'single') {?>
	<h1 class="text-center mt-1"><?php echo $root->getTestName($_GET['c_id']); ?></h1>
    <?php $results = $root->getTestResult($_GET['c_id'],$_GET['lbr'],$_GET['sid']);?>

	<?php if ($type['checkup_value'] == 'report') {?>
		<?php $report = $results->fetch(); ?>
		<p>
			<?php echo $report['result']; ?>
		</p>
	<?php }else { ?>
	<table class="table table-striped mt-2">
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

<?php }elseif ($type['checkup_type'] == 'profile') {?>
	<h1 class="text-center mt-1"><?php echo $root->getTestName($_GET['c_id']); ?></h1>

	<table class="table table-striped mt-2">
		<thead class="bg-gray">
			<th>Test Name</th>
			<th>Result</th>
			<th>Unit</th>
			<th>Reference</th>
		</thead>
			<tbody>
				<?php $results = $root->getTestResults($_GET['lbr']
						,$_GET['sid'],$_GET['c_id']);
					
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
									echo $value."<br>";
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



<p style="page-break-after: always;"></p>
<footer>
	<table class="table table-borderless">
		<tr>
			<td>Address : <?php echo $r['address']; ?></td>
			<td>Tel : <?php echo $r['phone'] ?></td>
			<td>Email : <?php echo $r['email']; ?></td>
		</tr>
	</table>
</footer>
</div>


