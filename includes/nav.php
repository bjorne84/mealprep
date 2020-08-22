<nav class="nav">
    <ul id="menu">
        <li class="li"><a class="menuText" href="index.php">Start</a></li>
        <?php if(!isset($_SESSION['user_id'])) : ?>
        <li class="li"><a class="menuText" href="skapakonto.php">Skapa konto</a></li>
        <?php endif; ?>
        <li class="li">
            <?php if(isset($_SESSION['user_id'])) : ?>
                <a class="menuText" href="logga-ut.php">Logga ut</a>
            <?php else : ?>
                <a class="menuText" href="logga-in.php">Logga in</a>
            <?php endif; ?>
        </li>
        <?php if(isset($_SESSION['user_id'])) : ?>
        <li class="li"><a class="menuText" href="post.php">Skapa recept</a></li>
        <li class="li"><a class="menuText" href="post.php">Din sida</a></li>
        <?php endif; ?>
        <!-- # är för att länka till en viss plats på sidan, tror detta skall bort
        <li class="li"><a class="menuText" href="start.html#aside">Bloggare</a></li>-->
    </ul>
</nav>