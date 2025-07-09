<?php 


include("newnav.php");

?>



<?php
// Database connection details
$host = 'localhost'; // Adjust if your DB is hosted on another server
$dbname = 'eadbms1'; // Your database name
$username = 'root'; // Database username
$password = ''; // Database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch employee data from `employee` table
    $stmt = $pdo->query("SELECT EmployeeID, FirstName, LastName FROM employee");
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Attendance</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Mark Attendance</h2>
    <form action="submit_attendance.php" method="post">
        <div class="form-group">
            <label for="attendanceDate">Select Date:</label>
            <input type="date" class="form-control" id="attendanceDate" name="attendance_date" required>
        </div>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?= htmlspecialchars($employee['EmployeeID']) ?></td>
                    <td><?= htmlspecialchars($employee['FirstName']) ?></td>
                    <td><?= htmlspecialchars($employee['LastName']) ?></td>
                    <td>
                        <select name="attendance[<?= $employee['EmployeeID'] ?>]" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                            <option value="Late">Late</option>
                        </select>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Submit Attendance</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
