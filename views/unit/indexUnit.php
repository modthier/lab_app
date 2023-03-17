<?php $stmt = $root->display('refs');?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>List of Units</div>
        </div>
        
        <div class="page-title-actions">
            <a href="?view=createUnit&title=Add New Unit" class="btn btn-primary">Add New</a>    
        </div>
    </div>
</div> 
<?php include 'inc/msg.php'; ?>

<div class="card mb-3">
    <div class="card-header">
        <div class="card-title">
           Search Units
        </div>
    </div>

    <div class="card-body">
        <form action="" method="get">
          <input type="hidden" name="view" value="searchUnit">
          <div class="input-group">
              <input type="text" name="q" class="form-control">
              <div class="input-group-append">
                  <input type="submit" value="Search" class="btn btn-success">
              </div>
          </div>
        </form>
    </div>
</div>

<div class="card">
  <div class="card-body p-0">
      <table class="table table-striped">
        <thead>
          <th>Unit</th>
          <th>Actions</th>
        </thead>
        <tbody id="unitList">
          
        </tbody>
      </table>
  </div>

  <div class="card-footer">
     <div class="ajax-loading"></div>
  </div>
</div>

<script type="text/javascript" src="assets/scripts/loadUnits.js" defer></script>