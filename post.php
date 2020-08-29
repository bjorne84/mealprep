<?php
$page_title = "Skapa och publicera recept";
include('includes/header.php');
?>
<?php
$posts = new GetPostController;
$newPost = new PostController;
// check if form has ben sent and then start validate data ($_SERVER['REQUEST_METHOD'] == 'POST')
if(isset($_POST['submitPost'])) {
 
    $imgName = "empty";

    if(!empty($_FILES['foodImg']['tmp_name'])){
        $imgErr= $newPost->setPostImg();
        $imageData = file_get_contents($_FILES['foodImg']['tmp_name']);
    }
 
    $error = $newPost->postRecipe($imgErr);
  
}
    
?>
<div id="account">
    <h1 class="h1-left">Skapa recept</h1>
    <form class="forms" id="formCreate" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <!--fält för formulär, hela den grå delen-->
        <fieldset id="field">
            <p class="pfield"></p>
            <?php if(isset($_POST['submitPost'])) {
                    if(!$error['message'] == "") {
                ?><div class="errorDiv">
                <p class="errorLight"><?php echo $error['message'];?></p>   
                </div><?php
                }
            }
            ?>
            <label for="headLine">Namn på recept</label><br>
            <input type="text" name="headLine" id="headLine" class="input" placeholder="Obligatoriskt"
            <?php if(isset($_POST['submitPost'])){?>value=<?php echo $error['headLine'];} ?>><br><br>
            <label for="foodImg">Ladda upp bild på maträtten (png, jpeg, gif eller i webp-format).
                Bild är
                frivilligt.</label><br>
            <input type="file" id="foodImg" name="foodImg" accept="image/png, image/jpeg, image/gif, image/webp"><br><br>
            <label for="blogPost">Kort beskrivning:</label><br>
            <textarea id="blogPost" class="textArea" name="blogPost" cols="30" rows="4" 
            placeholder="Beskriv kortfattat maträtten, är den lätt-lagad eller mer avancerad?">
            <?php if(isset($_POST['submitPost'])){echo $error['short_description'];}?>
            </textarea>
            <br>
            <label for="blogPostHow">Gör så här:</label><br>
            <textarea id="blogPostHow" class="textArea" name="blogPostHow" cols="30" rows="4" 
            placeholder="Beskriv hur man tillagar den, gärna stegvis och tydligt...">
            <?php if(isset($_POST['submitPost'])){echo $error['step_by_step'];}?></textarea>
            <br>
            <div class="ingDiv">
                <label for="port">Antal portioner:</label><br>
                <input type="number" name="port" id="port" class="input max" value="2" min="1" max="20"><br>
            </div>
            <br>
            <div class="btn-wrapper">
                <button type="submit" name="submitPost"  id="btn-create" class="btn btn2">Publicera</button>
                <button type="reset" name="deletePost" id="btn-reset" class="btn btn2 btn-reset">Radera fält</button>
            </div>
        </fieldset>
    </form>
</div>
<?php

/* GET THE USER_ID*/
$id = $_SESSION['user_id'];


$blogPosts = $posts->getPostsByUserId($id);
$folder = $posts->getImageFolder();



?>
<section class="showBlogsUser">
    <h1 class="h1-left">Dina publicerade recept/inlägg</h1>
    <p>Du kan redigera eller radera tidigare gjorda inlägg.</p>
 <?php   

    foreach ($blogPosts as $item) {
    /* check if image is null and insert a stockimage*/
    if($item['imgPath'] === null || empty($item['imgPath'])) {
        $item['imgPath'] = "fallback.jpg";
    }

    ?>
    
    <article class="blogArticle userPost">
       
        <div class="userflex-article">
            <div class="left-side-blog">
                <h2 class="blog-title"><?php echo $item['Title']?></h2>
                <div class="portioner"><p>Antal portioner:</p><h3><?php echo $item['Portions']?></h3></div>
                <picture class="blogImg">
                    <source type="image/webp" srcset="<?php echo $folder . $item['imgPath']?>">
                    <img class="blogImages" src="<?php echo $folder . $item['imgPath']?>" alt="Bild på maträtt">
                </picture>

                <!-- Div with info about when it was created and by who-->
                <div class="createdBlog">
                    <p class="pCreated">Skapad av: <span class="spanCreated"><?php echo $item['Username']?></span></p>
                    <p class="pCreated pdate"><span><?php echo $item['create_date']?></span></p>
                </div>
                <p class="blogText"><?php echo $item['Short_description']?><?php echo $item['Recipe_ID']?>
                </p>
                <h3>Gör så här: </h3>
                <p class="blogText"><?php echo $item['Step_by_step']?>
                </p>
            </div>

        </div>
        <div class="in-btn-wrapper">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="recipe" value>
            <button onclick="" type="submit" name="update" id="btn-red" class="btn btn2 btn3">Redigera inlägg</button>
            <button onclick="" type="submit" name="delete" id="btn-del" class="btn btn2 btn3">Radera inlägg</button>
            </form>
        </div>

      

    </article>
    <!--END OF FOREACH-loop-->
    <?php } ?>
    <?php
    /* Check if deletebutton is pressed
    if(isset($_POST['delete'])) {
        if ($id_recipe == !null) {
            $newPost->deletePost($id_recipe);
            header("Location: post.php?delete=success");
            echo "succes deleting";
    }
}
*/   ?>
</section>
<?php
include('includes/footer.php');
?>