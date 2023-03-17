<?php $stmt = $root->display('refs');?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
             <i class="fa fa-globe">
             </i>
            </div>
            <div>List of References</div>
        </div>
        <div class="page-title-actions">
            <a href="?view=createRef&title=Add New Reference" class="btn btn-primary">Add New</a>    
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

<div class="card">
  <div class="card-body p-0">
      <table class="table table-striped">
        <thead>
          <th>Reference</th>
          <th>Actions</th>
        </thead>
        <tbody id="refList">
          
        </tbody>
      </table>
  </div>

  <div class="card-footer">
     <div class="ajax-loading"></div>
  </div>
</div>

<script type="text/javascript" src="assets/scripts/loadRef.js" defer></script>