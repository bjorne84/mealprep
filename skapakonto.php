<?php
$page_title = "skapa konto på mealprep";
include('includes/header.php');
?>
<div class="mainWrapp">
    <div class="showBlogs">
        <div class="white-back">
            <div class="formWrapper">
                <h2>Bli medlem!</h2>
                <p>Starta en receptblogg och dela med dig av dina bästa recept.</p>
                <form class="forms" id="formCreate" action=""<?php echo $_SERVER['PHP_SELF'] ?> method="POST">
                    <!--fält för formulär, hela den grå delen-->
                    <fieldset id="field">
                        <p class="pfield">Du måste fylla i alla fält markerade med en asterix *
                            (stjärna)</p>
                        <label for="foreName">Förnamn:</label><br>
                        <input type="text" name="foreName" id="foreName" class="input">
                        <br>
                        <label for="surname">Efternamn:</label><br>
                        <input type="text" name="surename" id="surename" class="input">
                        <br>
                        <label for="email">* E-postadress:</label><br>
                        <input type="email" name="email" id="email" class="input" required>
                        <br>
                        <label for="userName">* Välj ett användarnamn/alias:</label><br>
                        <input type="text" name="userName" id="userName" class="input" required><br>
                        <label for="password">* Välj ett lösenord (minst 6 tecken långt):</label><br>
                        <input type="text" name="password" id="password" class="input" required><br>
                        <label for="passwordRepeat">* Upprepa lösenord:</label><br>
                        <input type="text" name="passwordRepeat" id="passwordRepeat" class="input" required><br>
                        <input type="checkbox" name="checkbox" required><label for="checkbox">
                            Jag godkänner att ovanstående uppgifter lagras i syfte för
                            inloggning.</label><br>
                        <button type="submit" id="btn-create" class="btn">Skapa användare</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <!--Include aside.php before last div-->
    <?php
    include('includes/aside.php');
    ?>
</div>
<?php
include('includes/footer.php');
?>