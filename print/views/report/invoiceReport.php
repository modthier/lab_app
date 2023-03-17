<?php 
   $stmt = $service->getAccountDetails($_GET['sid']); 
   $price = $root->findById('invoices','id',$_GET['invoice_id']);
   $total = $price->fetch();

   $setting = $root->display('setting');
   $r = $setting->fetch();

   $st = $pat->getPatientByServiceId($_GET['sid']);
   $ro = $st->fetch();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>A simple, clean, and responsive HTML invoice template</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<div style="width: 100%; max-width: 300px">
										<?php echo $r['lab_name']; ?>
									</div>
								</td>

								<td>
									Invoice #: <?php echo $total['id']; ?><br />
									Created: <?php echo date('F d,Y'); ?><br />
									
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									<?php echo $r['address']; ?> <br>
									<?php echo $r['phone']; ?>
								</td>

								<td>
									
									Issued To : <?php echo $ro['patient_name']; ?><br />
									
								</td>
							</tr>
						</table>
					</td>
				</tr>

				
				

				<tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>

				<?php while ($row = $stmt->fetch()) {?>
				
				<tr class="item">
					<td><?php echo $row['checkup_name']; ?></td>

					<td><?php echo number_format($row['price'],2)." SDG"; ?></td>
				</tr>
			    <?php } ?>
				

				

				
			</table>

			<table class="table table-bordered mt-2">
				<tr>
					
				
				<td>Total: <?php echo number_format($total['total_price'],2)." SDG"; ?></td>

				<?php if ($total['remaining_amount'] == 0) {?>
					
					<td style="text-align: left;">Total Amount Paid : <?php echo number_format($account->inoviceAmount($_GET['sid']),2)." SDG"; ?></td>
				

			    <?php }else { ?>

			    	<td style="text-align: left;">Amount Paid : <?php echo number_format($total['amount_paid'],2)." SDG"; ?></td>

			    <?php } ?>

				<td>Remaining Amount : <?php echo number_format($total['remaining_amount'],2)." SDG"; ?></td>

				</tr>
			</table>

			<h4>Issued by : <?php echo $root->getOneFieldByid('users','username','id',$total['user_id']); ?></h4>
		</div>
	</body>
</html>