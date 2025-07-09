

<?php 


include("newnav.php");

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
    <h2>Generate Attendance Report</h2>
    <form id="reportForm" action="generate_report.php" method="post">
        <div class="form-row">
            <div class="col-md-3">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="department_id">Department ID:</label>
                <input type="text" id="department_id" name="department_id" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="employee_id">Employee ID:</label>
                <input type="text" id="employee_id" name="employee_id" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Generate Report</button>
    </form>
</div>
</body>
</html>
