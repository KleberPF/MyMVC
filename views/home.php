<h1 id="header">Home Page</h1>
<?php

use app\core\Session;

if (Session::isLoggedIn()) : ?>
    <h4>Logged in as <?php echo $_SESSION["username"] ?? "" ?></h4>
<?php endif; ?>