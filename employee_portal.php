<!DOCTYPE html>
<html>
<head>
	<title>Employee Portal</title>
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
		background-color: #ffffff;
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
		background-color: #ffffff;
		border-radius: 10px;
		box-shadow: 0px 0px 10px #c4c4c4;
	}

	th, td {
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #f2f2f2;
	}
</style>
</head>
<body>
<nav>
	<a href="employee_portal.php">Employee Information</a>
	<a href="applyleave.php">Apply for Leave</a>
	<a href="leave_status_emp.php">Leave Status</a>
	<a href="viewtasks.php" class="active">View Task</a>
    <a href="logout.php"> logout</a>

</nav> 

<div class="main">
	<h1>Employee Information</h1>
	<table>
		<thead>
			<tr>
				<th>Emp ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Password</th>
				<th>Phone No.</th>
				<th>DOB</th>
				<th>Registration Date</th>
				<th>Employee Status</th>
				<th>Designation</th>
				<th>Total Leave</th>
				<th>Salary</th>
			</tr>

			<?php
				$servername = "localhost"; 
				$username = "root"; 
				$password = ""; 
				$dbname = "DatabaseDictionary"; 

				$conn = mysqli_connect($servername, $username, $password, $dbname);

				if (!$conn) {
				    die("Connection failed: " . mysqli_connect_error());
				}

				$sql = "SELECT * FROM employee";
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
				    while($row = mysqli_fetch_assoc($result)) {
				        echo "<tr><td>" . $row["empid"]. "</td><td>" . $row["ename"]. "</td><td>" . $row["email"]. "</td><td>" . $row["password"]. "</td><td>" . $row["phoneno"]. "</td><td>" . $row["dob"]. "</td><td>" . $row["regd"]. "</td><td>" . $row["empstatus"]. "</td><td>" . $row["desig"]. "</td><td>" . $row["totalleave"]. "</td><td>" . $row["salary"]. "</td></tr>";
				    }
				} else {
				    echo "0 results";
				}

				mysqli_close($conn);
			?>
		</tbody>
	</table>
</body>
</html>
