

<?php 
include("connection.php");
?>

<?php 


include("newnav.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmployeeAdd</title>
    <link rel="stylesheet" href="S_Reg.css">
    <link rel="stylesheet" href="style.css">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body  class="login-b">

    <div style="margin-top:-20.5px" class="form">

        <div class="wrapper1">
            
            <form action="" method="post">
                
            
            <h1>Registraion</h1>
                <div class="input-box">
                    <input class="form-control" type="text" name="EmployeeID"  placeholder="EmployeeID" required="" >
                    <i class='bx bxs-user'></i>
                   
                </div> 

                <div class="input-box">
                   <input class="form-control" type="text" name="DepartmentID" placeholder="DepartmentID" required="">
                   <i class='bx bx-rename' ></i>
                </div>

                <div class="input-box">
                   <input class="form-control" type="text" name="FirstName" placeholder="FirstName" required="">
                   <i class='bx bx-rename' ></i>
                </div>

                <div class="input-box">
                   <input class="form-control" type="text" name="LastName" placeholder="LastName" required="">
                   <i class='bx bx-rename' ></i>
                  
                </div>

                <div class="input-box">
                   <input class="form-control" type="text" name="Email" placeholder="Email" required="">
                   <i class='bx bx-rename' ></i>

                </div>

                <div class="input-box">
                   <input class="form-control" type="text" name="password" placeholder="password" required="">
                   <i class='bx bx-rename' ></i>
                  
                </div>
          
                
                <div class="input-box">
                   <input class="form-control" type="text" name="Phone" placeholder="Phone" required="">
                   <i class='bx bx-rename' ></i>
                  
                </div>

                
        <button type="submit" name="submit" class="btn">Add Employee</button>




        <?php
                    if(isset($_POST['submit'])) /*check if the button is press or not*/ 
                    {   
                        $count=0;
                        $sql="SELECT EmployeeID from `employee`";
                        $res=mysqli_query($db,$sql);
                        while($row=mysqli_fetch_assoc($res))
                        {
                           if($row['EmployeeID']==$_POST['EmployeeID']) 
                           $count =$count+1;
                        }

                        if($count==0)
                        {
                            mysqli_query($db, "INSERT INTO `employee` (EmployeeID,DepartmentID,FirstName,LastName,Email,password,Phone) 
                            VALUES (
                                '$_POST[EmployeeID]',
                                '$_POST[DepartmentID]',
                                '$_POST[FirstName]',
                                '$_POST[LastName]',
                                '$_POST[Email]',
                                '$_POST[password]',
                                '$_POST[Phone]'
                            )");
         
                        ?><script type="text/javascript">alert("Registraion Succsessful");</script><?php
                        
                        }
                        else
                        {
                        ?><script type="text/javascript">alert("The user already registered");</script><?php
                        }

                    }

                    
        ?>





</body>                              
</html>