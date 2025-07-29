<!DOCTYPE html>
<html lang="en">
    <head>
    <title>tintaPH</title>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="../stylesheets/register.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin">
            <link rel="icon" type="image/x-icon" href="../stylesheets/assets/favicon.svg">
    </head>
    <body>
        <div class="container-box">
            <!-- Left Side: Banner -->
            <div class="image-box"></div>

            <!-- Right Side: Register Form -->
            <div class="signup-form">
                <div class = "login-header">
                    <img src="../stylesheets/assets/logo.svg" alt="tintaph text logo" class="logo">
                    <p class="slogan">Lumikha at mabuhay!</p>
                    <h1>Welcome!!!</h1>
                </div>

                <form action="" method="POST">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="email" name="email" placeholder="Email" required>

                    <!-- Phone Number Field -->
                    <input type="tel" name="phone_number" placeholder="(+63) 09xx xxx xxxx" pattern="09[0-9]{9}" required>

                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>

                    <button type="submit" class="signup-btn" name="btn_reg">Sign Up</button>
                    <button type="button" onclick="history.back()">Already have an account?</button>
                </form>
            </div>
        </div>
    </body>
</html>

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