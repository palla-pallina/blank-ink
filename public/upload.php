<?php
include("connection.php"); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $art_categ_id = $_POST['category'];
    $art_name = $_POST['art_name'];
    $art_des = $_POST['description'];
    $date_posted = date("Y-m-d"); // Automatically get the current date
    
    // File Upload Handling
    $target_dir = "uploads/";
    
    // Ensure 'uploads/' directory exists
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $image_name = basename($_FILES["my_image"]["name"]);
    $target_file = $target_dir . $image_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if image file is a valid image
    $check = getimagesize($_FILES["my_image"]["tmp_name"]);
    if ($check === false) {
        die("❌ Error: File is not a valid image.");
    }
    
    // Allow only certain file formats
    $allowed_types = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowed_types)) {
        die("❌ Error: Only JPG, JPEG, PNG & GIF files are allowed.");
    }
    
    // Move the uploaded file
    if (move_uploaded_file($_FILES["my_image"]["tmp_name"], $target_file)) {
        // Insert data into the database
        $stmt = $con->prepare("INSERT INTO art (art_categ_id, art_name, art_des, date_posted, image_path) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $art_categ_id, $art_name, $art_des, $date_posted, $target_file);
        
        if ($stmt->execute()) {
            echo "<script>
                alert('✅ Post uploaded successfully!');
                window.location.href = 'homefeed.php';
            </script>";
            exit();
        } else {
            echo "❌ Error: " . $stmt->error;
        }
    } else {
        echo "❌ Sorry, there was an error uploading your file.";
    }
}
?>
