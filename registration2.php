<?php
// Start the session
session_start();

$_SESSION['name'] = $_POST['userLogin'];
$_SESSION['pass'] = $_POST['userPassword'];

#echo $_SESSION['name'];
#echo $_SESSION['pass'];

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
<body style="background-image: url('images/top_secret.png'); background-repeat: no-repeat; background-size: 1850px; background-position-y: 31%;">
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
    <!-- Will need to change action to go to reg page when name changes. -->
        <form method="post" action="registration3.php">
            <div id="company-contact-info">
			<h1 class="page-title">User Registration Page</h1>
			<h5 class="page-info">
                <br>This is the second level of authentication.
                <br>Be sure to remember all of the passwords you entered!</h5>
	    </div>
        <div id="level-two">
            <div class="fields-container">
                <label class="captcha">Please select one of the following options to be your "topic" for future logging in: </label>
               <pre> <select name="password2" id="password2" placeholder="Topics">
                    <option value="airplane">airplane</option>
                    <option value="beach">Beach</option>
                    <option value="boat">Boat</option>
                    <option value="car">Car</option>
                    <option value="forest">Forest</option>
                    <option value="home">Mobile Home</option>
                    <option value="storage">Storage Container</option>

                  </select> </pre>
            </div>
        </div>
        <div class="submit-button">
            <button type="submit" formmethod="POST" id="submit" class="btn btn-success">Submit</button>
            <button type="reset" id="clearButton" class = "btn btn-danger">Clear</button>
        </div>
        </form>
    </div>
    </div>
</body>
</html>