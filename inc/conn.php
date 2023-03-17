<?php 
$dsn = 'mysql:host=localhost;dbname=lab';
$conn = new PDO ($dsn, 'root', '');
$conn->query("set NAMES utf8");
?>
