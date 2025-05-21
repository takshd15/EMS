<!DOCTYPE html>
<html>
<head>
	<title>Employee Management System - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}

		h1 {
			color: #444444;
			margin-top: 50px;
			margin-bottom: 30px;
			text-align: center;
		}

		form {
			max-width: 500px;
			margin: 0 auto;
			background-color: #ffffff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px #c4c4c4;
		}

		label {
			display: block;
			margin-bottom: 8px;
			color: #555555;
			font-size: 16px;
			font-weight: bold;
		}

		input[type=text], input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
			background-color: #f2f2f2;
		}

		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			margin-top: 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
		}

		input[type=submit]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
	<h1>Employee Management System - Login</h1>
	<form method="post" action="login.php">
		<label for="username">Username:</label>
		<input type="text" name="username" id="username">
		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
		<input type="submit" value="Login">
	</form>
</body>
</html>
<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get the input values
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Connect to the database
  $conn = mysqli_connect('localhost', 'root', '', 'databasedictionary');

  // Check the connection
  if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
  }

  // Check if the user is an employee
  $query = "SELECT * FROM employee WHERE email='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    // Set the session variable
    $_SESSION['username'] = $username;

    // Redirect to the employee portal
    header('Location: employee_portal.php');
    exit();
  }

  // Check if the user is an admin
  $query = "SELECT * FROM admin WHERE adminmail='$username' AND adminpass='$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    // Set the session variable
    $_SESSION['username'] = $username;

    // Redirect to the admin portal
    header('Location: admin_portal.php');
    exit();
  }

  // Close the database connection
  mysqli_close($conn);

  // Display an error message and reload the page
  echo '<script>alert("Incorrect username or password."); window.location.href = "login.php";</script>';
}
?>


