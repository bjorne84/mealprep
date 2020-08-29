<?php
$page_title = "Alla bloggares profiler";
include('includes/header.php');
?>
<?php
/* GET THE USER_ID*/
$id = $_GET['id'];
var_dump($_GET);
echo $id;

$posts = new GetPostController;
$blogPosts = $posts->getPostsByUserId($id);
$folder = $posts->getImageFolder();
var_dump($blogPosts);
$username = $posts->getUserName($id);
var_dump($username);

echo $username["username"];
?>
<h1 id="topElement"><?php echo $username["username"]?> 's recept!</h1>

<div class="mainWrapp">
    <div class="showBlogs">
        <?php if ($blogPosts == null || empty($blogPosts)) {
            echo "<h3> Användaren har inte skrivit något recept än. </h3>";
        } else {
            foreach($blogPosts as $item) {
    /* check if image is null and insert a stockimage*/
    if($item['imgPath'] === null || empty($item['imgPath'])) {
        $item['imgPath'] = "fallback.jpg";
    }
        ?>
        <article class="blogArticle">
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
           
        </article>
        <?php
        } 
    } 
        ?>
    </div>
    <!--HAVE TO PUT ASIDE HERE BEFORE LAST DIV-->
    <?php
    include('includes/aside.php');
    ?>
    <!--DIV MAINWRAPP-->
    </div>
    <?php
    include('includes/footer.php');
    ?>