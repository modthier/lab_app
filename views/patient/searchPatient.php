<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Search Patients</div>
            
        </div>
        <div class="page-title-actions">
            <a href="?view=createPatient" class="btn btn-primary">Add New</a>
            <a href="?view=indexPatient&title=Patients" class="btn btn-danger">Back</a>    
        </div>

        
    </div>
</div>   

<div class="card mb-3">
    <div class="card-header">
        <div class="card-title">
           Search Patients
        </div>
    </div>

    <div class="card-body">
        <form action="" method="get">
          <input type="hidden" name="view" value="searchPatient">
          <div class="input-group">
              <input type="text" name="q" class="form-control">
              <div class="input-group-append">
                  <input type="submit" value="Search" class="btn btn-success">
              </div>
          </div>
        </form>
    </div>
</div>
<?php include 'inc/msg.php'; ?>


<?php 
  if (isset($_GET['q']) && !empty($_GET['q'])) {
      
  $stmt = $pat->searchPatient($_GET['q']);
  $count = $stmt->rowCount();
?>

<?php if ($count > 0) { ?>

<div class="card">
  <div class="card-body p-0">
      <table class="table table-striped">
        <thead>
          <th>Name</th>
          <th>Date Of Birth</th>
          <th>Genger</th>
         
          <th>Actions</th>
        </thead>
        <tbody>
          <?php while ($row = $stmt->fetch()) {?>
              <tr>
                <td><?php echo $row['patient_name']; ?></td>
                <td><?php echo $row['birthdate']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td>
                  <a href='?view=editPatient&id=<?php echo $row['id']; ?>' class='btn btn-success float-left'>Edit <i class='fa fa-edit'></i></a>

                  <a href='?view=showPatient&c_id=<?php echo $row['id']; ?>' class='btn btn-primary float-left ml-2'>View <i class='fa fa-eye'></i></a>

                 <form action='controller/patient/delete.php' id="delete_pat_<?php echo $row['id'] ?>" class='float-left ml-2 mr-2' method='post'>

                    <input type='hidden' name='id' value= "<?php echo $row['id']; ?>" >
                    <button class='btn btn-danger' type='submit' 
                       onclick = 'event.preventDefault();
                       var r = confirm( " are you sure ? ");
                       if (r == true) {
                       document.getElementById("delete_pat_<?php echo $row['id'] ?>"). submit();}'>Delete <i class='fa fa-trash'></i></button>
                 </form>
              </tr>
          <?php } ?>
        </tbody>
      </table>
  </div>

  <div class="card-footer">
     
  </div>
</div>


<?php }else { ?>
  <h1 class="text-center text-danger">No result found</h1>
<?php } ?>

<?php }else { ?>
  <h1 class="text-center text-danger">Please Enter Search Word To Get Results</h1>
<?php } ?>