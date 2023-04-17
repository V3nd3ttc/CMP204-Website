<?php 
	session_start();
	$title = 'Sign-Up';
	$currentPage = 'signup';
	include('header.php');
	include('navigationBar.php');
	include("connection.php");
	include("functions.php");

	if(isset($_POST['signUpButton'])) {
		$email = sanitizeInput($_POST["email"]);
		$username = sanitizeInput($_POST["username"]);
		$password = sanitizeInput($_POST["password"]);

		//Check if username and password fields are not empty
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){	
			if(empty($username)) {
				echo "<h3 class = 'text-center'>Please enter a username.</h3>";
			} else if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
				echo "<h3 class = 'text-center'>Username can only contain letters, numbers and underscores.</h3>";
			} else {
				//Check if username is already taken
				$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
				$stmt->bind_param("s", $username);
				if ($stmt->execute()){
					$stmt->store_result();
					//If username is already taken
					if($stmt->num_rows == 1) {
						echo "<h3 class = 'text-center'>This username is already taken.</h3>";
					//If username is available
					} else if (strlen($password) < 5) {
						echo "<h3 class = 'text-center'>The password need to be atleast 5 characters long.</h3>";
						//Insert username and password into the database
					} else {
						//SECURE PASSWORD HASH
						$hash = password_hash($password, PASSWORD_DEFAULT);
						$stmt = $conn->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
						$stmt->bind_param("sss", $email, $username, $hash);
						if ($stmt->execute()){
							header("Location: login.php");
						} else {
							echo "<h3 class = 'text-center'>Error. Please try again later.</h3>";
						}
					}	
				} else {
					echo "<h3 class = 'text-center'>Error. Please try again later.</h3>";
				}
				$stmt->close();
				$conn->close();
			}
		} else {
			echo "<h3 class = 'text-center'>Please enter a valid email";
		}
	}	
?>
<body>
	<div class = "container-fluid text-center accountDatabase interactive">
		<form action = 	"<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<div class = "form-group">
				<label for="email">Email: </label>
				<input type="text" class="form-control" name="email" required ><br>
			</div>
			<div class = "form-group">
				<label for="username">Username: </label>
				<input type="text" class="form-control" name="username" required ><br>
			</div>
			<div class = "form-group">
				<label for="password">Password: </label>
				<input type="password" class="form-control" name="password" minlength="5" required><br>
			</div>
			<input type="submit" class = "btn btn-default btn-lg" value="Sign up" name = "signUpButton">
		</form>
	</div>
	<?php
		include('footer.php');
	?>
</body>
</html>