<?php
require_once('classes/PostController.class.php');
$page_title = "Delete";
include('includes/header.php');

/* GET THE Recipe_ID*/

$recipe = $_GET['del'];
//var_dump($_GET);
$delete = new postController();
/* Inject Recipe_ID to method that deletes the post*/
$delete->deletePost($recipe);

