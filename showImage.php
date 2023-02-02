<?php

// connecting to db.
require("sql_conn.php");

// I think not connecting to child db.
//print_r($_GET[]);
//print_r($_GET['Id']);

if(isset($_GET['Id'])){

    echo "working";

    $id = mysqli_real_escape_string($dbc, $_GET['Id']);
    $query = mysqli_query($dbc, "SELECT * FROM airplane WHERE 'Id' = '$id'");

    //getting data from db using while loop.
    while($row = mysqli_fetch_assoc($query)){
        $imageData = $row["image"];
    }

    header("content-type: image/jpg"); //jpg type images.
    echo $imageData;


} else {

    echo "Error.";
}


?>