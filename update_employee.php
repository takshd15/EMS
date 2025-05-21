<?php
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "DatabaseDictionary";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST['update'])){
        $empid = $_POST['empid'];
        $ename = $_POST['ename'];
        $email = $_POST['email'];
        $phoneno = $_POST['phoneno'];
        $totalleave = $_POST['totalleave'];
        $salary = $_POST['salary'];

        $sql = "UPDATE employee SET ename='$ename', email='$email', phoneno='$phoneno', totalleave='$totalleave', salary='$salary' WHERE empid=$empid";

        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
            header("Location: admin_portal.php");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        $empid = $_GET['empid'];
        $sql = "SELECT * FROM employee WHERE empid=$empid";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Employee</title>
</head>
<body>
	<h1>Update Employee</h1>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="hidden" name="empid" value="<?php echo $row['empid']; ?>">
		<label for="ename">Employee Name:</label>
		<input type="text" name="ename" id="ename" value="<?php echo $row['ename']; ?>"><br><br>
		<label for="email">Email:</label>
		<input type="text" name="email" id="email" value="<?php echo $row['email']; ?>"><br><br>
		<label for="phoneno">Phone Number:</label>
		<input type="text" name="phoneno" id="phoneno" value="<?php echo $row['phoneno']; ?>"><br><br>
		<label for="totalleave">Total Leave:</label>
		<input type="text" name="totalleave" id="totalleave" value="<?php echo $row['totalleave']; ?>"><br><br>
		<label for="salary">Salary:</label>
		<input type="text" name="salary" id="salary" value="<?php echo $row['salary']; ?>"><br><br>
		<input type="submit" name="update" value="Update">
	</form>
</body>
</html>
