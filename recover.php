
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="temp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js">
    </script>
    <script type="text/javascript">
        (function(){
            emailjs.init("user_wHIcXgmNRIXkS68Up5jRd");
        })();
    </script>
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('contact-form').addEventListener('submit', function(event) {
                event.preventDefault();
                // generate a five digit number for the contact_number variable
                this.contact_number.value = Math.random() * 100000 | 0;
                // these IDs from the previous steps
                emailjs.sendForm('default_service', 'template_opc4tzx', this)
                    .then(function() {
                        console.log('SUCCESS!');
                    }, function(error) {
                        console.log('FAILED...', error);
                    });
            });
        }
    </script>
    <title>User Registration</title>
</head>
<body style="background-image: url('images/top_secret.png'); background-repeat: no-repeat; background-size: 1850px; background-position-y:24%;">
    <div class="page-container">
        <nav class="navbar navbar-expand navbar-dark bg-dark justify-content-between">
            <a class="navbar-brand" href="#">Secure Login Service</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="Stage1_Verification.php">Login</a>
                    <a class="nav-item nav-link" href="registration1.php">Registration</a>
                </div>
            </div>
        </nav>
    <div class="recover-info">
       <form id="contact-form">
            <input type="hidden" name="contact_number">
            <div class="recover-entry">
                <label class="field-name">Email Address<span class="required-asterisk">*</span></label>
                <input class="field-input" placeholder="Email/Username" type="text" name="user_email" id="email-input" required>
            </div>
            <div class="submit-button">
                <input type="submit" value="Send" id="submit" class="btn btn-success">
                <button type="reset" id="clearButton" class = "btn btn-danger">Clear</button>
            </div>
       </form>
    </div>
    </div>
</body>
</html>