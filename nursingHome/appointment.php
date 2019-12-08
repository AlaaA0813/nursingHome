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
                <li><a href="doctorhome.php">Home</a></li>
                <li><a href="appointment.php">Appointments</a></li>
                <li><a href="patientofdoc.php">Your Patients</a></li>
                <li><a href="roster.php">Roster</a></li>
            </ul>
        </nav>
        <h1>Appointments Page</h1>
        
        <form action="" method="POST">
            <label for="patient_id">Enter Patient ID: </label>
            <input type="number" name="patient_id" value="<?php echo $_POST['patient_id'] ?? ''; ?>"><br>
            <input type="submit" name="grab_patient" value="Get Patient Name">
            <br>
            <?php
                if (isset($_POST['grab_patient'])) {
                    $patient_id = $_POST['patient_id'];
                    $selectQuery = "SELECT users.firstname, users.lastname FROM `users` JOIN `patients` ON users.ID = patients.ID WHERE patients.ID = '$patient_id';";
                    $result = mysqli_query($conn,$selectQuery);
                    $resultCheck = mysqli_fetch_assoc($result);
                    $firstname = $resultCheck['firstname'];
                    $lastname = $resultCheck['lastname'];
                    echo "
                        <label>Patient First Name: </label><input type='text' name='result_firstname' value='$firstname' required readonly>
                        <label>Patient Last Name: </label><input type='text' name='result_lastname' value='$lastname' required readonly>
                        <label>Patient ID: </label><input type='text' name='result_patient_id' value='$patient_id' required readonly>
                        <br>";
                }
            ?>
            <label>Date: </label><input type="date" name="date" /><br>
            <label>Doctor: </label>
            <select name="doctor">
                <?php
                    $getDoctorInfo = "SELECT ID, firstname, lastname FROM `users` WHERE role = 'doctor'";
                    $result = mysqli_query($conn, $getDoctorInfo);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)){ 
                            $doctor_id = $row['ID'];
                            $drfirstname = $row['firstname'];
                            $drlastname = $row['lastname'];
                            echo "<option value='$doctor_id'>$drfirstname $drlastname</option>";     
                        }
                    }
                ?>       
            </select>
            <br>
            <input type="submit" name="set_appt" value="Set Appointment">
            <input type="submit" name="cancel" value="Cancel">
            <br>
            <?php
                if (isset($_POST['set_appt'])) {
                    $date = $_POST['date'];
                    $patient_id = $_POST['patient_id'];
                    $firstname = $_POST['result_firstname'];
                    $lastname = $_POST['result_lastname'];
                    $doctor_id = $_POST['doctor'];
                    if (($patient_id != '') && ($firstname != '') && ($lastname != '') && ($doctor_id != '') && ($date != '')) {
                        $logAppt = "INSERT INTO `appointments` (patient_id, doctor_id, appt_date, appt_comment, morning_med, afternoon_med, night_med, prescription_served) VALUES ('$patient_id', '$doctor_id', '$date', NULL, NULL, NULL, NULL, 0)";
                        if (mysqli_query($conn, $logAppt)) {
                            echo "You have scheduled an appointment.";
                        } else {
                            echo "Error with scheduling." . mysqli_error($conn);
                        }
                    }
                }
            ?>
            <br>
            <a href="logout.php">Logout</a>

        </form>
    </body>
</html>