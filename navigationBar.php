<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img src="./images/DaftPunk.png" height="80"></img>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <?php
                //IMPROVED USING FOR EACH
                $pageLeft =  array("Home" => "index", "Songs" => "songs", "Account" => "account");
                $pageRight = array("signup", "login");
                echo "<ul class='nav navbar-nav'>";
                foreach ($pageLeft as $name => $address) {
                    echo '<li '.(($currentPage === $address) ? ' class="active" ': '').'><a href="'.$address.'.php">'.$name.'</a></li>';
                }
                echo "</ul>";
                echo "<ul class='nav navbar-nav navbar-right'>";
                if ($currentPage === "signup") {
                    echo "<li class = 'active'><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign-Up</a></li>";
                    echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                } else if ($currentPage === "login") {
                    echo "<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign-Up</a></li>";
                    echo "<li class = 'active'><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                } else {
                    echo "<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign-Up</a></li>";
                    echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                }
                echo "</ul>";
            ?>
        </div>
    </div>
</nav>