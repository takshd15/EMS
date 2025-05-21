<!DOCTYPE html>
<html>
<head>
    <title>Assign Task</title>
</head>
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
<body>
    <h1>Assign Task</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="email">Employee Email:</label>
        <input type="text" name="email" id="email"><br><br>
        <label for="design">Designation:</label>
        <input type="text" name="design" id="design"><br><br>
        <label for="task">Task:</label>
        <input type="text" name="task" id="task"><br><br>
        <input type="submit" name="assign" value="Assign">
    </form>
</body>
</html>

<head>
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
</head>



<?php
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "DatabaseDictionary"; 

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST['assign'])){
        $email = $_POST['email'];
        $design = $_POST['design'];
        $task = $_POST['task'];
        
        // Check if the email exists in the employee table
        $sql = "SELECT empid FROM employee WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Email exists, get the employee ID
            $row = mysqli_fetch_assoc($result);
            $empid = $row['empid'];

            $sql = "INSERT INTO work (empid, design, task, wstatus, status) VALUES ('$empid', '$design', '$task', 'Assigned', 'Incomplete')";

            if (mysqli_query($conn, $sql)) {
                echo "Task assigned successfully";
            } else {
                echo "Error assigning task: " . mysqli_error($conn);
            }
        } else {
            echo "Error: No employee with that email address found";
        }
    }

    mysqli_close($conn);
?>
