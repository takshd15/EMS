<!DOCTYPE html>
<html>
<head>
	<title>Employee Registration</title>
	<style>
			body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			margin: 0;
			padding: 0;
		}
 
	nav {
		background-color: #333;
		height: 100vh;
		width: 200px;
		position: fixed;
		top: 0;
		left: 0;
		overflow-x: hidden;
		padding-top: 20px;
	}

	nav a {
		display: block;
		color: #f2f2f2;
		padding: 15px;
		text-decoration: none;
		font-size: 18px;
		border-bottom: 1px solid #f2f2f2;
	}

	nav a:hover {
		background-color: #ddd;
		color: black;
	}

	.main {
		margin-left: 200px;
		padding: 20px;
	}

	h1 {
		color: #444444;
		margin-top: 50px;
		margin-bottom: 30px;
		text-align: center;
	}

	h2 {
		color: #444444;
		margin-top: 50px;
		margin-bottom: 30px;
	}

	table {
		border-collapse: collapse;
		width: 100%;
	}

	th, td {
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #f2f2f2;
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
	<nav>
	<nav>
	<a href="admin_portal.php">Employee Information</a>
	<a href="employee_registration.php" class="active">Employee Registration</a>
	<a href="leave_status.php">Leave Status</a>
	<a href="task_assign.php">Task Assign</a>
	<a href="task_progress.php">Task progress</a>
	<a href="logout.php">Logout</a>
</nav>

	</nav>

</style>
</head>
<body>
		<h1>Employee Registration</h1>

		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

		<label for="ename">Name:</label>
		<input type="text" id="ename" name="ename"><br><br>
		
		<label for="email">Email:</label>
		<input type="email" id="email" name="email"><br><br>
		
		<label for="empid">Employee ID:</label>
		<input type="text" id="empid" name="empid"><br><br>
		
		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br><br>
		
		<label for="phoneno">Phone No:</label>
		<input type="text" id="phoneno" name="phoneno"><br><br>
		
		<label for="dob">Date of Birth:</label>
		<input type="date" id="dob" name="dob"><br><br>
		
		<label for="regd">Registration Date:</label>
		<input type="date" id="regd" name="regd"><br><br>
		
		<label for="empstatus">Employee Status:</label>
		<input type="text" id="empstatus" name="empstatus"><br><br>
		
		<label for="desig">Designation:</label>
		<input type="text" id="desig" name="desig"><br><br>
		
		<label for="totalleave">Total Leave:</label>
		<input type="number" id="totalleave" name="totalleave"><br><br>
		
		<label for="salary">Salary:</label>
		<input type="number" id="salary" name="salary"><br><br>
		
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	$conn = mysqli_connect("localhost", "root", "", "databasedictionary");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$ename = $_POST['ename'];
	$email = $_POST['email'];
	$empid = $_POST['empid'];
	$password = $_POST['password'];
	$phoneno = $_POST['phoneno'];
	$dob = $_POST['dob'];
	$regd = $_POST['regd'];
	$empstatus = $_POST['empstatus'];
	$desig = $_POST['desig'];
	$totalleave = $_POST['totalleave'];
	$salary = $_POST['salary'];

	$sql = "INSERT INTO employee (ename, email, empid, password, phoneno, dob, regd, empstatus, desig, totalleave, salary)
	VALUES ('$ename', '$email', '$empid', '$password', '$phoneno', '$dob', '$regd', '$empstatus', '$desig', '$totalleave', '$salary')";

	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}






