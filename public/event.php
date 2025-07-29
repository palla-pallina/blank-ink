<?php
include("connection.php"); 

$eventQuery = "
    SELECT image_path, event_name, organized_by, category, venue, street, barangay, city, province, event_start_date, event_end_date, event_start_time, event_end_time, description
    FROM eventss 
    -- WHERE MONTH(event_start_date) = MONTH(CURRENT_DATE) 
    --   AND YEAR(event_start_date) = YEAR(CURRENT_DATE)
    ORDER BY event_start_date ASC
";

$eventResult = $con->query($eventQuery);
if (!$eventResult) {
    die("Query Failed: " . $con->error);
}

function formatEventDateRange($start_date, $end_date) {
    $start = new DateTime($start_date);
    $end   = new DateTime($end_date);
    
    if ($start->format('Y-m-d') === $end->format('Y-m-d')) {
        return $start->format('M j, Y');
    } elseif ($start->format('M Y') === $end->format('M Y')) {
        return $start->format('M j') . '–' . $end->format('j, Y');
    } else {
        return $start->format('M j, Y') . ' – ' . $end->format('M j, Y');
    }
}

function formatEventTimeRange($start_time, $end_time) {
    // Try H:i:s first, then H:i
    $start = DateTime::createFromFormat('H:i:s', $start_time) ?: DateTime::createFromFormat('H:i', $start_time);
    $end   = DateTime::createFromFormat('H:i:s', $end_time)   ?: DateTime::createFromFormat('H:i', $end_time);
    
    if ($start && $end) {
        if ($start->format('H:i') === $end->format('H:i')) {
            return $start->format('g:i A');
        } else {
            return $start->format('g:i A') . ' – ' . $end->format('g:i A');
        }
    }
    return $start_time;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>tintaPH</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="icon" type="image/x-icon" href="../stylesheets/assets/favicon.svg">
    <link rel="stylesheet" href="../stylesheets/event.css">
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
                <li><a href="event.php" class="nav-links active-link">Event</a></li>
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

    <!-- FEATURED EVENTS -->
    <div class="navbar1"><div class="text">DISCOVER EVENTS</div></div>
    <div class="event-wrapper">
        <div class="event-container">
            <?php while ($event = $eventResult->fetch_assoc()): ?>
                <div class="event-post">
                    <p><?= formatEventDateRange($event['event_start_date'], $event['event_end_date']) ?></p>
                    <img src="<?= htmlspecialchars($event['image_path']) ?>" alt="<?= htmlspecialchars($event['event_name']) ?>">
                    <div class="event-info">
                        <h1><?= htmlspecialchars($event['event_name']) ?></h1>
                        <h3><?= htmlspecialchars($event['venue']) ?></h3>

                        <p><strong>Organized by: </strong><?= htmlspecialchars($event['organized_by']) ?></p>
                        <p><?= htmlspecialchars($event['description']) ?></p>
                        <p><strong>Location:</strong> <?= htmlspecialchars($event['venue']) ?>, <?= htmlspecialchars($event['street']) ?> <?= htmlspecialchars($event['barangay']) ?>, <?= htmlspecialchars($event['city']) ?>, <?= htmlspecialchars($event['province']) ?>   </p>




                        <p><strong>Date:</strong> <?= formatEventDateRange($event['event_start_date'], $event['event_end_date']) ?></p>
                        <p><strong>Time:</strong> <?= formatEventTimeRange($event['event_start_time'], $event['event_end_time']) ?></p>
                        <p><i><?= htmlspecialchars($event['category']) ?></i></p>
                    </div>
                    <div class="btn-group">
                        <button class="btn-like">❤️ Like</button>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <!-- FEATURED EVENTS END -->

    <!-- FOOTER -->
    <footer class="footer">
        <p href="about.php">&copy; Blank Ink · <a href="about.php" class="footer-link"> About TintaPH</a></p>
    </footer>
    <!-- FOOTER END -->    

    <!-- CREATE EVENT -->
     <div class="modal" id="uploadModal">
        <div class="modal-content">
        <span class="close-btn" onclick="closeModal()" style="color: white;">X</span>
        <h2>Create Event</h2>
        <form action="post_event.php" method="POST" enctype="multipart/form-data" class="upload-form">
            <div class="mod_event_info">
            <label>Event Upload:</label>
            <div class="upl-image">
                <input type="file" name="my_image"  accept="image/*" required><br>
            </div>

                    <label>Category:</label>
                    <select name="category" required >
                        <option value="Convention">Convention</option>
                        <option value="Exhibit">Exhibit</option>
                        <option value="Auction">Auction</option>
                        <option value="Workshop">Workshop</option>
                        <option value="Contest">Contest</option>
                    </select><br>
                    <label>Event Name:</label>
                    <input type="text" id="event_name" name="event_name" required><br>
                    <label>Organized By:</label>
                    <input type="text" id="organized_by" name="organized_by" required><br>
                    <label>Venue:</label>
                    <input type="text" id="venue" name="venue" required><br>
                    <label>Street:</label>
                    <input type="text" id="street" name="street">
                    <label>Barangay:</label>
                    <input type="text" id="barangay" name="barangay"><br>
                    <label>City:</label><br>
                    <input type="text" id="city" name="city" required><br>
                    <label>Province:</label>
                    <input type="text" id="province" name="province" required><br>
                    <label for="start_date" class="form-label">Start Date:</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required><br>
                    <label for="end_date" class="form-label">End Date:</label><br>
                    <input type="date" class="form-control" id="end_date" name="end_date" required><br>
                    <label for="start_time" class="form-label">Start Time:</label><br>
                    <input type="time" class="form-control" id="start_time" name="start_time" required><br>
                    <label for="end_time" class="form-label">End Time:</label>
                    <input type="time" class="form-control" id="end_time" name="end_time" required><br>
                    <label>Description:</label>
                    <textarea name="description" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Upload</button>
     </div>

     <!-- MODAL SCRIPT -->
     <script>
        function openModal() {
            document.getElementById("uploadModal").style.display = "flex";
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
    <!-- CREATE EVENT END -->

</body>
</html>