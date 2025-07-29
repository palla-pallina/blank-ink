<?php
include("connection.php");

if(isset($_POST['btn_reg'])){
    $un = $_POST['username'];  
    $em = $_POST['email'];  
    $phone = $_POST['phone_number']; // Get phone number
    $pwd = $_POST['password'];
    $cpwd = $_POST['confirm_password'];

    // Validate password confirmation
    if ($pwd !== $cpwd) {
        echo '<script>alert("Passwords do not match!");</script>';
        exit();
    }

    // Insert into database (adding phone_number)
    $sql = "INSERT INTO users (username, email, phone, password)    
            VALUES ('$un', '$em', '$phone', '$pwd')";

    if ($con->query($sql) === TRUE) {
        echo '<script>alert("Registration successful!");</script>';
        echo '<script>window.location.href ="login.php";</script>';
    } else {
        echo '<script>alert("Error: ' . $con->error . '");</script>';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>tintaPH</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../stylesheets/register.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="icon" type="image/x-icon" href="../stylesheets/assets/favicon.svg">
        <style>
            body {
                background: url("../stylesheets/assets/signup_bg.png") no-repeat center center/cover fixed;
            }
        </style>
    </head>
    <body>
        <center>
            <div class="signup-box">
                <div class="logo-header">
                    <img src="../stylesheets/assets/text_logo_s.svg" alt="tintaph text logo" class="logo">
                    <p class="slogan">Lumikha at mabuhay!</p>
                </div>
                <div class="signup-form">
                    <form action="" method="POST">
                        <div class="header">
                            <h4>Welcome!<br>Create a new account.</h4>
                        </div>
                        <div class="username-form">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                        <div class="email-form">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="contactno-form">
                            <input type="tel" class="form-control" name="phone_number" placeholder="(+63) 09xx xxx xxxx" pattern="09[0-9]{9}" required>
                        </div>
                        <div class="password-form">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <input type="password" class="form-control"  name="confirm_password" placeholder="Confirm Password" required>
                        </div>
                        <div class="form-buttons">
                            <button type="submit" class="signup-btn" name="btn_reg">Sign Up</button>
                            <button type="button" onclick="history.back()">Already have an account?</button>
                        </div>
                    </form>
                </div>
            </div>
        </center>
        <!-- FOOTER -->
        <footer class="footer">
            <p>&copy; Blank Ink · <a href="about.php" class="footer-link"> About TintaPH</a></p>
        </footer>
    </body>
</html>
