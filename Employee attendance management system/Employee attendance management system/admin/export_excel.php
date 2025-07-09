<?php
// Database connection
$db = mysqli_connect("localhost", "root", "", "eadbms1");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get data from URL
$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];

// Set headers for Excel file download
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Attendance_Report.xls");

// SQL Query to fetch report data
$query = "SELECT e.EmployeeID, e.DepartmentID, e.FirstName, e.LastName, 
                 COUNT(a.status) AS total_days, 
                 SUM(a.status = 'Present') AS present_days,
                 (SUM(a.status = 'Present') / COUNT(a.status)) * 100 AS attendance_percentage
          FROM employee e
          LEFT JOIN attendance a ON e.EmployeeID = a.EmployeeID
          WHERE a.attendance_date BETWEEN '$start_date' AND '$end_date'
          GROUP BY e.EmployeeID";

$result = mysqli_query($db, $query);

// Generate Excel table
echo "Employee ID\tDepartment ID\tFirst Name\tLast Name\tTotal Days\tPresent Days\tAttendance %\n";
while($row = mysqli_fetch_assoc($result)) {
    echo $row['EmployeeID'] . "\t" . $row['DepartmentID'] . "\t" . $row['FirstName'] . "\t" . $row['LastName'] . "\t";
    echo $row['total_days'] . "\t" . $row['present_days'] . "\t" . number_format($row['attendance_percentage'], 2) . "%\n";
}

mysqli_close($db);
?>
