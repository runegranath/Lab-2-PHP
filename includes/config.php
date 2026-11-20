<?php
error_reporting(-1);
ini_set("display_errors", 1);

// Autoladda klasser
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.class.php';
});

$site_title = "Min Bucketlist - Lab 2 PHP";
$divider = " | ";