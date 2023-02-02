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
    <script>
      function check() {
        alert("User not found\n");
      }
    </script>

    <nav
      class="navbar navbar-expand navbar-dark bg-dark justify-content-between"
    >
      <a class="navbar-brand" href="#">Secure Login Service</a>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="Stage1_Verification.html"
            >Login <span class="sr-only">(current)</span></a
          >
          <a class="nav-item nav-link" href="registration1.html">Registration</a>
        </div>
      </div>
      <button
        style="margin-right: 1%"
        class="btn btn-outline-danger my-2 my-sm-0"
        type="button"
      >
        Logout
      </button>
    </nav>

    <table class="table table-light">
      <thead class="thead-light">
        <tr>
          <th>Id</th>
          <th>Username</th>
          <th>Password</th>
          <th>Captcha</th>
          <th>RGB</th>
          <th>Lockout Attempts</th>
          <th>Action</th>
        </tr>
      </thead>

      <?php

      //include "dbConfig.php"; // Using database connection file here


		
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
      $records = mysqli_query($db,"select * from group9_db"); // fetch data from database

      while($data = mysqli_fetch_array($records))
      {
      ?>
        <tr>
          <td><?php echo $data['id']; ?></td>
          <td><?php echo $data['userName']; ?></td>
          <td><?php echo $data['passWord']; ?></td>
          <td><?php echo $data['captcha_type']; ?></td>
          <td><?php echo $data['rgb']; ?></td>
          <td><?php echo $data['lockNum']; ?></td>
          <td><i class="fas fa-edit"></i></td>
        </tr>	
      <?php
      }
      ?>
    </table>

<?php mysqli_close($db); // Close connection ?>
  </body>
</html>
