<?php
// Start the session
session_start();


$_SESSION['pass2'] = $_POST['password2'];
#echo $_SESSION['pass2'];

#$_SESSION['rgb_value'] = rgb_value;

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
                
                <div class="grid-container" id="selections">
                    <div class="grid-item1" onClick="onClickSquare(1)" id = "1"></div>
                    <div class="grid-item2" onClick="onClickSquare(2)" id = "2"></div>
                    <div class="grid-item3" onClick="onClickSquare(3)" id = "3"></div>  
                    <div class="grid-item4" onClick="onClickSquare(4)" id = "4"></div>
                    <div class="grid-item5" onClick="onClickSquare(5)" id = "5"></div>
                    <div class="grid-item6" onClick="onClickSquare(6)" id = "6"></div>  
                    <div class="grid-item7" onClick="onClickSquare(7)" id = "7"></div>
                    <div class="grid-item8" onClick="onClickSquare(8)" id = "8"></div>
                    <div class="grid-item9" onClick="onClickSquare(9)" id = "9"></div>
                </div>
                <span id="rowBelow">

                </span>

                <!-- script starts here -->
                <script type = "text/javaScript">
                var clicks = 4; 
                var rgb_value = 0;
                var error = "TOO MANY CLICKS";
                let pass = "";
                let count = 0;

                    function onClickSquare(num) {
                        pass += num;
                        if(pass.length == 4) {
                            rgb_value = parseInt(pass);
                            console.log(rgb_value);
                            $(document).ready(function () {
                            createCookie("gfg", rgb_value, "10");
                            });
                        }
                        count++;
                        if(count <= 4) {
                            if(num == 1) {
                                $("#rowBelow").append("Red ")
                            } else if(num == 2) {
                                $("#rowBelow").append("Green ")
                            } else if(num == 3) {
                                $("#rowBelow").append("Blue ")
                            } else if(num == 4) {
                                $("#rowBelow").append("Yellow ")
                            } else if(num == 5) {
                                $("#rowBelow").append("Purple ")
                            } else if(num == 6) {
                                $("#rowBelow").append("Orange ")
                            } else if(num == 7) {
                                $("#rowBelow").append("Teal ")
                            } else if(num == 8) {
                                $("#rowBelow").append("White ")
                            } else if(num == 9) {
                                $("#rowBelow").append("Black ")
                            }
                        }
                    };

                //////////////////////
                // Creating a cookie after the document is ready
                //$(document).ready(function () {
                  //  createCookie("gfg", rgb_value, "10");
                //});
                
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
  

                ///////////////////////



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