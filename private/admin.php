<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #211e1e;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .container {
            width: 100vw !important;
            max-width: 100% !important; 
        }

        .card {
            width: 100%; 
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #007bff;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn-sm {
            border-radius: 8px;
        }
        .logout-btn {
            background-color: #9B9B9B;
            color: white;
            border-radius: 8px;
            padding: 6px 12px;
        }
        .logout-btn:hover {
            background-color:rgb(83, 78, 78);
        }
        .home-btn {
            background-color: #dc3545;
            color: white;
            border-radius: 8px;
            padding: 6px 12px;
        }
        .home-btn:hover {
            background-color:rgb(104, 1, 25);
        }
        .navbar-links{
            display: flex;
            gap: 4px;
        }

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <div class="navbar-links">
                <form action="../public/login.php">
                    <button class="logout-btn">Log Out</button>
                </form>
                <form action="../public/homefeed.php">
                    <button class="home-btn">Home</button>
                </form>
            </div>

        </div>
    </nav>

    <!-- User Table -->
    <div class="container">
        <div class="card p-4">
            <h2 class="text-center mb-4">List of Users</h2>

            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>User Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                include("../public/connection.php");

                $sql = "SELECT * FROM users";
                $res = $con->query($sql);

                if (!$res) {
                    die("Invalid query: " . $con->error);
                }

                while ($row = $res->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['user_id']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['usertype']}</td>
                        <td>
                            <form action='update.php' method='GET' style='display:inline;'>
                                <input type='hidden' name='user_id' value='{$row['user_id']}'>
                                <button type='submit' class='btn btn-primary btn-sm'>Edit</button>
                            </form>

                            <form action='delete.php' method='GET' style='display:inline;'>
                                <input type='hidden' name='user_id' value='{$row['user_id']}'>
                                <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                            </form>
                        </td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
