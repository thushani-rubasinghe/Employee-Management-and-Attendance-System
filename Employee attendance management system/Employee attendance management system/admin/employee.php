<?php 
include("connection.php");
include("nav.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

  <style>
    body {
      font-family: "Lato", sans-serif;
      transition: background-color .5s;
    }
    .search-container {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
  </style>
</head>

<body>

<div class="container">
  <h1>Employees Information</h1>

  <?php if (isset($_SESSION['login_user'])) { ?>
    <!-- Advanced Search Bar -->
    <div class="search-container" style="margin-bottom: 20px;">
      <form action="" class="form-inline" method="post" name="searchForm">
        <input class="form-control" type="text" name="employee_id" placeholder="Employee ID">
        <input class="form-control" type="text" name="first_name" placeholder="First Name">
        <input class="form-control" type="text" name="last_name" placeholder="Last Name">
        <input class="form-control" type="text" name="email" placeholder="Email">
        <input class="form-control" type="text" name="phone" placeholder="Phone">
        <input class="form-control" type="text" name="department" placeholder="Department ID">
        <button class="btn btn-primary" type="submit" name="search">Search</button>
      
      </form>
    </div>

    <?php
    // Advanced search functionality
    if (isset($_POST['search'])) {
      $conditions = [];

      if (!empty($_POST['employee_id'])) {
        $conditions[] = "EmployeeID LIKE '%" . $_POST['employee_id'] . "%'";
      }
      if (!empty($_POST['first_name'])) {
        $conditions[] = "FirstName LIKE '%" . $_POST['first_name'] . "%'";
      }
      if (!empty($_POST['last_name'])) {
        $conditions[] = "LastName LIKE '%" . $_POST['last_name'] . "%'";
      }
      if (!empty($_POST['email'])) {
        $conditions[] = "Email LIKE '%" . $_POST['email'] . "%'";
      }
      if (!empty($_POST['phone'])) {
        $conditions[] = "Phone LIKE '%" . $_POST['phone'] . "%'";
      }
      if (!empty($_POST['department'])) {
        $conditions[] = "DepartmentID LIKE '%" . $_POST['department'] . "%'";
      }

      $query = "SELECT EmployeeID, FirstName, LastName, Email, Phone, DepartmentID FROM `employee`";
      if (count($conditions) > 0) {
        $query .= " WHERE " . implode(" AND ", $conditions);
      }

      $result = mysqli_query($db, $query);
    } else {
      $result = mysqli_query($db, "SELECT EmployeeID, FirstName, LastName, Email, Phone, DepartmentID FROM `employee` ORDER BY `FirstName` ASC");
    }

    // Export to Excel functionality
    if (isset($_POST['export'])) {
      exportToExcel($db, $query);

  
      
    }

    function exportToExcel($db, $query) {
      header("Content-Type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename=EmployeeData.xls");
      $result = mysqli_query($db, $query);
      echo "EmployeeID\tFirstName\tLastName\tEmail\tPhone\tDepartmentID\n";

      while ($row = mysqli_fetch_assoc($result)) {
        echo $row['EmployeeID'] . "\t" . $row['FirstName'] . "\t" . $row['LastName'] . "\t" . $row['Email'] . "\t" . $row['Phone'] . "\t" . $row['DepartmentID'] . "\n";
      }
      exit();
    }

    // Display search results in a table
    if ($result && mysqli_num_rows($result) > 0) {
      echo "<table class='table table-bordered table-hover'>";
      echo "<tr style='background-color:#ceff00;'>";
      echo "<th>EmployeeID</th>";
      echo "<th>FirstName</th>";
      echo "<th>LastName</th>";
      echo "<th>Email</th>";
      echo "<th>Phone</th>";
      echo "<th>DepartmentID</th>";
      echo "</tr>";

      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['EmployeeID'] . "</td>";
        echo "<td>" . $row['FirstName'] . "</td>";
        echo "<td>" . $row['LastName'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Phone'] . "</td>";
        echo "<td>" . $row['DepartmentID'] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "<p>No employees found with the given search criteria.</p>";
    }
    ?>
  <?php } else { ?>
    <script type="text/javascript">
      alert("To see the information, please login first!");
    </script>
    <?php header("location:admin.php"); ?>
  <?php } ?>
</div>

</body>
</html>
