<?php 
  include '../inc/conn.php';
  include '../vendor/autoload.php'; 
  include '../classes/declare.php';
  $auth = new \Delight\Auth\Auth($conn);


  $limit= 20;
  $offset = ($_GET['page']-1) * $limit;
  $date = date('Y-m-d');
  $st = $root->display('refs',$offset,$limit);
  $count = $st->rowCount();
  $output = "";
 ?>


<?php while ($row = $st->fetch()) {?>
<?php 

    $output .= "<tr> \n"; 
    $output .= "<td>".$row['reference']."</td> \n";
   
    $output .= "<td><a href='?view=editRef&id=".$row['id']."' class='btn btn-success float-left'>Edit <i class='fa fa-edit'></i></a>";

    $output .= "<form action='controller/reference/delete.php' id='delete_reference_".$row['id']."' class='float-left ml-2 mr-2' method='post'>";

    $output .= "<input type='hidden' name='id' value='".$row['id']."' >";
    $output .= "<button class='btn btn-danger' type='submit' 
      onclick = ' event.preventDefault();
      var r = confirm( \" are you sure ? \");
      if (r == true) {
        document.getElementById(\"delete_reference_".$row['id']."\").submit();} '>Delete <i class='fa fa-trash'></i></button>";
    $output .= "</form></td>";             
    $output .= "</tr>";
                 
                
                
?>
<?php } ?>

<?php echo $output; ?>


      
