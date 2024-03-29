<?php
// connect to the DB
include_once 'db.php';
session_start();
// checks connection, othewrise stop running script and throw error.
if (!$conn) {
    die("Connection failed: " . mysqli_error());
}
if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == "admin") {
} else {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8">
        <title>Admin's Report</title>
    </head>
    <body>
        <nav class="nav">
            <ul>
                <li><a href="regapproval.php">Home</a></li>
                <li><a href="role.php">Roles</a></li>
                <li><a href="employee.php">Employee</a></li>
                <li><a href="patients.php">Patients</a></li>
                <li><a href="addinfo.php">Add Patient Info</a></li>
                <li><a href="roster.php">Roster</a></li>
                <li><a href="adminreport.php">Admin's Report</a></li>
            </ul>
        </nav>
        <h1>Admin's Report</h1>
        <form action="" method="POST">
            <label>Date: </label><input type="text" name="date" /><br>
            <input type="submit" name="missedPatientActivity" value="Missed Patient Activity">    
            <table>
                <tr>
                    <th>Patient's Name</th>
                    <th>Doctor's Name</th>
                    <th>Doctor's Appointment</th>
                    <th>Caregiver's Name</th>
                    <th>Morning Medicine</th>
                    <th>Afternoon Medicine</th>
                    <th>Night Medicine</th>
                    <th>Breakfast</th>
                    <th>Lunch</th>
                    <th>Dinner</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="checkbox" name="doctorsAppt" /></td>
                    <td></td>
                    <td><input type="checkbox" name="morningMed" /></td>
                    <td><input type="checkbox" name="afternoonMed" /></td>
                    <td><input type="checkbox" name="nightMed" /></td>
                    <td><input type="checkbox" name="breakfast" /></td>
                    <td><input type="checkbox" name="lunch" /></td>
                    <td><input type="checkbox" name="dinner" /></td>
                </tr>
            </table>
            <a href="logout.php">Logout</a>
        </form>
    </body>
</html>