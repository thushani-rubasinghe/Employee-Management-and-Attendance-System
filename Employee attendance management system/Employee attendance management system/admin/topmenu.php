
<?php 
include("connection.php");
session_start();

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylenav.css">

</head>
<body>

<header>


     <?php 
	 if(isset($_SESSION['login_user']))
	 {
	?>

<nav class="navbar">
		<div class="navdiv">
            
            <div class="logoimg"><img src="img/logo.png"></div>
            <div class="logo" ><a href="index.php"><h1 style="color: white;">Employee attendance management system</h1></a> </div>
			<ul>
            <li><a href="index.php">HOME</a></li>
					<li><a href="profile.php">PROFILE</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
	
			</ul>
		</div>
	</nav>

	<?php
	 }
	 else{?>
		<nav class="navbar">
		<div class="navdiv">
            
            <div class="logoimg"><img src="img/logo.png"></div>
            <div class="logo" ><a href="index.php"><h1 style="color: white;">Employee attendance management system</h1></a> </div>
			<ul>
            		<li><a href="index.php">HOME</a></li>
					<li><a href="admin.php">ADMIN</a></li>
					<li><a href="empinfo.php">EMPLOYEE</a></li>
				
			</ul>
		</div>
	</nav> <?php
	 }
	 
	 ?>






</header>





</body>
</html>