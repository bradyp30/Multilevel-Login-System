<script type="text/javascript">
function RedirectFunction() {
  alert("Incorrect Password Attempt.");
}

function myFunctionLock() {
  alert("Max Incorrect Password Attempt Reached.");
}


</script>
<?php 
session_start();

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
//echo "Connected successfully\n";


// needs the session variable. 
$username = $_SESSION['name'];
//echo $userName;
//$username = "Cesenor";

$getLock = mysqli_fetch_assoc(mysqli_query($conn, "SELECT lockNum FROM group9_db WHERE userName = '$username'"));
        $lockNum = $getLock['lockNum'];
        #echo $lockNum;

        # meaning 5.
if($lockNum > 4){

    echo '<script type="text/javascript">myFunctionLock();</script>';
    echo "Redirecting in 3 seconds.";
    header( "refresh:3;url=recover.php" );
    exit();
            
}





$sql = "SELECT captcha_type FROM group9_db WHERE userName = '" . $username . "'";
$result = $conn->query($sql);

//echo $sql;


$user_image_type = "";
if ($result->num_rows > 0) {
	$user_image_type = $result->fetch_assoc()['captcha_type'];
}
//echo "image type='" . $user_image_type . "'";
$image_groups = array(
	"airplane" => -1,
	"beach" => -1,
	"boat" => -1,
	"car" => -1,
	"forest" => -1,
	"home" => -1,
	"storage" => -1,
	);
	

//if there is a airplane var, then the form was previously submitted
//echo json_encode($_POST);
//echo json_encode(array_keys($_POST));
//echo json_encode($image_groups);

if (isset($_POST['airplane'])){
	
	$pass = True;
	$correct_number = $_SESSION['correct_number'];
	
	foreach (array_keys($_POST) as $category){
		//echo "category: " . $category . "<br>";
		if (array_key_exists($category, $image_groups)){
			//echo $category . ": " . $_POST[$category] . "<br>";
			if ($category == $user_image_type){
				//echo "equals";
				if($_POST[$category] != $correct_number){
					//echo "fail, correct # = " . $correct_number;
					$pass = False;
				}
			}else{
				if($_POST[$category] > 0){
					$pass = False;
				}
			}
		}
	}
	if($pass){
		header("refresh:0;url=Stage3_Verification.php");
	}else{
		//check counter first.  
        $getLock = mysqli_fetch_assoc(mysqli_query($conn, "SELECT lockNum FROM group9_db WHERE userName = '$username'"));
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
            $sql = "UPDATE group9_db SET lockNum = '$increment' WHERE userName = '$username'";


            if(mysqli_query($conn, $sql)){
                #echo "Contact Request added successfully.";
            }


            echo '<script type="text/javascript">RedirectFunction();</script>';
            echo "Redirecting in 3 seconds.";
            header( "refresh:3;url=Stage2_Verification.php" );
            exit();

        }
		
	}
}else{
	//echo "not post";
}


$random_keys = array(
	1 => array_rand($image_groups),
	2 => array_rand($image_groups),
	3 => array_rand($image_groups),
	4 => array_rand($image_groups),
	5 => array_rand($image_groups),
	6 => array_rand($image_groups),
	7 => array_rand($image_groups),
	8 => array_rand($image_groups),
	9 => $user_image_type
	);
	

$random_class_order = array_rand($random_keys,9);

//echo json_encode($random_keys);
$_SESSION['correct_number'] = array_count_values($random_keys)[$user_image_type];
//echo $_SESSION['correct_number'];

$images = array();
$images_types = array();

foreach ($random_class_order as $index){
	$current_class = $random_keys[$index];
	//echo $current_class . ";";
	$sql = "SELECT image From " . $current_class . " ORDER BY RAND() LIMIT 1";
	//echo $sql . "<br>";
	$result = $conn->query($sql);
	array_push($images, $result->fetch_assoc()['image']);
	array_push($images_types, $current_class);
}
?>




<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="stylesheet.css" rel="stylesheet">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Stage 2 Verification</title>
</head>
<body style="background-image: url('images/top_secret.png'); background-repeat: no-repeat; background-size: 2000px; background-position: center">
    <nav class="navbar navbar-expand navbar-dark bg-dark justify-content-between">
        <a class="navbar-brand" href="#">Secure Login Service</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="Stage1_Verification.php">Login <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="registration1.php">Registration</a>
            </div>
        </div>
    </nav>
    <div class="image-grid" style="vertical-align: top; text-align: center; margin-top: 5%;">
        <div class="container">
            <div class="row">
                <div class="col-">
                    <img id = "1" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[0]); ?>" style="width:200px;height:200px" class="img-thumbnail selected" onclick="clickedTimes('<?php echo $images_types[0];?>', 1)">
                    <img id = "2" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[1]); ?>" style="width:200px;height:200px" class="img-thumbnail selected" onclick="clickedTimes('<?php echo $images_types[1];?>', 2)">
                    <img id = "3" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[2]); ?>" style="width:200px;height:200px" class="img-thumbnail selected" onclick="clickedTimes('<?php echo $images_types[2];?>', 3)">
                </div>
                <div class="col-">
                    <img id = "4" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[3]); ?>" style="width:200px;height:200px" class="img-thumbnail selected" onclick="clickedTimes('<?php echo $images_types[3];?>', 4)">
                    <img id = "5" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[4]); ?>" style="width:200px;height:200px" class="img-thumbnail selected" onclick="clickedTimes('<?php echo $images_types[4];?>', 5)">
                    <img id = "6" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[5]); ?>" style="width:200px;height:200px" class="img-thumbnail selected" onclick="clickedTimes('<?php echo $images_types[5];?>', 6)">
                </div>
                <div class="col-">
                    <img id = "7" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[6]); ?>" style="width:200px;height:200px" class="img-thumbnail selected" onclick="clickedTimes('<?php echo $images_types[6];?>', 7)">
                    <img id = "8" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[7]); ?>" style="width:200px;height:200px" class="img-thumbnail selected" onclick="clickedTimes('<?php echo $images_types[7];?>', 8)">
                    <img id = "9" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[8]); ?>" style="width:200px;height:200px" class="img-thumbnail selected" onclick="clickedTimes('<?php echo $images_types[8];?>', 9)">
                </div>
            </div>
        </div>
    </div>

   <form action = "Stage2_Verification.php", method = "POST", onSubmit="submitJS()">
		<?php 
			foreach (array_keys($image_groups) as $image_group){
				echo "<input type='hidden' id = '" . $image_group . "' name='" . $image_group . "' value=''/>\n";
			}
		?>
        <div style=" text-align: center">
            <div>
                <a target="_blank" href="recover.html">Forgot your password?</a>
            </div>
            <small id="captchaHelp" class="form-text text-muted">Please select all the pictures associated with your account.</small></br>
            <button type="submit" class="btn btn-success">Verify</button>
        </div>
    </form>
</body>

<script type = "text/javaScript">
    let airplaneCount = 0;
    let beachCount = 0;
    let boatCount = 0;
    let carCount = 0;
    let forestCount = 0;
    let homeCount = 0;
    let storageCount = 0;
    let oneClicked = false;
    let twoClicked = false;
    let threeClicked = false;
    let fourClicked = false;
    let fiveClicked = false;
    let sixClicked = false;
    let sevenClicked = false;
    let eightClicked = false;
    let nineClicked = false;

    $('img').click(function(){
        $('.selected').removeClass('selected');
        $(this).addClass('selected');
    });

	function submitJS(){
		//document.write("foo");
		<?php 
		foreach (array_keys($image_groups) as $image_group){
			echo "document.getElementById('" . $image_group . "').value = " . $image_group . "Count;\n";
		}
		?>
		return false;
	}

    function clickedTimes(name, id) {
        if(name == "airplane") {
            if(hasBeenClicked(id)) {
                airplaneCount--;
                toggleBool(id);
            } else {
                airplaneCount++;
                toggleBool(id);
            }
        } else if(name == "beach") {
            if(hasBeenClicked(id)) {
                beachCount--;
                toggleBool(id);
            } else {
                beachCount++;
                toggleBool(id);
            }
        } else if(name=="boat") {
            if(hasBeenClicked(id)) {
                boatCount--;
                toggleBool(id);
            } else {
                boatCount++;
                toggleBool(id);
            }
        } else if(name=="car") {
             if(hasBeenClicked(id)) {
                carCount--;
                toggleBool(id);
             } else {
                carCount++;
                toggleBool(id);
             }
        } else if(name=="forest") {
            if(hasBeenClicked(id)) {
                forestCount--;
                toggleBool(id);
            } else {
                forestCount++;
                toggleBool(id);
            }
        } else if(name=="home") {
            if(hasBeenClicked(id)) {
                homeCount--;
                toggleBool(id);
            } else {
                homeCount++;
                toggleBool(id);
            }
        } else if(name=="storage") {
           if(hasBeenClicked(id)) {
                storageCount--;
                toggleBool(id);
           } else {
                storageCount++;
                toggleBool(id);
           }
        }
    };
    function toggleBool(id) {
        if(id == 1) {
            return oneClicked;
        } else if(id == 2) {
            return twoClicked;
        } else if(id == 3) {
            return threeClicked;
        } else if(id == 4) {
            return fourClicked;
        } else if(id == 5) {
            return fiveClicked;
        } else if(id == 6) {
            return sixClicked;
        } else if(id == 7) {
            return sevenClicked;
        } else if(id == 8) {
            return eightClicked;
        } else if(id == 9) {
            return nineClicked;
        }
    };
    function hasBeenClicked(id) {
        if(id == 1) {
            oneClicked = !oneClicked;
        } else if(id == 2) {
            twoClicked = !twoClicked;
        } else if(id == 3) {
            threeClicked = !threeClicked;
        } else if(id == 4) {
            fourClicked = !fourClicked;
        } else if(id == 5) {
            fiveClicked = !fiveClicked;
        } else if(id == 6) {
            sixClicked = !sixClicked;
        } else if(id == 7) {
            sevenClicked = !sevenClicked;
        } else if(id == 8) {
            eightClicked = !eightClicked;
        } else if(id == 9) {
            nineClicked = !nineClicked;
        }
    };
</script>