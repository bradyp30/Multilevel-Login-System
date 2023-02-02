
<?php
// Start the session
session_start();


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
<body style="background-image: url('images/top_secret.png'); background-repeat: no-repeat; background-size: 1850px; background-position-y: 36%;">
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

         <!-- form code -->
         <!-- Will need to change action to go to reg page when name changes. -->
        <form method="post" action="php_test2.php">
            <div id="company-contact-info">
			<h1 class="page-title">User Registration Page</h1>
			<h5 class="page-info">
                <br>This is the first level of authentication.
                <br>Be sure to remember all of the passwords you entered!</h5>
	    </div>
        <div id="level-one">
            <br>
            <h6>Required Fields <span class="required-asterisk">*</span></h6>
            <div class="fields-container">
                <label class="captcha">Please fill out all of the required fields below.</label><br><br>
                <div class="field">
                    <label class="field-name">Email/Username<span class="required-asterisk">*</span></label>
                    <pre> <input class="field-input" placeholder="Email/Username" type="text" name="userLogin" id="email-input" required> </pre>
                
                </div>
                <div class="field">
                    <label class="field-name">Password<span class="required-asterisk">*</span></label>
                    <pre> <input class="field-input" placeholder="Password" type="password" name="userPassword" id="userPassword" required> </pre>
                </div>
                <div class="field">
                    <label class="field-name">Confirm Password<span class="required-asterisk">*</span></label>
                    <pre> <input class="field-input" placeholder="Re-enter Password" type="password" name="confirmPassword" id="confirmPassword" required> </pre>
                </div>
            </div>
        </div>
        <div class="submit-button">
            <button type="submit" name="submit" formmethod="POST" id="submit" class="btn btn-success">Submit</button>
            <button type="reset" id="clearButton" class = "btn btn-danger">Clear</button>
        </div>
        </form>


    </div>
    </div>
</body>
</html>



