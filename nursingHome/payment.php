<?php
// connect to the DB
include_once 'db.php';
session_start();
// checks connection, othewrise stop running script and throw error.
if (!$conn) {
    die("Connection failed: " . mysqli_error());
}
if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == "patient") {
} else {
    header("location: login.php");
}
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8">
        <title>Payment</title>
    </head>
    <body>
        <nav class="nav">
            <ul>
                <li><a href="patienthome.php">Home</a></li>
                <li><a href="payment.php">Payment</a></li>
            </ul>
        </nav>
        <form action="" method="POST">
        <h1>Payment</h1>
            <label>Patient ID: </label><input type="text" name="patientID" /><br>
            <label>Total Due: </label><input type="text" name="totalDue" /><br>
            <label>New Payment: </label><input type="text" name="newPayment" /><br>
            <ul>
                <li>$10 for every day</li>
                <li>$50 for every appointment</li>
                <li>$5 for every medicine/month</li>
            </ul><br>
            <input type="submit" name="makePayment" value="Make Payment">
            <input type="submit" name="cancel" value="Cancel">
            <a href="logout.php">Logout</a>
        </form>
    </body>
</html>

    