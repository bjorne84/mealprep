<?php
$page_title = "skapa konto på mealprep";
include('includes/header.php');
?>

<?php
// check if form has ben sent and then start validate data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userCheck = new CreateUserController;
    $error = $userCheck->registerUser();
    echo $error;
}
$testet = new Test;
$tastare = $testet->returtest();

?>
<div class="mainWrapp">
    <div class="showBlogs">
        <div class="white-back">
            <div class="formWrapper">
                <h2>Bli medlem!</h2>

                <?php echo $tastare;?>
                <p>Starta en receptblogg och dela med dig av dina bästa recept.</p>
                <form class="forms" id="formCreate" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <!--fält för formulär, hela den grå delen-->
                    <fieldset id="field">
                        <p class="pfield">Du måste fylla i alla fält markerade med en asterix *
                            (stjärna)</p>
                         <p class="errorTxt"><?php echo $error['message']?></p>   
                        <label for="forName">Förnamn:</label><br>
                        <input type="text" name="forName" id="forName" value="<?php echo $error['forName'] ?? "" ?>" class="input">
                        <br>
                        <label for="surname">Efternamn:</label><br>
                        <input type="text" name="surName" id="surename" class="input" value="<?php echo $error['surName'] ?>">
                        <br>
                        <label for="email">* E-postadress:</label><br>
                        <input type="email" name="email" id="email" class="input" value="<?php echo $error['email']?>">
                        <br>
                        <span></span>
                        <label for="userName">* Välj ett användarnamn/alias:</label><br>
                        <input type="text" name="userName" id="userName" class="input" value="<?php echo $error['userName']?>" required><br>
                        <label for="password">* Välj ett lösenord (minst 6 tecken långt):</label><br>
                        <input type="password" name="password" id="password" class="input" required><br>
                        <label for="passwordRepeat">* Upprepa lösenord:</label><br>
                        <input type="password" name="passwordRepeat" id="passwordRepeat" class="input" required><br>
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