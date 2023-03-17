<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>Search References</div>
        </div>

         <div class="page-title-actions">
            
             <a href="?view=indexRef&title=References" class="btn btn-danger">Back</a>

            
        </div>
    </div>
</div> 
<?php include 'inc/msg.php'; ?>


<div class="card mb-3">
    <div class="card-header">
        <div class="card-title">
           Search References
        </div>
    </div>

    <div class="card-body">
        <form action="" method="get">
          <input type="hidden" name="view" value="searchRef">
          <div class="input-group">
              <input type="text" name="q" class="form-control">
              <div class="input-group-append">
                  <input type="submit" value="Search" class="btn btn-success">
              </div>
          </div>
        </form>
    </div>
</div>

<?php 
  if (isset($_GET['q']) && !empty($_GET['q'])) {
      
  $stmt = $service->searchReference($_GET['q']);
  $count = $stmt->rowCount();
?>

<?php if ($count > 0) { ?>
<div class="card">
  <div class="card-body p-0">
      <table class="table table-striped">
        <thead>
          <th>Reference</th>
          <th>Actions</th>
        </thead>
        <tbody>
          <?php while ($row = $stmt->fetch()) {?>
         
           <tr>
             <td><?php echo $row['reference']; ?></td>
   
             <td><a href='?view=editRef&id=<?php echo $row['id'] ?>' class='btn btn-success float-left'>Edit <i class='fa fa-edit'></i></a>

           </td>            
          </tr>
        <?php } ?>
        </tbody>
      </table>
  </div>

  <div class="card-footer">
     <div class="ajax-loading"></div>
  </div>
</div>
<?php }else { ?>
  <h1 class="text-center text-danger">No result found</h1>
<?php } ?>

<?php }else { ?>
  <h1 class="text-center text-danger">Please Enter Search Word To Get Results</h1>
<?php } ?>

