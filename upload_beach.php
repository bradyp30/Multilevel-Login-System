
<html> 
    <head>
        <title> Image upload </title>
</head>

<body>
<form action="upload_beach.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>

<?php

//if the submit button is clicked.
if(isset($_POST['submit'])){
    //mysql_connect();
    //mysql_select_db();

    // connecting to db.
    require("sql_conn.php");
    
    //anything put into a db queried from a db has protection put around it.
    $imageName = mysqli_real_escape_string($dbc, $_FILES["image"]["name"]); 
    $imageData = mysqli_real_escape_string($dbc, file_get_contents($_FILES["image"]["tmp_name"]));
    $imageType = mysqli_real_escape_string($dbc, $_FILES["image"]["type"]); //tell us what type the image is.

    //echo $imageData;

    // check to see if the file chosen is actually an image.
    // pick out first 5 characters of string.
    if(substr($imageType, 0, 5) == "image"){
        mysqli_query($dbc, "INSERT INTO beach VALUES('', '$imageName', '$imageData')");
        echo "Image Uploaded.";
    } else {
        echo "Incorrect file type selected for upload; Only images are allowed.";
    }


    
}


?>

<!--Have to specify image id. -->
<!-- <img src = "showImage.php?id=1"> -->

</body>
</html> 

