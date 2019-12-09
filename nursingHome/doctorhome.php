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
        <title>Doctor's Home</title>
    </head>
    <body>
        <nav class="nav">
            <ul>
                <li><a href="doctorhome.php">Home</a></li>
                <li><a href="patientofdoc.php">Your Patients</a></li>
                <li><a href="roster.php">Roster</a></li>
            </ul>
        </nav>
        <h1>Doctor's Home</h1>
        <?php

            echo "<table>";
                echo "<tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Appointment Date</th>
                    <th>Comments</th>
                    <th>Morning Medication</th>
                    <th>Afternoon Medication</th>
                    <th>Night Medication</th>
                </tr>";
                echo "<form action='' method='POST'>";
                     echo "<tr>";
                        echo "<td><input type='text' placeholder='Search By First Name' name='srchfName' /></td>";
                        echo "<td><input type='text' placeholder='Search By Last Name' name='srchlName' /></td>";
                        echo "<td><input type='text' placeholder='Search By Date' name='srchDate' /></td>"; 
                        echo "<td><input type='text' placeholder='Search By Comment' name='srchComment' /></td>";
                        echo "<td><input type='text' placeholder='Search By Morning Medication' name='srchMornMed' /></td>";
                        echo "<td><input type='text' placeholder='Search By Afternoon Medication' name='srchAnMed' /></td>";
                        echo "<td><input type='text' placeholder='Search By Night Medication' name='srchNightMed' /></td>";
                        echo "<td><input type='submit' name='search' value='Search'/></td>";
                    echo "</tr>";
                echo "</form>";

            if (isset($_POST['search'])) {
                $srchfName = $_POST['srchfName'] ?? '';
                $srchlName = $_POST['srchlName'] ?? '';
                $srchDate = $_POST['srchDate'] ?? '';
                $srchComment = $_POST['srchComment'] ?? '';
                $srchMornMed = $_POST['srchMornMed'] ?? '';
                $srchAnMed = $_POST['srchAnMeD'] ?? '';
                $srchNightMed = $_POST['srchNightMed'] ?? '';

                if ($srchfName != '') {
                    $result = $getPatientInfo . " AND users.firstname LIKE '%$srchfName%'";
                }
                if ($srchlName != '') {
                    $result = $getPatientInfo . " AND users.lastname LIKE '%$srchlName%'";
                }
                if ($srchDate != '') {
                    $result = $getPatientInfo . " AND appointments.appt_date LIKE '%$srchDate%'";
                }
                if ($srchComment != '') {
                    $result = $getPatientInfo . " AND appointments.appt_comment LIKE '%$srchComment%'";
                }
                if ($srchMornMed != '') {
                    $result = $getPatientInfo . " AND appointments.morning_med LIKE '%$srchMornMed%'";
                }
                if ($srchAnMed != '') {
                    $result = $getPatientInfo . " AND appointments.afternoon_med LIKE '%$srchAnMed%'";
                }
                if ($srchNightMed != '') {
                    $result = $getPatientInfo . " AND appointments.night_med LIKE '%$srchNightMed%'";
                }
                $showSrchResult = mysqli_query($conn, $result);
                $resultCheck = mysqli_num_rows($showSrchResult);
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($showSrchResult)) {
                        echo "<tr>";
                            echo "<td name='firstName'>" . $row['firstname'] . "</td>";
                            echo "<td name='lastName'>" . $row['lastname'] . "</td>";
                            echo "<td name='date'>" . $row['appt_date'] . "</td>";
                            echo "<td name='comment'>" . $row['appt_comment'] . "</td>";
                            echo "<td name='morningMed'>" . $row['morning_med'] . "</td>";
                            echo "<td name='afternoonMed'>" . $row['afternoon_med'] . "</td>";
                            echo "<td name='nightMed'>" . $row['night_med'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table";
                }
            }
        ?>
        </form>
        <form action="" method="POST">
            <label>Appointment: </label><input type="text" name="tilldate" placeholder="Till Date" /><input type="submit" name="searchAppt" value="Search">
            <table>
                <tr>
                    <th>Patient</th>
                    <th>Date</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </form>
        <a href="logout.php">Logout</a>
    </body>
</html>