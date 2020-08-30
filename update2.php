<?php

include('includes/config.php');
$arrUpdate = new PostController;
if(isset($_POST['submitPost'])) {
    $data = [
        'Title' => $_POST['Title'],
        'Short_desc' => $_POST['blogPost'],
        'Step_by_step' => $_POST['blogPostHow'],
        'recipe_ID' => $_POST['recipe_ID'],
        'port' => $_POST['port']
    ];

    if($arrUpdate->update($data)) {
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href='http://webb01.se/mealprep/index.php'>Vidare till start</a>");
        }
        else{
            header("Location: post.php?update=success");//funderar på att köra en if runt headern
            exit();
        }

    } else {
        die('något gick del med kopplingen till databasen, otur.');
    }
    
}
    /*$update->updateSql($data);
        return true;*/
  



     
