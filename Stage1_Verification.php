<?php
// Start the session
session_start();


?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stage 1 Verification</title>
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
        <form style="text-align: center; margin-top: 20%;" method="post" action="verify_php_1.php">
            <span class="form-group">
                <label>Username:
                    <pre> <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{3, 32}$" placeholder="Username" name="userName_vera" class="form-control"/> </pre>
                </label>
                <label>Password:
                    <pre> <input type="password" pattern="[a-zA-Z0-9]{3,32}" placeholder="Password" name = "userPass_vera" class="form-control"/> </pre>
                </label>
                    <button type="submit" class="btn btn-success">Verify</button>
            </span>
            <div>
                <a target="_blank" href="recover.php">Forgot your password?</a>
            </div>
        </form>
    </body>
</html>