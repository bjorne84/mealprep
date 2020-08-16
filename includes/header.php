<?php
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>MATPREPP - Receptbloggportal för oss som lagar mat en gång i veckan. </title>
</head>

<body>
    <!--PAGE-CONTAINER FOR FIXING FOOTER WHO FLY-->
    <div id="page-containe">
        <div id="content-wrap">
            <header>
                <div class="headContainer">
                    <div class="logoHolder">
                        <a href="index.html"><img id="logosize" src="images/matprepp.png" alt="logotyp"></a>
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