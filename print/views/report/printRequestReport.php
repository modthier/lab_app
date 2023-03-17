<?php 
	$patient = $root->getPatientByServiceId($_GET['service_id']);
	$info = $patient->fetch();

	$service = $root->findById('service_request','id',$_GET['service_id']);
	$s = $service->fetch();

	$stmt = $root->getTestsByServiceId($_GET['service_id']);
    $count = $stmt->rowCount(); 
 ?>

<div class="container">
	<h3 class="text-center mt-3">Investigations Requested</h3>
	<div class="content-block">
		<table class="table table-bordered">
				<tr>
					<td>Service ID : <?php echo $_GET['service_id']; ?></td>
					<td>Name : <?php echo $info['patient_name']; ?> </td>
					<td>Age : <?php echo $root->getAge($info['birthdate']); ?></td>
					
				</tr>

				<tr>
					<td>Gender : <?php echo $info['gender']; ?> </td>
					<td>Referred From : <?php echo $s['referral']; ?></td>
					<td></td>
				</tr>
		</table>
	</div>

	<table class="table">
            <thead class="bg-gray">
               <th>Investigation</th>
               <th>Date</th>
               

                <tbody>
                    <?php while ($r = $stmt->fetch()) {?>

                    <tr>
                        <td><?php echo $root->getOneFieldById('checkup','checkup_name','id',$r['checkupid']); ?></td>
                       
                        <td><?php echo $r['dateCreated']; ?></td>
                        
                       
                    </tr>
                  <?php } ?>
                </tbody>
            </thead>
        </table>

</div>