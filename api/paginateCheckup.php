<?php 
	include '../inc/conn.php';
    include '../vendor/autoload.php'; 
    include '../classes/declare.php';

    $generator = new Picqer\Barcode\BarcodeGeneratorSVG();
   	
   	$limit= 5;
   	$offset = ($_GET['page']-1) * $limit;
   	$date = date('Y-m-d');
   	$st = $root->getDistictCheckUp($date,$offset,$limit);
    
    $output = "";
    while ($row = $st->fetch()) {
    	$output .= "<div class='col-md-12'> \n";
    	$output .= "<div class='main-card mb-3 card'> \n";
    	$output .= "<div class='card-header'> \n".$root->getOnePatientByServiceId($row['serviceid']);
    	$output .= "<div class='btn-actions-pane-right'> \n";
    	$output .= "<button type='button' data-toggle='collapse' href='#service-".$row['serviceid']."' class='btn btn-primary'>Show</button> \n" ;

        
        $output .= "<a class='btn btn-success' href='?view=detailsList&service_id=".$row['serviceid']."'>Details</a> \n";

        $output .= "<a class='btn btn-warning' target='_blanck' href='print?view=allPrintReport&sid=".$row['serviceid']."'>Print All</a> \n";
    	$output .= "</div>\n </div>\n";
    	$output .= "<div class='card-body p-0'>\n";
    	$output .= "<div class='collapse' id='service-".$row['serviceid']."'>\n";
    	$s = $root->getTestsByServiceId($row['serviceid']);
    	$output .= "<table class='mb-0 table table-striped'> \n
        				<thead>\n
        					<th>Investigation</th>\n
                            <th>Barcode</th>\n
        					<th>Date</th>\n
        					<th>Status</th>\n
        					<th>Action</th>\n
        				</thead>\n
        				<tbody> \n";
        while ($r = $s->fetch()) {
        	$output .= "<tr> \n";
        	$output .= "<td>".$root->getOneFieldById('checkup','checkup_name','id',$r['checkupid'])."</td>";
            $output .= "<td> <div id='barcode-".$r['id']."'>".$generator->getBarcode($r['uid'], $generator::TYPE_CODE_128,1)."<br \>".$root->getOnePatientByServiceId($row['serviceid'])." - ".$root->getOneFieldById('checkup','checkup_name','id',$r['checkupid'])."
            </div></td>";
        	$output .= "<td>".$r['dateCreated']."</td>";
        	$output .= "<td>";
        	         if($r['status'] == 0){
        	         	$output .= "Pendding";
        	         }else {
        	         	$output .= "Finished";
        	         }
        	$output .= "</td>";
            $output .= "<td>";
        	if ($r['status'] == 0){
        		$output .= "<a href='?view=viewForm&sid=".$row['serviceid']."&c_id=".$r['checkupid']."&lbr=".$r['id']."' target='_blanck' class='btn btn-primary btn-sm view' role='button' data-sid='{$row['serviceid']}' data-cid='{$r['checkupid']}' data-lbr='{$r['id']}'>Select</a>\n";
        	}else{
        		$output .= "<a href='?view=viewUpdate&sid=".$row['serviceid']."&c_id=".$r['checkupid']."&lbr=".$r['id']."' target='_blanck' class='btn btn-success btn-sm' role='button'>Update</a>\n";

        		$output .= "<a href='print?view=printReport&sid=".$row['serviceid']."&c_id=".$r['checkupid']."&lbr=".$r['id']."' target='_blanck' class='btn btn-primary btn-sm' role='button'>View</a>\n";
        	}
            $output .= "<button class='print btn btn-warning btn-sm' data-id='".$r['id']."'> Print Label</button>";
            $output .= "</td>";

        	$output .= "</tr>\n";

        }

        $output .= "</tbody>\n
        			</table>\n
        		
        	</div>\n
                          
        </div>\n

        <div class='card-footer'>\n
           
        </div>\n
     </div>\n
                                    
    </div>\n";

    }
	

	echo $output;
      
  
        				


 ?>