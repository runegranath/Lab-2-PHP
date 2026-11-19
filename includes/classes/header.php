<?php include_once("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Milligram CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?= isset($page_title) ? $page_title . $divider . $site_title : $site_title; ?></title>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <nav class="main-nav">
                <a href="index.php" class="logo"><strong>Min Bucketlist</strong></a>
                <ul class="nav-list">
                    <li><a href="index.php">Start</a></li>
                    <li><a href="bucketlist.php">Bucketlist</a></li>
                    <li><a href="ai.php">Om AI</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">