<?php
$page_title = "Skapa och publicera recept";
include('includes/header.php');
?>
<?php
// check if form has ben sent and then start validate data ($_SERVER['REQUEST_METHOD'] == 'POST')
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newPost = new PostController;
    $error = $newPost->postRecipe();
    var_dump($error);
    //printf($_POST);
    echo "<br>";  
    echo $_SESSION['user_id'];
    echo $error['headLine'];
}
    
?>
<div id="account">
    <h1 class="h1-left">Skapa recept</h1>
    <form class="forms" id="formCreate" method="POST">
        <!--fält för formulär, hela den grå delen-->
        <fieldset id="field">
            <p class="pfield"></p>
            <?php if(isset($_POST['submitPost']) || isset($_POST['moreFields'])) {
                    if(!$error['message'] == "") {
                ?><div class="errorDiv">
                <p class="errorLight"><?php echo $error['message'];?></p>   
                </div><?php
                }
            }
            ?>
            <label for="headLine">Namn på recept</label><br>
            <input type="text" name="headLine" id="headLine" class="input" placeholder="Obligatoriskt"
            <?php if(isset($_POST['submitPost']) || isset($_POST['moreFields'])){?>value=<?php echo $error['headLine'];} ?> required><br><br>
            <label for="blogPost">Kort beskrivning:</label><br>
            <textarea id="blogPost" class="textArea" name="blogPost" cols="30" rows="4" 
            placeholder="Beskriv kortfattat maträtten, är den lätt-lagad eller mer avancerad?">
            <?php if(isset($_POST['submitPost']) || isset($_POST['moreFields'])){echo $error['short_description'];}?>
            </textarea>
            <br>
            <label for="blogPostHow">Gör så här:</label><br>
            <textarea id="blogPostHow" class="textArea" name="blogPostHow" cols="30" rows="4" 
            placeholder="Beskriv hur man tillagar den, gärna stegvis och tydligt...">
            <?php if(isset($_POST['submitPost']) || isset($_POST['moreFields'])){echo $error['step_by_step'];}?></textarea>
            <br>
            <div class="ingDiv">
                <label for="port">Antal portioner:</label><br>
                <input type="number" name="port" id="port" class="input max" value="2" min="1" max="20"><br>
                <h3 class="h3form">Lägg till ingredienser:</h3>
                <input type="number" name="ingrNum" id="ingrNum" class="input max" value="1" min="1">
                <select name="unit" class="max">
                    <option name='104' value='104'>ml</option>
                    <option name='103' value='103'>cl</option>
                    <option name='102' value='102'>dl</option>
                    <option name='101' value='101'>liter</option>
                    <option name='110' value='110'>krm</option>
                    <option name='109' value='109'>tesked</option>
                    <option name='108' value='108'>matsked</option>
                    <option name='105' value='105'>gram</option>
                    <option name='106' value='106'>hekto</option>
                    <option name='107' value='107'>kilo</option>
                    <option name='111' value='111'>st</option>
                    <option name='112' value='112'>ask</option>
                    <option name='113' value='113'>påse</option>
                    <option name='114' value='114'>knippe</option>
                    <option name='115' value='115'>klyfta</option>
                    <option name='117' value='117'>portioner</option>
                </select>
                <input type="text" name="ingr" id="ingr" class="input" placeholder="Lägg till ingrediens" value="test"><br>
                <button type="submit" name="moreFields" id="btn-ingr" class="btn btn2 btn-ingr">+ Fler fält</button>
            </div>
            <br>
            <label for="foodImg">Ladda upp bild på maträtten (png, jpeg, gif eller i webp-format).
                Bild är
                frivilligt.</label><br>
            <input type="file" id="foodImg" name="foodImg" accept="image/png, image/jpeg, image/gif, image/webp">
            <div class="btn-wrapper">
                <button type="submit" name="submitPost"  id="btn-create" class="btn btn2">Publicera</button>
                <button type="reset" name="deletePost" id="btn-reset" class="btn btn2 btn-reset">Radera fält</button>
            </div>
        </fieldset>
    </form>
</div>
<section class="showBlogsUser">
    <h1 class="h1-left">Dina publicerade recept/inlägg</h1>
    <p>Du kan redigera eller radera tidigare gjorda inlägg.</p>
    <article class="blogArticle userPost">
        <div class="in-btn-wrapper">
            <button onclick="" id="btn-red" class="btn btn2 btn3">Redigera inlägg</button>
            <button onclick="" id="btn-del" class="btn btn2 btn3">Radera inlägg</button>
        </div>

        <div class="userflex-article">
            <div class="left-side-blog">
                <h2 class="blog-title">Kycklingspett</h2>
                <picture class="blogImg">
                    <source type="image/webp" srcset="images/kycklingspett.webp">
                    <source type="image/jpg" srcset="images/kycklingspett.jpg">
                    <img class="blogImages" src="images/kycklingspett.jpg" alt="Bild på maträtt">
                </picture>

                <!-- Div with info about when it was created and by who-->
                <div class="createdBlog">
                    <p class="pCreated">Skapad av: <span class="spanCreated">Björn Edin</span></p>
                    <p class="pCreated pdate"><span>2020-08-01 18:21</span></p>
                </div>
                <p class="blogText">En mycket god maträtt att göra, ganska enkelt samt hyffsat
                    nyttigt.<br>
                    Så frågan är har du råd att äta kyckling eller skall du föda upp egna kycklingar på
                    balkongen?<br><br>
                </p>
                <h3>Gör så här: </h3>
                <p class="blogText">
                    Lägg ca två grillspett av trä per person i blöt. Skär kycklingköttet i ca 2 cm stora
                    bitar.
                    Marinad: Blanda soja, kryddor och chilisås i en stor bunke. Lägg ner kycklingen och
                    se till att
                    alla bitar får marinad på sig.<br><br>
                    Sätt ugnen på 250°C grill.
                    Trä kycklingbitarna på spetten. Lägg dem på två bakpappersklädda plåtar. Pensla runt
                    om med olja
                    och strö över salt.<br><br>
                    Sätt in en plåt åt gången högst upp i ugnen och grilla spetten 10–15 minuter. (Kan
                    förberedas
                    hit.)
                </p>
            </div>
            <div class="right-side-blog">
                <h3>Ingredienser</h3>
                <form method="POST">
                    <label for="portions">Antalet portioner:</label><br>
                    <input type="number" class="portions" name="portions" min="1" max="20">
                    <input type="submit" class="btn" value="Välj">
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th class="wide"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2</td>
                            <td>dl</td>
                            <td>Grädde</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>krm</td>
                            <td>Svartpeppar</td>
                        </tr>
                        <tr>
                            <td>250</td>
                            <td>gram</td>
                            <td>Champinjoner</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </article>
</section>
<?php
include('includes/footer.php');
?>