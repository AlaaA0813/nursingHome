<?php
// connect to the DB
include_once 'db.php';
session_start();
// checks connection, othewrise stop running script and throw error.
if (!$conn) {
    die("Connection failed: " . mysqli_error());
}
if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == "doctor") {
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
        <title>Patient(s) of Doctor</title>
    </head>
    <body>
        <nav class="nav">
            <ul>
                <li><a href="doctorhome.php">Home</a></li>
                <li><a href="appointment.php">Appointments</a></li>
                <li><a href="patientofdoc.php">Your Patients</a></li>
                <li><a href="roster.php">Roster</a></li>
            </ul>
        </nav>
        <h1>Patient(s) of Doctor</h1>
        <form action="" method="POST">
            <table>
                <tr>
                    <th>Date</th>
                    <th>Comment</th>
                    <th>Morning Medication</th>
                    <th>Afternoon Medication</th>
                    <th>Night Medication</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>  
                </tr>
            </table>
            <label>New Prescription</label>
            <table>
                <tr>
                    <th>Comment</th>
                    <th>Morning Medication</th>
                    <th>Afternoon Medication</th>
                    <th>Night Medication</th>   
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table><br>
            <input type="submit" name="addPrescription" value="Add Prescription">
            <input type="submit" name="cancel" value="Cancel">  
            <a href="logout.php">Logout</a>
        </form>
    </body>
</html>