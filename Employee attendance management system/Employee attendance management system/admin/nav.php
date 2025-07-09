<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

    <style>
        /* Gradient Animation for Navbar */
        .navbar-inverse {
            background: linear-gradient(270deg, #1e3c72, #2a5298);
            background-size: 400% 400%;
            animation: gradientAnimation 8s ease infinite;
            border: none;
        }

        /* Gradient Animation Keyframes */
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Styling for Navbar Links */
        .navbar-inverse .navbar-nav > li > a {
            color: white;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .navbar-inverse .navbar-nav > li > a:hover {
            color: #ffd700; /* Gold color on hover */
        }

        /* Highlighted User Profile Text */
        .navbar-inverse .navbar-nav .navbar-right > li > a > div {
            color: #ffd700;
            font-weight: bold;
        }

        /* Adjusts section margin */
        section {
            margin-top: -20px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand active" href="#">Employee Attendance Management System</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
        </ul>
        
        <?php if (isset($_SESSION['login_user'])) { ?>
            <!-- Links for Logged-in Users -->
            <ul class="nav navbar-nav">
                <li><a href="Mark-Attendance.php">Mark Attendance</a></li>
                <li><a href="empinfo.php">Reports</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="profile.php">
                    <div><?php echo " " . $_SESSION['login_user']; ?></div>
                </a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
            </ul>
        <?php } else { ?>
            <!-- Links for Guests -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="admin.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
            </ul>
        <?php } ?>
    </div>
</nav>

</body>
</html>
