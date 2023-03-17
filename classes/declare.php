<?php
    
  
    $ru = new router();
    $root = new root($conn);
    $service = new Service($conn);
    $pat = new patients($conn);
    $account = new account($conn);
    $auth = new \Delight\Auth\Auth($conn);
   
?>
