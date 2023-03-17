<?php

include 'inc/conn.php';
include 'vendor/autoload.php';
use Coderatio\SimpleBackup\SimpleBackup;

$simpleBackup = SimpleBackup::setDatabase(['lab', 'root', '', 'localhost'])
  ->storeAfterExportTo('backups');

$error = array();
$auth = new \Delight\Auth\Auth($conn);
try {
    $auth->logOut();
    header("Location:login.php");
} catch (\Delight\Auth\AuthError $e) {
}

// or

try {
    $auth->logOutEverywhereElse();
}
catch (\Delight\Auth\NotLoggedInException $e) {
    die('Not logged in');
} catch (\Delight\Auth\AuthError $e) {
}

// or

try {
    $auth->logOutEverywhere();
}
catch (\Delight\Auth\NotLoggedInException $e) {
    die('Not logged in');
} catch (\Delight\Auth\AuthError $e) {
}