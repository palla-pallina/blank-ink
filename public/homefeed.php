<?php
include("connection.php"); // Database connection

// Fetch all uploaded artworks
$sql = "SELECT * FROM art ORDER BY date_posted DESC";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>tintaPH</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="icon" type="image/x-icon" href="../stylesheets/assets/favicon.svg">
    <link rel="stylesheet" href="../stylesheets/homefeed.css">
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


                <li><a href="homefeed.php" class="nav-links active-link" onclick="opentab(event, 'home')">Home</a></li>
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

    <!-- EVENTS SECTION -->
    <div class="events-container">
        <div class="events-header"><b>EVENTS</b> THIS MONTH</div>
        <div class="position-relative">
            <div class="gallery-container">
                <img src="../stylesheets/assets/ph.png" alt="Artwork-1" style="margin-left:310px;">
                <img src="../stylesheets/assets/ph.png" alt="Artwork-2">
                <img src="../stylesheets/assets/ph.png" alt="Artwork-3">
                <img src="../stylesheets/assets/ph.png" alt="Artwork-4">
                <img src="../stylesheets/assets/ph.png" alt="Artwork-5">
                <img src="../stylesheets/assets/ph.png" alt="Artwork-6">
                <img src="../stylesheets/assets/ph.png" alt="Artwork-7">
            </div>
            <button class="prev-btn gallery-arrows" onclick="scrollGallery('left')">←</button>
            <button class="next-btn gallery-arrows" onclick="scrollGallery('right')">→</button>
        </div>
    </div>
    <script>
        function scrollGallery(direction) {
            const gallery = document.querySelector('.gallery-container');
            const scrollAmount = 130;
            gallery.scrollBy({ left: direction === 'left' ? -scrollAmount : scrollAmount, behavior: 'smooth' });
        }
    </script>
    <!-- EVENTS END -->

    <!-- DISCOVER ART -->
    <div class="navbar1"><div class="text">DISCOVER ART</div></div>
    <div class="art-wrapper">
        <div class="art-container">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="art-post">
                    <img src="<?= htmlspecialchars($row['image_path']) ?>" alt="<?= htmlspecialchars($row['art_name']) ?>">
                    <div class="art-info">
                        <h2><?= htmlspecialchars($row['art_name']) ?></h2>
                        <p class="art-des"><?= htmlspecialchars($row['art_des']) ?></p>
                        <p><strong>Category:</strong> <?= htmlspecialchars($row['art_categ_id']) ?></p>
                        <p><strong>Date Posted:</strong> <?= htmlspecialchars($row['date_posted']) ?></p>
                    </div>
                    <div class="btn-group">
                        <button class="btn-like">❤️ Like</button>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <!-- DISCOVER ART END -->

    <!-- FEATURED ART MODAL -->
    <div id="artModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="artName"></h2>
            <p><strong>Category:</strong> <span id="artCategory"></span></p>
            <p><strong>Description:</strong> <span id="artDescription"></span></p>
            <p><strong>Posted By:</strong> <span id="artUser"></span></p>
        </div>
    </div>

    <!-- UPLOAD ART -->
    <div class="modal" id="uploadModal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()" style="color: white;">X</span>
            <h2>Upload Your Artwork</h2>
            <form action="upload.php" method="POST" enctype="multipart/form-data" class="upload-form">
                <label>Art Upload:</label>
                <input type="file" name="my_image" accept="image/*" required>
                <label>Category:</label>
                <select name="category" required>
                    <option value="Digital Art">Digital Art</option>
                    <option value="Traditional Art">Traditional Art</option>
                    <option value="Mixed Media">Mixed Media</option>
                    <option value="Photography">Photography</option>
                    <option value="Artisan Crafts">Artisan Crafts</option>
                </select>
                <label>Art Name:</label>
                <input type="text" name="art_name" required>
                <label>Description:</label>
                <textarea name="description" required></textarea>
                <button type="submit" class="submit-btn">Upload</button>
            </form>
        </div>
    </div>
    <!-- UPLOAD END -->

    <!-- MODAL SCRIPT -->    
    <script>
        function openModal() {
            document.getElementById("uploadModal").style.display = "flex";
            document.getElementById("datePosted").valueAsDate = new Date();
        }
        function closeModal() {
            document.getElementById("uploadModal").style.display = "none";
        }
        window.onclick = function(event) {
            let modal = document.getElementById("uploadModal");
            if (event.target === modal) {
                closeModal();
            }
        };
    </script>
    <!-- MODAL SCRIPT END -->

    <!-- FOOTER -->
    <footer class="footer">
            <p href="about.php">&copy; Blank Ink · <a href="about.php" class="footer-link"> About TintaPH</a></p>
    </footer>
</body>
</html>
