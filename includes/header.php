<?php
include('includes/config.php');
include_once('includes/functions.php');
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf8mb4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!--tiny editor to use in textare-->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script charset="utf8mb4">
      tinymce.init({
        selector: '.textArea',
        menubar: false,
        block_formats: 'Paragraph=p; Header 3=h3',
        entity_encoding: "raw"
      });
    </script>
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