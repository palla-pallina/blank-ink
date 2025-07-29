<?php
include("connection.php");

if (isset($_POST['txt_btn'])) {
    $un = $_POST['txt_username'];
    $pw = $_POST['txt_password'];

    // Query to check user credentials and get user type
    $sql = "SELECT usertype FROM users WHERE username = '$un' AND password = '$pw'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_type = $row['usertype'];

        echo '<script>alert("Login successful!");</script>';

        // Redirect based on user type
        if ($user_type == 'admin') {
            echo '<script>window.location.href = "../private/admin.php";</script>';
        } elseif ($user_type == 'user') {
            echo '<script>window.location.href = "homefeed.php";</script>';
        }
    } else {
        echo '<script>alert("Invalid username or password!");</script>';
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
        <link rel="stylesheet" href="../stylesheets/login.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="icon" type="image/x-icon" href="../stylesheets/assets/favicon.svg">
        <style>
            body {
                background: url("../stylesheets/assets/login_bg.png") no-repeat center center/cover fixed;
            }
        </style>
    </head>
    <body>
        <center>
            <div class="login-box">
                <div class="logo-header">
                    <img src="../stylesheets/assets/text_logo.svg" alt="tintaph text logo" class="logo">
                    <p class="slogan">Lumikha at mabuhay!</p>
                </div>
                <div class="login-form">
                    <form action="" method="POST">
                        <div class="header">
                            <h4>Log in with an existing account.</h4>
                        </div>
                        <div class="username-form">
                            <input type="text" class="form-control" id="txt_username" name="txt_username" placeholder="Username" required>
                        </div>
                        <div class="password-form">
                            <input type="password" class="form-control" id="txt_password" name="txt_password" placeholder="Password" required>
                        </div>
                        <div class="login-button">
                            <button type="submit" name="txt_btn" class="login-btn">Log In</button><br><br>
                        </div>
                    </form>
                    <div class="signup-button">
                        <a href="register.php">
                            <button class="to-signup-btn">Create an account</button>
                        </a>
                    </div>
                </div>
            </div>
        </center>
        <!-- FOOTER -->
        <footer class="footer">
            <p>&copy; Blank Ink · <a href="about.php" class="footer-link"> About TintaPH</a></p>
        </footer>
    </body>
</html>
