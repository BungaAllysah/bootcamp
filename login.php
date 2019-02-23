<?php
session_start();
require_once 'conn.php';

if (isset($_SESSION["id"])) {
	header("Location: http://localhost/bootcamp1/index.php");
}
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password']; 
	$sql = "SELECT * FROM `users` WHERE `email` = '$email' && `password` = '$password'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $_SESSION["id"] = $row['id'];
	    }

	    header('Location: http://localhost/bootcamp1/index.php');
	} else {
	    header('Location: http://localhost/bootcamp1/login.php');
	}
		$conn->close();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-4 offset-md-4">
			<form method="post">
				<div class="form-group">
					<div class="col-12">
						<label>E-mail</label>
					</div>
					<div class="col-12">
						<input type="text" name="email">
					</div>
				</div>

				<div class="form-group">
					<div class="col-12">
						<label>Password</label>
					</div>
					<div class="col-12">
						<input type="password" name="password">
					</div>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="submit">
				</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>