<?php
session_start();
	$title = 'Login';
	$currentPage = 'login';
	include('header.php'); 
	include('navigationBar.php');
	include("connection.php");
    include("functions.php");

	if(isset($_POST['loginButton'])) {
		$username = sanitizeInput($_POST["username"]);
		$password = sanitizeInput($_POST["password"]);

		if(empty($username)) {
			echo "<h3 class = 'text-center'>Please enter a username.</h3>";
		} else if (empty($password)) {
			echo "<h3 class = 'text-center'>Please enter a password.</h3>";
		} else {
			//read
			$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$result = $stmt->get_result();
			$data = $result->fetch_assoc();
			if ($result->num_rows > 0 && password_verify($password, $data["password"])) {
				$_SESSION["username"] = $data["username"];
				header("Location: account.php");
			} else {
				echo "<h3 class = 'text-center'>Incorrect username or password.</h3>";
			}
			$stmt->close();
			$conn->close();
		}
	}
	
?>
<body>
	<div class = "container-fluid text-center accountDatabase interactive">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<div class = "form-group">
				<label for="username">Username: </label>
				<input type="text" class="form-control" name="username" required><br>
			</div>
			<div class = "form-group">
				<label for="password">Password: </label>
				<input type="password" class="form-control" name="password" required><br>
			</div>
			<input type="submit" class = "btn btn-default btn-lg" value="Login" name = "loginButton">
		</form>
	</div>
	<?php
		include('footer.php');
	?>
</body>
</html>