<?php 
include("connection.php");
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="login-b">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Registration</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="admin_id">Admin ID</label>
                                <input class="form-control" type="text" name="admin_id" id="admin_id" placeholder="Admin ID" required>
                                <i class='bx bxs-user'></i>
                            </div> 

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                                <i class='bx bx-rename'></i>
                            </div>

                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input class="form-control" type="text" name="full_name" id="full_name" placeholder="Full Name" required>
                                <i class='bx bx-rename'></i>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="Email" required>
                                <i class='bx bx-rename'></i>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign Up</button>
                            <div class="register-link text-center mt-3">
                                <p>Already have an account? <a href="admin.php">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (isset($_POST['submit'])) /*check if the button is pressed or not*/ 
        {   
            $count = 0;
            $sql = "SELECT admin_id FROM `admin`";
            $res = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                if ($row['admin_id'] == $_POST['admin_id']) 
                    $count = $count + 1;
            }

            if ($count == 0) {
                mysqli_query($db, "INSERT INTO `admin` (admin_id, password, full_name, email) 
                VALUES (
                    '$_POST[admin_id]',
                    '$_POST[password]',
                    '$_POST[full_name]',
                    '$_POST[email]'
                )");
                ?><script type="text/javascript">alert("Registration Successful");</script><?php
            } else {
                ?><script type="text/javascript">alert("The user is already registered");</script><?php
            }
        }
        ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>                              
</html>
