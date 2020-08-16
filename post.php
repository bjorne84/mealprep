<?php
$page_title = "Skapa och publicera recept";
include('includes/header.php');
?>
<div id="account">
    <h1 class="h1-left">Skapa recept</h1>
    <form class="forms" id="formCreate" method="POST">
        <!--fält för formulär, hela den grå delen-->
        <fieldset id="field">
            <p class="pfield"></p>
            <label for="headLine">Namn på recept</label><br>
            <input type="text" name="headLine" id="headLine" class="input" placeholder="Obligatoriskt" required><br>
            <label for="blogPost">Kort beskrivning:</label><br>
            <textarea id="blogPost" class="textArea" name="blogPost" cols="30" rows="4" placeholder="Beskriv kortfattat maträtten, är den lätt-lagad eller mer avancerad?"></textarea>
            <br>
            <label for="blogPostHow">Gör så här:</label><br>
            <textarea id="blogPostHow" class="textArea" name="blogPostHow" cols="30" rows="4" placeholder="Beskriv hur man tillagar den, gärna stegvis och tydligt..."></textarea>
            <br>
            <div class="ingDiv">
                <label for="port">Antal portioner:</label><br>
                <input type="number" name="port" id="port" class="input max" value="2" min="1" max="20"><br>
                <h3 class="h3form">Lägg till ingredienser:</h3>
                <input type="number" name="ingrNum" id="ingrNum" class="input max" value="1" min="1">
                <select class="max">
                    <option value="ml">ml</option>
                    <option value="cl">cl</option>
                    <option value="dl">dl</option>
                    <option value="liter">liter</option>
                    <option value="liter">krm</option>
                    <option value="liter">tesked</option>
                    <option value="liter">matsked</option>
                    <option value="gram">gram</option>
                    <option value="kilo">kilo</option>
                </select>
                <input type="text" name="ingr" id="ingr" class="input" placeholder="Lägg till ingrediens"><br>
                <button type="submit" id="btn-ingr" class="btn btn2 btn-ingr">+ Fler fält</button>
            </div>
            <br>
            <label for="foodImg">Ladda upp bild på maträtten (png, jpeg, gif eller i webp-format).
                Bild är
                frivilligt.</label><br>
            <input type="file" id="foodImg" name="foodImg" accept="image/png, image/jpeg, image/gif, image/webp">
            <div class="btn-wrapper">
                <button type="submit" id="btn-create" class="btn btn2">Publicera</button>
                <button type="reset" id="btn-reset" class="btn btn2 btn-reset">Radera fält</button>
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