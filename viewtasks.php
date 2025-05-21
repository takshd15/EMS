<!DOCTYPE html>
<html>
<head>
    <title>View Tasks</title>
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
            margin: 0 auto;
            width: 50%;
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

        form {
            margin: 0 auto;
            width: 50%;
        }
    </style>
</head>
<body>
    <h1>View Tasks</h1>
    <table>
        <tr>
            <th>Designation</th>
            <th>Task</th>
            <th>Complete</th>
        </tr>
<body>
<nav>
	<a href="employee_portal.php">Employee Information</a>
	<a href="applyleave.php">Apply for Leave</a>
	<a href="leave_status_emp.php">Leave Status</a>
	<a href="viewtasks.php" class="active">View Task</a>
    <a href="logout.php"> logout</a>

</nav> 

        <?php
    $servername = "localhost";
    $username = "root"; 
    $password = "";
    $dbname = "DatabaseDictionary"; 

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if a 'submit' button was clicked
    if(isset($_POST['submit'])) {
        $workid = $_POST['workid'];
        // Update the status column to 'complete' for the row with the clicked button
        $query = "UPDATE work SET status='complete' WHERE workid='$workid'";
        if(mysqli_query($conn, $query)) {
            echo "Task $workid has been completed!<br>";
        } else {
            echo "Error updating task $workid: " . mysqli_error($conn) . "<br>";
        }
    }

    $query = "SELECT workid, design, task FROM work WHERE status='incomplete'";
    $result = mysqli_query($conn, $query);

    // Check if there are any tasks
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Design</th><th>Task</th><th>Action</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['design'] . "</td>";
            echo "<td>" . $row['task'] . "</td>";
            echo "<td><form method='post'><input type='hidden' name='workid' value='" . $row['workid'] . "'><button type='submit' name='submit'>Complete</button></form></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No tasks found.";
    }

    mysqli_close($conn);
?>
