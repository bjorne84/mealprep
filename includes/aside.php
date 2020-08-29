<aside id="aside">
    <article class="sideArticle">
        <h2 class="colorh2">Bloggare</h2>
        <ul class="aside-ul">
            <?php
            $TheUsers = new GetPostController;
            $users = $TheUsers->getAllUsers();
            foreach ($users as $user) {
            ?>
            <li class="dark-li"><a href="profile.php?id=<?php echo $user['User_ID'] ?>"><?php echo $user['Username'] ?></a></li>
            <?php }?>
        </ul>
    </article>
</aside>