
<html lang="en">
<body>

<script type="text/javascript">
function myFunction() {
  alert("Incorrect Password Attempt.");
}

function myFunctionLock() {
  alert("Max Incorrect Password Attempt Reached.");
}

</script>


<?php
// Start the session


session_start();


/* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */

    // Defined as constants so that they can't be changed
    DEFINE ('DB_USER', 'root');
    DEFINE ('DB_PASSWORD', '');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', '3fa_db');
    // $dbc will contain a resource link to the database
    // @ keeps the error from showing in the browser
    $link = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    OR die('Could not connect to MySQL: ' .
    mysqli_connect_error());
    //echo "Connection Successful ";

    // Check connection

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }


    #$_SESSION['name'] = $_POST['userName_vera'];
    $rgb = $_COOKIE["gfg"];


    $first_name = $_SESSION['name'];
    $getLock = mysqli_fetch_assoc(mysqli_query($link, "SELECT lockNum FROM group9_db WHERE userName = '$first_name'"));
    $lockNum = $getLock['lockNum'];
    #echo $lockNum;

    # meaning 5.s
    if($lockNum > 4){

        echo '<script type="text/javascript">myFunctionLock();</script>';
        echo "Redirecting in 3 seconds.";
        header( "refresh:3;url=recover.php" );
        exit();
        
    }


    //echo "\r\n";
    //echo $_SESSION['name'];
    //echo "\r\n";
    //echo $_SESSION['pass'];


    $first_name = $_SESSION['name'];


    //$getID = mysqli_fetch_assoc(mysqli_query($link, "SELECT userName FROM group9_db WHERE id = 1"));
    $getID = mysqli_fetch_assoc(mysqli_query($link, "SELECT userName FROM group9_db WHERE userName = '$first_name'"));
    //$userID = $getID['userName'];

    //check if the username exists.
    if(isset($getID)){
        $userID = $getID['userName'];
        #echo $userID;

        // it exists so continue to verify. 
        $getRGB = mysqli_fetch_assoc(mysqli_query($link, "SELECT rgb FROM group9_db WHERE userName = '$first_name'"));
        $getRGB = $getRGB['rgb'];
        //echo $getRGB;

        //$isAdmin = mysqli_fetch_assoc(mysqli_query($link, "SELECT isAdmin FROM group9_db WHERE userName = '$first_name'"));
        //verify rgb.
        if($getRGB == $rgb) {
            // If the password inputs matched the hashed password in the database
            // Do something, you know... log them in.

            //reset lockNum
            //reset counter here. 
            $getLock = mysqli_fetch_assoc(mysqli_query($link, "SELECT lockNum FROM group9_db WHERE userName = '$first_name'"));
            $lockNum = $getLock['lockNum'];
            $increment = 0;
            $sql = "UPDATE group9_db SET lockNum = '$increment' WHERE userName = '$first_name'";

            if(mysqli_query($link, $sql)){
                #echo "Contact Request added successfully.";
            }

            $isAdmin = mysqli_fetch_assoc(mysqli_query($link, "SELECT isAdmin FROM group9_db WHERE userName = '$first_name'"));
            $admin = $isAdmin['isAdmin'];

            if($admin == 1) {
                echo "true";
                header("Location: admin_user.php");
                exit();
            } else {
                echo "true";
                header("Location: success.php");
                exit();
            }
        } else {
             //check counter first.  
             $getLock = mysqli_fetch_assoc(mysqli_query($link, "SELECT lockNum FROM group9_db WHERE userName = '$first_name'"));
             $lockNum = $getLock['lockNum'];
             #echo $lockNum;
 
             # meaning 5.
             if($lockNum > 4){
 
                 echo '<script type="text/javascript">myFunctionLock();</script>';
                 echo "Redirecting in 3 seconds.";
                 header( "refresh:3;url=recover.php" );
                 exit();
                 
             } else{
                 #increment here.
                 $increment = $lockNum + 1;
                 $sql = "UPDATE group9_db SET lockNum = '$increment' WHERE userName = '$first_name'";
 
 
                 if(mysqli_query($link, $sql)){
                     #echo "Contact Request added successfully.";
                 }
 
 
                 echo '<script type="text/javascript">myFunction();</script>';
                 echo "Redirecting in 3 seconds.";
                 header( "refresh:3;url=Stage3_Verification.php" );
                 exit();
 
             }

    
        
        }
    }

   
    // close connection
    mysqli_close($link);

?>

</body>
</html>
