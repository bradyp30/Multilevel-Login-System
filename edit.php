<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/fd59e21bfa.js"
      crossorigin="anonymous"
    ></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <title>Admin Page</title>
  </head>
  <style>
    html,
    body {
      height: 100%;
    }

    .container {
      display: flex;
      height: 15%;
      justify-content: center;
    }

    tr,
    th,
    td {
      border: 1px solid black !important;
      text-align: center;
    }
  </style>
  <body
    style="
      background-image: url('images/top_secret.png');
      background-repeat: no-repeat;
      background-size: 2000px;
      background-position: center;
    "
  >
    <h3>Update Data</h3>

    <form method="POST">
    <input type="text" name="userName" value="<?php echo $data['userName'] ?>" placeholder="Enter Username" Required>
    <input type="text" name="lockNum" value="<?php echo $data['lockNum'] ?>" placeholder="Enter 0 to unlock account" Required>

    <input type="submit" name="update" value="Update">
    </form>
  </body>
</html>
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

$qry = mysqli_query($db,"select * from group9_db where id='$id'"); // select query

//try to reset here.
//$increment = 0;
//$sql = "UPDATE group9_db SET lockNum = '$increment' WHERE id='$id'";

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $userName = $_POST['userName'];
    $lockNum = $_POST['lockNum'];
	
    $edit = mysqli_query($db,"update group9_db set userName='$userName', lockNum='$lockNum'  where id='$id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:admin_user.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>