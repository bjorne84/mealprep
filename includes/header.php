<?php
session_start();
include('includes/config.php');
include('includes/functions.php');
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf8mb4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title><?=$site_title . $divider . $page_title ?></title>
</head>

<body>
    <!--PAGE-CONTAINER FOR FIXING FOOTER WHO FLY-->
    <div id="page-containe">
        <div id="content-wrap">
            <header>
                <div class="headContainer">
                    <div class="logoHolder">
                        <a href="index.php"><img id="logosize" src="images/matprepp.png" alt="logotyp"></a>
                    </div>
                    <div class="navHold">
                        <!--Hamburger menu-->
                        <div class="nav-toggle">
                            <div class="nav-toggle-bar"></div>
                        </div>
                        <!--INCLUDE NAV HERE-->
                        <?php
                        include('includes/nav.php');
                        ?>
                    </div>
                </div>
            </header>
            <main>