<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DatabaseDictionary";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if(isset($_GET['empid'])){
        $empid = $_GET['empid'];
        
        $sql_work = "DELETE FROM work WHERE empid=$empid";
        if (mysqli_query($conn, $sql_work)) {

            $sql_employee = "DELETE FROM employee WHERE empid=$empid";
            if (mysqli_query($conn, $sql_employee)) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . mysqli_error($conn);
            }
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?> 
