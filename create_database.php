<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS DatabaseDictionary";
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully\n";
} else {
  echo "Error creating database: " . mysqli_error($conn) . "\n";
}

mysqli_select_db($conn, "DatabaseDictionary");

if(mysqli_query($conn, "SELECT * FROM Admin LIMIT 1") === false) {
    $sql = "CREATE TABLE Admin (
      adminid int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
      adminname nvarchar(50) NOT NULL,
      adminmail nvarchar(50) NOT NULL,
      adminpass nvarchar(50) NOT NULL,
      adminstatus int(11) NOT NULL
    )";
  
    if (mysqli_query($conn, $sql)) {
      echo "Admin table created successfully\n";
    } else {
      echo "Error creating Admin table: " . mysqli_error($conn) . "\n";
    }
}
  

$sql = "CREATE TABLE Employee (
    empid int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ename nvarchar(50) NOT NULL,
    email nvarchar(50) NOT NULL,
    password nvarchar(50) NOT NULL,
    phoneno numeric(18,0) NOT NULL,
    dob nvarchar(50) NOT NULL,
    regd nvarchar(50) NOT NULL,
    empstatus int(11) NOT NULL,
    desig VARCHAR(255) NOT NULL,
    totalleave int(11) NOT NULL,
    salary int(11) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "Employee table created successfully\n";
} else {
  echo "Error creating Employee table: " . mysqli_error($conn) . "\n";
}
  

$sql = "CREATE TABLE LeaveTable (
  lid int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  leavereason nvarchar(255) NOT NULL,
  leavedatestart nvarchar(50) NOT NULL,
  leavedateend nvarchar(50) NOT NULL,
  leavestatus nvarchar(50) NOT NULL,
  empid int(11) NOT NULL,
  leavecount int(11) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "Leave table created successfully\n";
} else {
  echo "Error creating Leave table: " . mysqli_error($conn) . "\n";
}

$sql = "CREATE TABLE Work (
  wid int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  empid int(11) NOT NULL,
  design nvarchar(255) NOT NULL,
  task nvarchar(255) NOT NULL,
  wstatus int(11) NOT NULL,
  status nvarchar(50) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "Work table created successfully\n";
} else {
  echo "Error creating Work table: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);
?>
