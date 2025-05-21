<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "databasedictionary";
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST["emp_id"];
    $emp_name = $_POST["emp_name"];
    $reason = $_POST["reason"];
    $date_start = $_POST["date_start"];
    $date_end = $_POST["date_end"];
    $status = "Pending";
    
    $sql = "INSERT INTO vc (emp_id, emp_name, reason, date_start, date_end, status) 
            VALUES ('$emp_id', '$emp_name', '$reason', '$date_start', '$date_end', '$status')";
    if (mysqli_query($conn, $sql)) {
        echo "Leave application submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Apply Leave</title>
</head>
<body>
	<h2>Apply for Leave</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="emp_id">Employee ID:</label>
		<input type="text" name="emp_id" required><br><br>
		<label for="emp_name">Employee Name:</label>
		<input type="text" name="emp_name" required><br><br>
		<label for="reason">Reason:</label>
		<input type="text" name="reason" required><br><br>
		<label for="date_start">Start Date:</label>
		<input type="date" name="date_start" required><br><br>
		<label for="date_end">End Date:</label>
		<input type="date" name="date_end" required><br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
<style>
form {
	display: flex;
	flex-direction: column;
	align-items: center;
	margin: 50px auto;
	border: 1px solid #ccc;
	padding: 20px;
	border-radius: 5px;
	box-shadow: 0 2px 5px rgba(0,0,0,0.3);
	width: 400px;
	background-color: #f5f5f5;
}
h2 {
  text-align: center;
}

label {
	display: inline-block;
	margin-bottom: 10px;
}

input[type="text"], input[type="date"] {
	padding: 8px;
	border-radius: 5px;
	border: 1px solid #ccc;
	margin-bottom: 20px;
	width: 100%;
	box-sizing: border-box;
}

input[type="submit"] {
	background-color: #4CAF50;
	color: white;
	padding: 12px 20px;
	border: none;
	border-radius: 5px;
	cursor: pointer;
	margin-top: 20px;
}

input[type="submit"]:hover {
	background-color: #45a049;
}

body {
	font-family: Arial, sans-serif;
	background-color: #f2f2f2;
	margin: 0;
	padding: 0;
}

.container {
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
}

.main {
	width: 80%;
	margin: 0 auto;
	padding: 20px;
	background-color: #ffffff;
	border-radius: 10px;
	box-shadow: 0px 0px 10px #c4c4c4;
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


<?php
// Close database connection
mysqli_close($conn);
?>
