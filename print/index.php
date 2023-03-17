<?php session_start();
    include '../inc/conn.php';
    include '../vendor/autoload.php'; 
    include '../classes/declare.php';
    $auth = new \Delight\Auth\Auth($conn);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php if (isset($_GET['title'])) { echo $_GET['title'] ;}else {echo "Lab";} ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    -->
    
    
    
    <link href="../main.css" rel="stylesheet">
    <link href="../assets/css/print.css" rel="stylesheet">
  <!--   <link rel="stylesheet" href="normalize.min.css">
    <link rel="stylesheet" type="text/css" href="paper.css"> -->

    <style type="text/css">
        .table-bordered  {
            border: 1.5px solid #000000;
        }
        @page {
        size: A4;
        margin: 0;
        }
        @media print {
            html, body {
                width: 210mm;
                height: 297mm;        
            }
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
    </style>

    
</head>
<body>
    
        <?php  include 'route.php'; ?>
    
    
 
 

</body>
</html>
