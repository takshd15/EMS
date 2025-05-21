<!DOCTYPE html>
<html>
<head>
	<title>Admin Portal</title>
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
		<a href="#admin_portal.php" class="active">Employee Information</a>
		<a href="employee_registration.php">Employee Registration</a>
		<a href="leave_status.php">Leave Status</a>
		<a href="task_assign.php">Task Assign</a>
		<a href="task_progress.php">Task progress</a>
		<a href="logout.php">Logout</a>
	</nav>
	<div class="main">
		<h1>Employee Management System</h1>
		<h2>Employee Information</h2>
		<p>Here you can view and edit employee information.</p>
		<table>
			<thead>
				<tr>
					<th>Employee ID</th>
					<th>Employee Name</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th>Total Leave</th>
					<th>Salary</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$servername = "localhost"; 
					$username = "root"; 
					$password = ""; 
					$dbname = "DatabaseDictionary";  
					
					$conn = mysqli_connect($servername, $username, $password, $dbname);

					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}

					$sql = "SELECT empid, ename, email, phoneno, totalleave, salary FROM employee";
					$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["empid"] . "</td>";
        echo "<td>" . $row["ename"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phoneno"] . "</td>";
        echo "<td>" . $row["totalleave"] . "</td>";
        echo "<td>" . $row["salary"] . "</td>";
        echo "<td><a href='update_employee.php?empid=" . $row["empid"] . "'>Edit</a></td>";
        echo "<td><a href='delete_employee.php?empid=" . $row["empid"] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>0 results</td></tr>";
}



					