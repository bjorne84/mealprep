<?php
$page_title = "logga in";
include('includes/header.php');
?>
<?php
// check if form has ben sent and then start validate data ($_SERVER['REQUEST_METHOD'] == 'POST')
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $logInCheck = new LoginContoller;
    $log = $logInCheck->logIn();
    var_dump($log);
    }
?>
<h1 class="h1-left">Logga in!</h1>
<div class="mainWrapp">
    <div class="showBlogs">
        <div class="white-back">
            <div class="formWrapper">
                <form class="forms" id="formCreate" method="POST">
                    <!--fält för formulär, hela den grå delen-->
                    <fieldset id="field">
                        <p class="pfield"></p>
                        <label for="userName">Användarnamn:</label><br>
                        <input type="text" name="userName" id="userName" class="input" required><br>
                        <label for="password">Lösenord:</label><br>
                        <input type="text" name="password" id="password" class="input" required><br>
                        <button type="submit" id="btn-create" class="btn">Logga in</button>
                        <a class="afield" href="">Glömt lösenordet?</a>
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