<?php
include('includes/header.php');
?>
<h1 id="topElement">Recept att preppa frysen med!</h1>
<div class="mainWrapp">
    <div class="showBlogs">
        <article class="blogArticle">
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
                    <p class="pCreated pdate"><span>2020-08-01: 18:21</span></p>
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
                    se till
                    att
                    alla bitar får marinad på sig.<br><br>
                    Sätt ugnen på 250°C grill.
                    Trä kycklingbitarna på spetten. Lägg dem på två bakpappersklädda plåtar. Pensla runt
                    om med
                    olja
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
                    <input type="number" class="portions" name="portions" id="portions" min="1" max="20">
                    <button type="submit" class="btn btn2">Välj</button>
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
        </article>
        <article class="blogArticle">
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
                    <p class="pCreated pdate"><span>2020-08-01: 18:21</span></p>
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
                    se till
                    att
                    alla bitar får marinad på sig.<br><br>
                    Sätt ugnen på 250°C grill.
                    Trä kycklingbitarna på spetten. Lägg dem på två bakpappersklädda plåtar. Pensla runt
                    om med
                    olja
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
                    <button type="submit" class="btn btn2">Välj</button>
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
        </article>
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