<?php
$conn = mysqli_connect("localhost", "root", "", "databasedictionary");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DROP TABLE `leave_table`";

if (mysqli_query($conn, $sql)) {
    echo "Table deleted successfully";
} else {
    echo "Error deleting table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

