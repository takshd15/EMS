<div class="main">
    <h1>Task Progress</h1>

    <?php
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "DatabaseDictionary"; 

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $query = "SELECT workid, design, task FROM work WHERE status='incomplete'";
    $result = mysqli_query($conn, $query);

    // Check if there are any incomplete tasks
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Incomplete Tasks</h2>";
        echo "<table>";
        echo "<tr><th>Design</th><th>Task</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['design'] . "</td>";
            echo "<td>" . $row['task'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>No Incomplete Tasks Found</h2>";
    }

    $query = "SELECT workid, design, task FROM work WHERE status='complete'";
    $result = mysqli_query($conn, $query);

    // Check if there are any completed tasks
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Completed Tasks</h2>";
        echo "<table>";
        echo "<tr><th>Work ID</th><th>Design</th><th>Task</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['workid'] . "</td>";
            echo "<td>" . $row['design'] . "</td>";
            echo "<td>" . $row['task'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>No Completed Tasks Found</h2>";
    }

    mysqli_close($conn);
    ?>
</div>
<!DOCTYPE html>
<html>
<head>
    <title>Task Progress</title>
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

    h1, h2 {
        color: #444444;
        margin-top: 50px;
        margin-bottom: 30px;
        text-align: center;
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
    </style>
</head>
<body>
    <nav>
        <a href="admin_portal.php">Employee Information</a>
        <a href="employee_registration.php">Employee Registration</a>
        <a href="leave_status.php">Leave Status</a>
        <a href="task_assign.php">Task Assign</a>
        <a href="task_progress.php" class="active">Task Progress</a>
        <a href="logout.php">Logout</a>
    </nav>

   