<?php
// Start the session
session_start();

$color_range = 30;

$colors = array(
	"red" => array("R"=>"256","G"=>"0","B"=>"0", "id"=>"1"),
	"green" => array("R"=>"0","G"=>"256","B"=>"0", "id"=>"2"),
	"blue" => array("R"=>"0","G"=>"0","B"=>"256", "id"=>"3"),
	"yellow" => array("R"=>"256","G"=>"256","B"=>"0", "id"=>"4"),
	"purple" => array("R"=>"128","G"=>"0","B"=>"128", "id"=>"5"),
	"orange" => array("R"=>"256","G"=>"165","B"=>"0", "id"=>"6"),
	"teal" => array("R"=>"0","G"=>"128","B"=>"128", "id"=>"7"),
	"white" => array("R"=>"256","G"=>"256","B"=>"256", "id"=>"8"),
	"black" => array("R"=>"0","G"=>"0","B"=>"0", "id"=>"9")
);
foreach($colors as &$color) {
	$color["R"] = $color["R"] + max(0,min(255,rand(-1 * $color_range, $color_range)));
	$color["G"] = $color["G"] + max(0,min(255,rand(-1 * $color_range, $color_range)));
	$color["B"] = $color["B"] + max(0,min(255,rand(-1 * $color_range, $color_range)));
}
//echo json_encode($colors);

//shuffle the colors
$keys = array_keys($colors);
shuffle($keys);

foreach ($keys as $key){
	$random_order[$key] = $colors[$key];
}
//echo json_encode($colors);
#echo json_encode($random_order);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="temp.css">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>User Registration</title>
</head>
<body style="background-image: url('images/top_secret.png'); background-repeat: no-repeat; background-size: 1850px; background-position: center">
    <div class="page-container">
        <nav class="navbar navbar-expand navbar-dark bg-dark justify-content-between">
            <a class="navbar-brand" href="#">Secure Login Service</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="Stage1_Verification.php">Login</a>
                    <a class="nav-item nav-link active" href="registration1.php">Registration<span class="sr-only">(current)</span></a>
                </div>
            </div>
        </nav>
    <div class="registration-info">


        <!-- form code. bringing to post_db  clicks -= 1; -->
        <form method="post" action="verify_php_3.php">
            <div id="company-contact-info">
			<h1 class="page-title">User Registration Page</h1>
			<h5 class="page-info">
                <br>This is the third level of authentication.
                <br>Be sure to remember all of the passwords you entered!</h5>
	    </div>
        <div id="level-three">
            <div class="fields-container">
                <label class="rgb">Please select </label>
                <label class="rgb" id="selection">4</label>
                <label class="rgb"> more colors in any pattern.</label>
                
                <div class="grid-container" id="selections">
					<?php 
						$i = 1;
						foreach($random_order as $key => $color){
							$RGB = "rgb(" . $color["R"] . ", " . $color["G"] . ", " . $color["B"] . ")";
							$RRB_style = " style='background-color:" . $RGB . ";'";
							echo "<div class='grid-item" . $i . "' onClick='onClickSquare(" . $color["id"] . ")' id = '" . $i . "' " . $RRB_style . ">" . "</div>\n";
							$i++;
						}
					?>
                </div>
                <span id="rowBelow"> </span>

                <!-- script starts here -->
                <script type = "text/javaScript">
                var clicks = 4; 
                var rgb_value = 0;
                var error = "TOO MANY CLICKS";
                let pass = "";
                
                

                    function onClickSquare(num) {
                        pass += num;
                        if(pass.length == 4) {
                            rgb_value = parseInt(pass);
                            console.log(rgb_value);
                            $(document).ready(function () {
                            createCookie("gfg", rgb_value, "10");
                            });
                        }
                    }
                
                // Function to create the cookie
                function createCookie(name, value, days) {
                    var expires;
                    
                    if (days) {
                        var date = new Date();
                        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                        expires = "; expires=" + date.toGMTString();
                    }
                    else {
                        expires = "";
                    }
                    document.cookie = escape(name) + "=" + 
                        escape(value) + expires + "; path=/";
                }
                   </script>
                    
            </div>
        </div>
        <div class="submit-button">
            <button type="submit" formmethod="POST" id="submit" class="btn btn-success" >Submit</button>
            <!--<input id="test" name="test" visibility="hidden"></input>-->
            <button type="reset" id="clearButton" class = "btn btn-danger">Clear</button>
        </div>
        </form>
    </div>
    </div>
</body>
</html>