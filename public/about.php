<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>about</title>
</head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* General Page Styling */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            scroll-behavior: smooth;
        }

        /* Sticky Navbar */
        .navbar {
    background-color: rgba(0, 0, 0, 0.8); /* Black */
}


        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: white !important;
        }

        .nav-link {
            color: white !important;
            font-size: 1rem;
        }

        .nav-link:hover {
    color: #ff69b4 !important; /* Pink */
}

        /* Full-screen Sections with Background Images */
        .section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        #section1 {
            background-image: url('https://wallpaperaccess.com/full/1375524.jpg');
        }

        #section2 {
            background-image: url('https://2.bp.blogspot.com/-4y73LKDEfW4/VP0dQ4y0FvI/AAAAAAAAKSY/K7L-dw_LQbM/s1600/_EL15860-Muslim%2Bin%2Bthe%2BPhilippines.jpg');
        }

        #section3 {
            background-image: url('https://images.fineartamerica.com/images/artworkimages/mediumlarge/2/1-manila-philippines-skyline-michael-tompsett.jpg');
        }

        #section4 {
            background-image: url('https://i.pinimg.com/736x/05/1f/b6/051fb6bd7e83a18ae75a3e456fce3a21.jpg');
        }

        /* Overlay for Better Text Visibility */
        .overlay {
            background: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 10px;
        }
    </style>
 
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">TintaPh</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#section4">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#section2">Event</a></li>
                    <li class="nav-item"><a class="nav-link" href="#section3">Contact</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-light text-primary px-3" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Scrollable Sections with Different Backgrounds -->
    <div id="section1" class="section">
        <div class="overlay">
            <h1>Welcome to TintaPh</h1>
            <p>Your creative space for ink and art.</p>
        </div>
    </div>

    <div id="section2" class="section">
        <div class="overlay">
            <h1>Our Events</h1>
            <p>Discover our latest art exhibits and workshops.</p>
        </div>
    </div>

    <div id="section3" class="section">
        <div class="overlay">
            <h1>Get in Touch</h1>
            <p>We'd love to hear from you!</p>
        </div>
    </div>

    <div id="section4" class="section">
        <div class="overlay">
            <h1>about</h1>
            <p>Join our community and showcase your art.</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
