<?php

use app\core\Session;
use app\core\View;

View::renderPartial("header", $params);

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($title === "Home Page") {
                                            echo "active";
                                        } ?>" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($title === "Contact Page") {
                                            echo "active";
                                        } ?>" href="/contact">Contact</a>
                </li>
                <?php if (!Session::isLoggedIn()) : ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title === "Register Page") {
                                                echo "active";
                                            } ?>" href="/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title === "Login Page") {
                                                echo "active";
                                            } ?>" href="/login">Login</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title === "Profile Page") {
                                                echo "active";
                                            } ?>" href="/profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="m-4">
    [content]
</div>
<?php

View::renderPartial("footer", $params);

?>