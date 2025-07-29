<!DOCTYPE html>
<html lang="en">
<head>
<title>tintaPH</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="icon" type="image/x-icon" href="../stylesheets/assets/favicon.svg">
    <link rel="stylesheet" href="../stylesheets/profile.css">
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="#">
                <img src="../stylesheets/assets/header-logo.svg" class="nav-log" alt="logo" style="width:40px;">
            </a>
        </div>

        <!-- NAVBAR SCRIPT -->
        <script>
            function opentab(event, navname) {
                for (let tab of navlinks) {
                    tab.classList.remove("active-link");
                }
            }
        </script>

        <div class="links-wrapper">
            <ul class="navbar-links">

            
                <li class="dropdown">
                    <a><img src="../stylesheets/assets/dotdot.svg" class="dotdot" alt="dotdot" style="width:30px;"></a>
                    <ul class="dropdown-menu">
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="settings.php">Settings</a></li>
                            <li><a href="login.php">Sign Out</a></li>
                    </ul>
                </li>


                <li><a href="homefeed.php" class="nav-links" onclick="opentab(event, 'home')">Home</a></li>
                <li><a href="event.php" class="nav-links">Event</a></li>
                <li><a href="#" class="nav-links">Commission</a></li>
            </ul>
        </div>
        <div class="link-icons">
                <li class="upload-btn nav-link" onclick="openModal()">
                    <button type="button" class="upl-btn" style="font-family: 'Raleway', serif; font-size: 60px;">+</button>
                </li>
                <li>
                    <a href="profile.php">
                        <img src="../stylesheets/assets/usericon.svg" class="user-icon" alt="user">
                    </a>
                </li>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <div class="profile-header">
        <img src="../stylesheets/assets/usericon.svg" alt="Profile Picture">
        <div class="profile-info">
            <h2>Eri</h2>
            <p>Im just a village girl doing alright then I became a princess overnight figuring out how to do it right so much to learn and see. Up in the castle with my new family and a school that is just for royalty a new enchanted world is waiting for me. Im so excited to be Sofia the first!</p>
            <p>40 Followers | 4 Following</p>
            <button class="cute-button">Edit Profile</button>

        </div>
    </div>
    <div class="tabs">
        <div class="tab-links active-link" onclick="opentab(event, 'post')">Posts</div>
        <div class="tab-links" onclick="opentab(event, 'gallery')">Gallery</div>
        <div class="tab-links" onclick="opentab(event, 'favorite')">Favorite</div>
    </div>
    <div class="tab-contents active-tab" id="post">
        <img src="../stylesheets/assets/huhu/1.png" alt="Image">
        <img src="../stylesheets/assets/huhu/2.png" alt="Image">
        <img src="../stylesheets/assets/huhu/3.png" alt="Image">
    </div>
    <div class="tab-contents" id="gallery">
        <img src="../stylesheets/assets/huhu/4.png" alt="Reel">
        <img src="../stylesheets/assets/huhu/5.png" alt="Reel">
        <img src="../stylesheets/assets/huhu/6.png" alt="Reel">
    </div>
    <div class="tab-contents" id="favorite">
        <img src="../stylesheets/assets/huhu/7.png" alt="Tagged Post">
        <img src="../stylesheets/assets/huhu/8.png" alt="Tagged Post">
        <img src="../stylesheets/assets/huhu/9.png" alt="Tagged Post">
    </div>

    <script>
        function opentab(event, tabname) {
            let tablinks = document.getElementsByClassName("tab-links");
            let tabcontents = document.getElementsByClassName("tab-contents");

            for (let tab of tablinks) {
                tab.classList.remove("active-link");
            }
            for (let content of tabcontents) {
                content.classList.remove("active-tab");
            }

            event.currentTarget.classList.add("active-link");
            document.getElementById(tabname).classList.add("active-tab");
        }
    </script>
</body>
</html>
