<footer class="navbar navbar-inverse navbar-fixed-bottom">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myFooter">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myFooter">
            <?php
                //IMPROVED USING FOR EACH
                echo "<ul class='nav navbar-nav'>";
                if ($currentPage === "cookies") {
                    echo '<li class="active"><a href="cookies.php">Cookies</a></li>';
                } else {
                    echo '<li><a href="cookies.php">Cookies</a></li>';
                }
                echo "</ul>";
                echo "<ul class='nav navbar-nav navbar-right'>";
                if ($currentPage === "req") {
                    echo '<li class="active"><a href="req.html">re</a></li>';
                } else {
                    echo '<li><a href="req.html">Requirements</a></li>';
                }
                echo "</ul>";
            ?>
        </div>
    </div>
</footer>