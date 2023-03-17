<?php 
  include '../inc/conn.php';
  include '../vendor/autoload.php'; 
  include '../classes/declare.php';
  $auth = new \Delight\Auth\Auth($conn);


  $limit= 20;
  $offset = ($_GET['page']-1) * $limit;
  $stmt = $service->getAccounts($offset,$limit);
  $output = "";
 ?>

 <?php while ($row = $stmt->fetch()) {?>
        <?php 
           $output .= "<tr> \n"; 
           $output .= "<td>".$row['patient_name']."</td> \n";
           $output .= "<td>".number_format($row['total_price'],2)." SDG"."</td> \n";
           $output .= "<td>".number_format($account->inoviceAmount($row['service_id']),2)." SDG"."</td> \n";
            $output .= "<td>".number_format(($row['total_price'] - $account->inoviceAmount($row['service_id'])),2)." SDG"."</td> \n";
           $output .= "<td>".$row['date']."</td> \n";
           $output .= "<td> \n
              <a class='btn btn-primary' href='?view=showAccount&sid=".$row['service_id']."'>Details</a> \n";
          $output .= "</td> \n";
          $output .= "</tr> \n";
        ?>   
<?php } ?>
<?php echo $output; ?>