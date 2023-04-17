<?php
    session_start();
    $title = 'Account';
    $currentPage = 'account';
    include('header.php');
    include("navigationBar.php");
    include("connection.php");
    include("functions.php");
    
    $data = check_login($conn);
    //CHANGE USERNAME
    if(isset($_POST['changeUsernameButton'])) {
		$usernameNew = sanitizeInput($_POST["usernameNew"]);
        $password = sanitizeInput($_POST["password"]);
        $hash = password_hash($password, PASSWORD_DEFAULT);

        if(empty($usernameNew)) {
            alert("Please enter new username");
        } else if (empty($password)) {
            alert("Please enter password");
        } else {
            //read
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
            $stmt->bind_param("s", $_SESSION['username']);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            if ($result->num_rows > 0 && password_verify($password, $data["password"])) {
                $stmt->close();
                $stmt = $conn->prepare("UPDATE users SET username = ? WHERE username = ?"); 
                $stmt->bind_param("ss", $usernameNew, $data["username"]);
                if ($stmt->execute()) {
                    $_SESSION["username"] = $usernameNew;
                    header("Location: account.php");
                } else {
                    alert("Error");
                }
            } else {
                alert("Incorrect password");
            }
            $stmt->close();
            $conn->close();
        }
    //CHANGE PASSWORD
    } else if (isset($_POST['changePasswordButton'])) {
        $password = sanitizeInput($_POST["password"]);
        $passwordNew = sanitizeInput($_POST["passwordNew"]);

        if(empty($password)) {
            alert("Please enter old password");
        } else if (empty($passwordNew)) {
            alert("Please enter new password");
        } else {
            //read
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
            $stmt->bind_param("s", $_SESSION['username']);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            if ($result->num_rows > 0 && password_verify($password, $data["password"])) {
                $stmt->close();
                //Check length if password
                if (strlen($passwordNew) < 5) {
                    alert("The password need to be atleast 5 characters long");
                //Insert NEW password into the database
                } else {
                    $hash = password_hash($passwordNew, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?"); 
                    $stmt->bind_param("ss", $hash, $data["username"]);
                    if ($stmt->execute()) {
                        header("Location: account.php");
                    } else {
                        alert("Error");
                    }
                }	
                
            } else {
                alert("Incorrect password");
            }
            $stmt->close();
            $conn->close();
        }
    //DELETE ACCOUNT
    } else if (isset($_POST['deleteAccountButton'])) {
        $password = sanitizeInput($_POST["password"]);

        if(!empty($password)) {
            //read
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
            $stmt->bind_param("s", $_SESSION['username']);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            if ($result->num_rows > 0 && password_verify($password, $data["password"])) {
                $stmt = $conn->prepare("DELETE FROM users WHERE username = ?");
                $stmt->bind_param("s", $data["username"]);
                if ($stmt->execute()) {
                    header("Location: index.php");
                    unset($_SESSION['username']);
                } else {
                    alert("Error");
                }
            } else {
                alert("Incorrect password");
            }
            $stmt->close();
            $conn->close();
        } 
        else {
            alert("Enter password!");
        }
    }
?>
<body>            
    </div>
    <div class="container-fluid text-center">    
        <div class="row">
            <div class="col-sm-4">
                <div class="jumbotron interactive">
                    <div class="container text-left">
                        <h1>Welcome to the account page, <?php echo $_SESSION["username"]?></h1>     
                        <p>Here you can change your username, password, profile picture or delete your account</p>
                        <form action="logout.php">
                            <input type="submit" class = "btn btn-default btn-lg" value="Log Out">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="jumbotron interactive">
                    <div class="container text-center">
                        <h1>Profile Pictures</h1>     
                        <p>Change your profile picture by clicking the button bellow</p>
                        <!-- Images taken from https://www.behance.net/gallery/8739617/Daft-Punk-Tribute, https://static.ra.co/images/profiles/lg/daftpunk.jpg?dateUpdated=1598391379000 -->
                        <img src="./images/1.jpg" id = "profilePicture" height = "100px" width = "100px">
                        <button type="submit" class = "btn btn-default btn-lg" id = "pictureButton">Change</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="jumbotron interactive">
                    <div class="container text-justify">
                        <h1>Help Section</h1>  
                        <p>Click this button to display the help text</p>   
                        <div id = "help">

                        </div>
                        <button type="submit" class = "btn btn-default btn-lg" id = "helpButton">Help</button>
                    </div>
                </div>
            </div>
        </div>
            <h2>Account settings</h3>
            <hr>
        </div>
        
        <div class="row">
            <div class="col-sm-4 accountSettings interactive">
                <p>Change username</p>
                <p id = "changeUsernameError"></p>
                <hr>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class = "form-group">
                        <label for="usernameNew">New username: </label>
                        <input type="text" class="form-control" name="usernameNew" required><br>
                    </div>
                    <div class = "form-group">
                        <label for="password">Password: </label>
                        <input type="password" class="form-control" name="password" required><br>
                    </div>
                    <input type="submit" class = "btn btn-default" value="Change username" name = "changeUsernameButton">
                </form>
            </div>
            <div class="col-sm-4 accountSettings interactive">
                <p>Change password</p>
                <hr>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class = "form-group">
                        <label for="password">Old password: </label>
                        <input type="password" class="form-control" name="password" required><br>
                    </div>
                    <div class = "form-group">
                        <label for="passwordNew">New password: </label>
                        <input type="password" class="form-control" name="passwordNew" required><br> 
                    </div>
                    <input type="submit" class = "btn btn-default" value="Change password" name = "changePasswordButton">
                </form>
            </div>
            <div class="col-sm-4 accountSettings interactive"> 
                <p>Delete Account</p>
                <hr>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" method="post">
                    <div class = "form-group">
                        <label for="password">Password: </label>
                        <input type="password" class="form-control" name="password" required><br>
                    </div>
                    <input type="submit" class = "btn btn-default" value="Delete" name = "deleteAccountButton">
                </form>
            </div>
        </div>
    </div><br>
    <?php
        include('footer.php');
    ?>   
</body>
</html>



