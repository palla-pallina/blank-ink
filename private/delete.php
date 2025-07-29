<?php
include("../public/connection.php"); // Ensure this file correctly connects to the database

if (isset($_GET['user_id'])) {
    $id = intval($_GET['user_id']); // Prevent SQL injection

    // Fetch user data before deleting
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $con->prepare($sql);

    if (!$stmt) {
        die("❌ SQL Error: " . $con->error); // Debugging line
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();

        // Archive user before deleting
        $sqlArchive = "INSERT INTO archived_users (user_id, username, email, phone, firstname, lastname, middlename, usertype) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtArchive = $con->prepare($sqlArchive);

        if (!$stmtArchive) {
            die("❌ Archive SQL Error: " . $con->error); // Debugging line
        }

        $stmtArchive->bind_param("isssssss", $row['user_id'], $row['username'], $row['email'], $row['phone'], $row['firstname'], $row['lastname'], $row['middlename'], $row['usertype']);
        
        if ($stmtArchive->execute()) {
            // Delete user from the original table
            $sqlDelete = "DELETE FROM users WHERE user_id = ?";
            $stmtDelete = $con->prepare($sqlDelete);

            if (!$stmtDelete) {
                die("❌ Delete SQL Error: " . $con->error); // Debugging line
            }

            $stmtDelete->bind_param("i", $id);
            $stmtDelete->execute();

            echo "<script>
                alert('✅ User successfully archived and deleted!');
                window.location.href = 'admin.php';
            </script>";
            exit();
        } else {
            echo "❌ Error: " . $stmtArchive->error;
        }
    } else {
        echo "❌ Error: User not found.";
    }
}

?>