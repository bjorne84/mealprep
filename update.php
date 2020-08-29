<?php
$page_title = "Skapa och publicera recept";
include('includes/header.php');
?>
<?php
$posts = new GetPostController;
$newPost = new PostController;

//get post by recipe_id
$recipeID = $_GET['update'];
// Fire up method to get the recipe
$recipe = $newPost->getRecipeById($recipeID);
var_dump($recipe);
$recipe['Title'];
$folder = $posts->getImageFolder();

/* recipe*/
$recipeNum = $recipe['Recipe_ID'];


// check if form has ben sent and then start validate data ($_SERVER['REQUEST_METHOD'] == 'POST')
if(isset($_POST['submitPost'])) {
 
    $imgName = "empty";

    if(!empty($_FILES['foodImg']['tmp_name'])){
        $imgErr= $newPost->setPostImg();
        $imageData = file_get_contents($_FILES['foodImg']['tmp_name']);
    }
 
    $error = $newPost->postRecipe($imgErr, $recipeNum);
  
}
    
?>
<div id="account">
    <h1 class="h1-left">Uppdatera recept</h1>
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
            value=
            <?php if(isset($_POST['submitPost'])){ echo $error['headLine'];
        } else {
            echo $recipe['Title'];
        }?>><br><br>

        <!-- CHECK IF IMAGE EXIST AND SHOW IT imgPath -->
        <?php
            if(!$recipe['imgPath'] == ""|| !empty($recip['imgPath'])) {
                ?>
                <picture class="blogImg">
                    <source type="image/webp" srcset="<?php echo $folder . $recipe['imgPath']?>">
                    <img class="blogImages" src="<?php echo $folder . $recipe['imgPath']?>" alt="Bild på maträtt">
                </picture>
                <?php
            }
        ?>
            <label for="foodImg">Ladda upp en ny bild på maträtten (png, jpeg, gif eller i webp-format).
                Bild är
                frivilligt.</label><br>
            <input type="file" id="foodImg" name="foodImg" accept="image/png, image/jpeg, image/gif, image/webp"><br><br>
            <label for="blogPost">Kort beskrivning:</label><br>
            <textarea id="blogPost" class="textArea" name="blogPost" cols="30" rows="4" 
            placeholder="Beskriv kortfattat maträtten, är den lätt-lagad eller mer avancerad?">
            <?php if(isset($_POST['submitPost'])){ echo $error['short_description'];
        } else {
            echo $recipe['Short_description'];
        }?>
            </textarea>
            <br>
            <label for="blogPostHow">Gör så här:</label><br>
            <textarea id="blogPostHow" class="textArea" name="blogPostHow" cols="30" rows="4" 
            placeholder="Beskriv hur man tillagar den, gärna stegvis och tydligt...">
            <?php if(isset($_POST['submitPost'])){ echo $error['step_by_step'];
        } else {
            echo $recipe['Step_by_step'];
        }?>
        </textarea>
            <br>
            <div class="ingDiv">
                <label for="port">Antal portioner:</label><br>
                <input type="number" name="port" id="port" class="input max" value="<?php echo $recipe['Portions']; ?>" min="1" max="20"><br>
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

?>

<?php
include('includes/footer.php');
?>