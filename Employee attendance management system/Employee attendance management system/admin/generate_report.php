

<?php 


include("newnav.php");

?>












<?php
// Database connection
$db = mysqli_connect("localhost", "root", "", "eadbms1");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Getting form input data
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$department_id = $_POST['department_id'];
$employee_id = $_POST['employee_id'];

// SQL Query to Join Tables and Filter Data
$query = "SELECT e.EmployeeID, e.DepartmentID, e.FirstName, e.LastName, 
                 COUNT(a.status) AS total_days, 
                 SUM(a.status = 'Present') AS present_days,
                 (SUM(a.status = 'Present') / COUNT(a.status)) * 100 AS attendance_percentage
          FROM employee e
          LEFT JOIN attendance a ON e.EmployeeID = a.EmployeeID
          WHERE a.attendance_date BETWEEN '$start_date' AND '$end_date'";

if (!empty($department_id)) {
    $query .= " AND e.DepartmentID = '$department_id'";
}
if (!empty($employee_id)) {
    $query .= " AND e.EmployeeID = '$employee_id'";
}

$query .= " GROUP BY e.EmployeeID";

$result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Attendance Report</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Department ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Total Days</th>
                <th>Present Days</th>
                <th>Attendance %</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['EmployeeID']; ?></td>
                <td><?php echo $row['DepartmentID']; ?></td>
                <td><?php echo $row['FirstName']; ?></td>
                <td><?php echo $row['LastName']; ?></td>
                <td><?php echo $row['total_days']; ?></td>
                <td><?php echo $row['present_days']; ?></td>
                <td><?php echo number_format($row['attendance_percentage'], 2); ?>%</td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <a href="export_pdf.php?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>" class="btn btn-success">Download as PDF</a>
    <a href="export_excel.php?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>" class="btn btn-success">Download as Excel</a>
</div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($db);
?>
