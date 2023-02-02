<?php
// Start the session
session_start();


$_SESSION['pass2'] = $_POST['password2'];
#echo $_SESSION['pass2'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="temp.css">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>User Registration</title>
</head>
<body style="background-image: url('images/top_secret.png'); background-repeat: no-repeat; background-size: 1850px; background-position: center">
    <div class="page-container">
        <nav class="navbar navbar-expand navbar-dark bg-dark justify-content-between">
            <a class="navbar-brand" href="#">Secure Login Service</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="Stage1_Verification.html">Login</a>
                    <a class="nav-item nav-link active" href="registration1.html">Registration<span class="sr-only">(current)</span></a>
                </div>
            </div>
        </nav>
    <div class="registration-info">


        <!-- form code. bringing to post_db  clicks -= 1; -->
        <form method="post" action="post_db.php">
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
                
                <div class="grid-container" id="selectionS" onClick="onClick()">
                    <div class="grid-item1" onClick="onClickSqare()" id = "1">1</div>
                    <div class="grid-item2" id = "2">2</div>
                    <div class="grid-item3" id = "3">3</div>  
                    <div class="grid-item4" id = "4">4</div>
                    <div class="grid-item5" id = "5">5</div>
                    <div class="grid-item6" id = "6">6</div>  
                    <div class="grid-item7" id = "7">7</div>
                    <div class="grid-item8" id = "8">8</div>
                    <div class="grid-item9" id = "9">9</div>
                </div>

                <!-- script starts here -->
                <script type = "text/javaScript">
                var clicks = 4; 
                var rgb_value = 0;
                var error = "TOO MANY CLICKS";

                    function onClickSquare() {

                        let pass = "";
                        pass += document.getElementById("selectins").id;

                //     //clicks = document.getElementById("1").innerHTML;
                //     // tried a if function but didnt work. Freezes and doesn't increment.
                //     //if(clicks == "1"){
                //         // add 1 to rgb.
                //       //  clicks += document.getElementById("1").innerHTML;
                //    // }

                //       //clicks = document.getElementById("1").innerHTML;
                       clicks -= 1;
                //       clicks += document.getElementById("1").innerHTML;
                       document.getElementById("selection").innerHTML = clicks;
                //       rgb_value += document.getElementById("1").innerHTML;
                    };
                    
                    /////////
                    function showIt(element) {
                        var parent = element.parentNode;
                        alert(parent.id);
                        var content = parent.querySelector("div");
                        alert(content.id);
                    }
                    //////////







                   </script>
                    
            </div>
        </div>
        <div class="submit-button">
            <button type="submit" formmethod="POST" id="submit" class="btn btn-success" >Submit</button>
            <button type="reset" id="clearButton" class = "btn btn-danger">Clear</button>
        </div>
        </form>
    </div>
    </div>
</body>
</html>