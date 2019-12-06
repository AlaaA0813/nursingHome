<?php
// connect to the DB
include_once 'db.php';
session_start();
// checks connection, othewrise stop running script and throw error.
if (!$conn) {
    die("Connection failed: " . mysqli_error());
}
if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == "supervisor") {
} else {
    header("location: login.php");
}
?>
 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8">
        <title>Appointments Page</title>
    </head>
    <body>
        <nav class="nav">
            <ul>
                <li><a href="roster.php">Home</a></li>
                <li><a href="newroster.php"> New Roster</a></li>
                <li><a href="appointment.php">Appointments</a></li>
            </ul>
        </nav>
        <h1>Appointments Page</h1>
        <form action="" method="POST">
            <label>Date: </label><input type="text" name="date" /><br>
            <label>Doctor: </label>
            <select name="DOCTORDROPDOWN">
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select><br>
            <input type="submit" name="Set Appointment" value="Set Appointment">
            <input type="submit" name="cancel" value="Cancel">
            <a href="logout.php">Logout</a>
        </form>
    </body>
</html>