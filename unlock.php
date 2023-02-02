<?php

$servername = "localhost";
$db_username = "root";
$db_password = "";

// Create connection
//$conn = new mysqli($servername, $db_username, $db_password, "SE2");
$conn = new mysqli($servername, $db_username, $db_password, "3fa_db");



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$db = $conn;

$id = $_GET['id']; // get id through query string
	
    $edit = mysqli_query($db,"update group9_db set lockNum=0 where id='$id'");
    mysqli_close($db); // Close connection
    echo "Unlocked";
    header("location:admin_user.php"); // redirects to all records page
    exit;  	
?>