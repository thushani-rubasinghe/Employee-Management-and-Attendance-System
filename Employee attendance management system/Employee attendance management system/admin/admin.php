
<?php 

include("connection.php");
include("nav.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    
</head>

<header>

</header>

<body class="login-b">
 
    <div class="form">

        <div class="wrapper1">
            <form action="" method="post" name="login">
                <h1>Login</h1>
        
                <div class="input-box">
                   <input type="text" name="admin_id" placeholder="admin_id" required>
                   <i class='bx bxs-user' ></i>
                </div>
                <div class="input-box">
                   <input type="password"  name="password" placeholder="Password" required>
                   <i class='bx bxs-lock-alt' ></i>
                  
                </div>
        
                <div class="remember-forgot">
                    <label for=""><input type="checkbox">Remember me</label>
                    <a href="update_password.php">Forgot Password ?</a>
                </div>
        <button type="submit" name="submit" class="btn">Login</button>
        
       
        <div class="register-link">
            <p><br>Don't have an account ? <a href="registration.php">Register</a></p>
        </div>
        </form>
        </div>





</body>








<?php

if(isset($_POST['submit']))
{
    $count=0;
    $res=mysqli_query($db,"SELECT * FROM `admin` WHERE admin_id='$_POST[admin_id]' &&  
    password='$_POST[password]';");

    $row=mysqli_fetch_assoc($res);

    $count=mysqli_num_rows($res);
    if($count==0)
    {
        ?>
         <script type="text/javascript">
            alert("The StudentID and password doesn't match");
            </script>
       
        <?php

    }

    else
    {
        /*if user name and password match*/




        $_SESSION['login_user']= $_POST['admin_id'];

        ?>
        <script type="text/javascript">
        window.location = "index.php";
        </script>
        <?php  
    }
}

?>


</div>


</html>