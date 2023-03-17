<?php 
		
	include '../inc/conn.php';
	include '../vendor/autoload.php'; 
	include '../classes/declare.php';

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	use PhpOffice\PhpSpreadsheet\IOFactory;

	$spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue("A1",'Patient Name');
	$sheet->setCellValue("B1",'Total Price');
	$sheet->setCellValue("C1",'Amount Paid');
	$sheet->setCellValue("D1",'Remaining Amount');
	$sheet->setCellValue("E1",'Date');
	

		if (isset($_GET['date_from']) && isset($_GET['date_to'])) {
			$stmt = $service->getAccountsByDate($_GET['date_from'],$_GET['date_to']);
		}elseif (isset($_GET['name'])) {
			$stmt = $service->getAccountsByPatient($_GET['name']);
		}else {
             $q = "SELECT p.patient_name, a.service_id ,  sum(a.price) as 'total_price' , a.date
	    	 FROM accounting a left join service_request s
	    	 on a.service_id = s.id
	    	 left join patients p 
	    	 on s.patient_id = p.id
	    	 where a.tab = 'lab'
             GROUP by a.service_id
             order by a.date desc ";

             $stmt = $conn->prepare($q);
             $stmt->execute();
		}

		

        $n = 1;
        while ($row = $stmt->fetch()) {
        	$rowNum = $n + 1;
        	$sheet->setCellValue("A".$rowNum,$row['patient_name']);
			$sheet->setCellValue("B".(double) $rowNum,number_format($row['total_price'],2));
			$sheet->setCellValue("C".(double) $rowNum,number_format($account->inoviceAmount($row['service_id']),2));
			$sheet->setCellValue("D".(double) $rowNum,number_format(($row['total_price'] - $account->inoviceAmount($row['service_id'])),2));
			$sheet->setCellValue("E".$rowNum,$row['date']);

			$n++;
        }

        $FileName = "accounting.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$FileName.'"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		 
		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');

 ?>