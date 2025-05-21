<?php
session_start();


$conn = mysqli_connect('localhost', 'root', '', 'databasedictionary');


if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $approved = false;
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'approve-') === 0) {
            $id = explode('-', $key)[1];
            $status = 'approved';

        
            $query = "UPDATE vc SET status='$status' WHERE emp_id=$id";
            mysqli_query($conn, $query);

            $query = "UPDATE employee SET totalleave=totalleave+1 WHERE empid=$id";
            mysqli_query($conn, $query);

            $approved = true;
        } elseif (strpos($key, 'reject-') === 0) {
            $id = explode('-', $key)[1];
            $status = 'rejected';

            $query = "UPDATE vc SET status='$status' WHERE emp_id=$id";
            mysqli_query($conn, $query);

            $approved = true;
        }
    }

    if ($approved) {
        header('Location: leave_status.php');
        exit();
    }
}

$query = "SELECT reason, date_start, date_end, status, emp_name, emp_id FROM vc WHERE status='pending' ORDER BY date_start ASC LIMIT 1";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Leave Table Data</title>
</head>
<body>
<h1>Leave Table</h1>
<?php if (mysqli_num_rows($result) > 0) { ?>
    <table>
        <tr>
            <th>Reason</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Employee Name</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['reason']; ?></td>
                <td><?php echo $row['date_start']; ?></td>
                <td><?php echo $row['date_end']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['emp_name']; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $row['emp_id']; ?>">
                        <input type="submit" name="approve-<?php echo $row['emp_id']; ?>" value="Approve">
                        <input type="submit" name="reject-<?php echo $row['emp_id']; ?>" value="Reject">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
<?php } else { ?>
    <p>No leave applications found.</p>
<?php } ?>
</body>
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
  width: 100px;
  position: fixed;
  top: 0;
  left: 0;
  overflow-x: hidden;
  padding-top: 10px;
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
  margin-left: 220px;
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
  margin: 0 auto;
  width: 80%;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  border-radius: 5px;
  overflow-x: scroll;
}

th, td {
  text-align: left;
  padding: 8px;
  font-size: 14px;
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
  font-size: 14px;
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
  font-size: 14px;
}

input[type=submit]:hover {
  background-color: #45a049;
}

  </style>
</html>
<nav>
	<a href="admin_portal.php">Employee Information</a>
	<a href="employee_registration.php" class="active">Employee Registration</a>
	<a href="leave_status.php">Leave Status</a>
	<a href="task_assign.php">Task Assign</a>
	<a href="task_progress.php">Task progress</a>
	<a href="logout.php">Logout</a>
</nav>


