<?php
// Database connection details
$host = 'localhost'; // Adjust if your DB is hosted on another server
$dbname = 'eadbms1'; // Your database name
$username = 'root'; // Database username
$password = ''; // Database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $attendance_date = $_POST['attendance_date'];
        $attendance_data = $_POST['attendance']; // This will be an associative array of EmployeeID => Status

        foreach ($attendance_data as $employee_id => $status) {
            // Here, you can insert the data into your attendance table in the database
            // Make sure your attendance table has columns matching the ones used here
            $stmt = $pdo->prepare("INSERT INTO attendance (EmployeeID, attendance_date, Status) VALUES (?, ?, ?)");
            $stmt->execute([$employee_id, $attendance_date, $status]);
        }

        // Optionally redirect or display a success message
        echo "Attendance recorded successfully.";
    }
} catch (PDOException $e) {
    die("Database operation failed: " . $e->getMessage());
}
?>
