<?php
include("connection.php"); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $event_name  = isset($_POST['event_name']) ? trim($_POST['event_name']) : null;
    $organized_by= isset($_POST['organized_by']) ? trim($_POST['organized_by']) : null;
    $category    = isset($_POST['category']) ? trim($_POST['category']) : null;
    $venue       = isset($_POST['venue']) ? trim($_POST['venue']) : null;
    $street      = isset($_POST['street']) ? trim($_POST['street']) : null;
    $barangay    = isset($_POST['barangay']) ? trim($_POST['barangay']) : null;
    $city        = isset($_POST['city']) ? trim($_POST['city']) : null;
    $province    = isset($_POST['province']) ? trim($_POST['province']) : null;
    $start_date  = isset($_POST['start_date']) ? trim($_POST['start_date']) : null;
    $end_date    = isset($_POST['end_date']) ? trim($_POST['end_date']) : null;
    $start_time  = isset($_POST['start_time']) ? trim($_POST['start_time']) : null;
    $end_time    = isset($_POST['end_time']) ? trim($_POST['end_time']) : null;
    $description = isset($_POST['description']) ? trim($_POST['description']) : null;

    // File Upload Handling
    $target_dir = "event_pic/";
    
    // Ensure 'event_pic/' directory exists
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
    if (!move_uploaded_file($_FILES["my_image"]["tmp_name"], $target_file)) {
        die("❌ Error uploading the file.");
    }

    // Validate that the start date is before or equal to the end date
    if (strtotime($start_date) > strtotime($end_date)) {
        die("❌ Error: Start date must be before or equal to the end date.");
    }

    // Prepare the INSERT statement with image path included
    $stmt = $con->prepare("INSERT INTO eventss (event_name, organized_by, category, venue, street, barangay, city, province, event_start_date, event_end_date, event_start_time, event_end_time, description, image_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $con->error);
    }

    // Bind parameters
    $stmt->bind_param("ssssssssssssss", $event_name, $organized_by, $category, $venue, $street, $barangay, $city, $province, $start_date, $end_date, $start_time, $end_time, $description, $target_file);
    if ($stmt->execute()) {
        echo "<script>
            alert('✅ Post uploaded successfully!');
            window.location.href = 'event.php';
        </script>";
        exit();
    } else {
        die("❌ Error executing query: " . $stmt->error);
    }

    $stmt->close();
} else {
    header("Location: event.php");
    exit;
}
?>
