<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Update User</title>
</head>
<body class="container mt-5">

<h2 class="text-center mb-4">Update User Data</h2>

<?php
include("../public/connection.php");

// Fetch user data
if (isset($_GET['user_id'])) { 
    $id = intval($_GET['user_id']); // Prevent SQL injection

    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        ?>

        <form method="POST" class="border p-4 rounded shadow">
            <input type="hidden" name="record_id" value="<?php echo $row['user_id']; ?>">

            <div class="mb-3">
                <label for="txt_uname" class="form-label">Username:</label>
                <input type="text" class="form-control" name="txt_uname" value="<?php echo $row['username']; ?>">
            </div>

            <div class="mb-3">
                <label for="txt_email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="txt_email" value="<?php echo $row['email']; ?>">
            </div>

            <div class="mb-3">
                <label for="txt_phone" class="form-label">Phone Number:</label>
                <input type="text" class="form-control" name="txt_phone" value="<?php echo $row['phone']; ?>">
            </div>

            <div class="mb-3">
                <label for="txt_ut" class="form-label">User Type:</label>
                <input type="text" class="form-control" name="txt_ut" value="<?php echo $row['usertype']; ?>">
            </div>

            <div class="d-flex justify-content-between">
                <a href="admin.php" class="btn btn-secondary">Back</a>
                <input type="submit" name="btn_update" class="btn btn-primary" value="Update">
            </div>
        </form>

        <?php
    } else {
        echo '<script>alert("No user found!"); window.location.href="admin.php";</script>';
    }
} else {
    echo '<script>alert("Invalid request! No ID provided."); window.location.href="admin.php";</script>';
}
?>

</body>
</html>

<?php
// Handle update
if (isset($_POST['btn_update'])) {
    include("connection.php");

    $id = intval($_POST['record_id']);
    $un = $_POST['txt_uname'];
    $email = $_POST['txt_email'];
    $phone = $_POST['txt_phone']; // Fetch phone input
    $fn = $_POST['txt_fname'];
    $ln = $_POST['txt_ln'];
    $mn = $_POST['txt_mn'];
    $ut = $_POST['txt_ut'];

    // Secure update query
    $sqlUpdate = "UPDATE users  
                  SET username=?, email=?, phone=?, firstname=?, lastname=?, middlename=?, usertype=?
                  WHERE user_id=?";
    $stmtUpdate = $con->prepare($sqlUpdate);
    $stmtUpdate->bind_param("sssssssi", $un, $email, $phone, $fn, $ln, $mn, $ut, $id);

    if ($stmtUpdate->execute()) {
        echo '<script>alert("Data updated successfully!"); window.location.href="admin.php";</script>';
    } else {
        echo '<script>alert("Failed to update! Kindly check again.");</script>';
    }
}
?>