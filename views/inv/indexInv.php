<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>List of Investigation</div>
            
        </div>
        <div class="page-title-actions">
            <a href="?view=createInv" class="btn btn-primary">Add New</a>    
        </div>
    </div>
</div>   

<div class="card mb-3">
    <div class="card-header">
        <div class="card-title">
           Search Investigation
        </div>
    </div>

    <div class="card-body">
        <form action="" method="get">
          <input type="hidden" name="view" value="searchInv">
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


<div class="card">
  <div class="card-body p-0">
      <table class="table table-striped">
        <thead>
          <th>Test</th>
          <th>Test Type</th>
          <th>Price</th>
          <th>Actions</th>
        </thead>
        <tbody id="testList">
          
        </tbody>
      </table>
  </div>

  <div class="card-footer">
     <div class="ajax-loading"></div>
  </div>
</div>



<script type="text/javascript" src="assets/scripts/loadTests.js" defer></script>