<?php
// error_reporting(-1);
// ini_set("display_errors", 1);

// Autoladda klasser med lowercase-filnamn för SFTP med Linux
spl_autoload_register(function ($class_name) {
    include 'includes/classes/' . strtolower($class_name) . '.class.php';
});

$site_title = "Min Bucketlist - Lab 2 PHP";
$divider = " | ";
