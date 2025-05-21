<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'databasedictionary');

// Check the connection
if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Retrieve data from the 'vc' table
$query = "SELECT reason, date_start, date_end, status, emp_name, emp_id FROM vc";
$result = mysqli_query($conn, $query);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Reason</th><th>Start Date</th><th>End Date</th><th>Status</th><th>Employee Name</th><th>Employee ID</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["reason"]."</td><td>".$row["date_start"]."</td><td>".$row["date_end"]."</td><td>".$row["status"]."</td><td>".$row["emp_name"]."</td><td>".$row["emp_id"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee Portal</title>
</head>
<body>
	<h1>Leave Status</h1>
</body>
</html>

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
		<a href="leave_status_emp.php" class="active">Leave Status</a>
		<a href="viewtasks.php">View Task</a>
    	<a href="logout.php">Logout</a>
	</nav>
</body>
</html>


