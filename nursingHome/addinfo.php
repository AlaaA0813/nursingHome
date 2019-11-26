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
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8">
        <title>Additional Information of Patient</title>
    </head>
    <body>
        <nav class="nav">
            <ul>
                <li><a href="addinfo.php">Home</a></li>
                <li><a href="role.php">Roles</a></li>
                <li><a href="employee.php">Employee</a></li>
                <li><a href="patients.php">Patients</a></li>
                <li><a href="regapproval.php">Registration Approval</a></li>
                <li><a href="roster.php">Roster</a></li>
                <li><a href="adminreport.php">Admin's Report</a></li>
            </ul>
        </nav>
        <h1>Admin's Home</h1>
        <h2>Additional Information of Patient</h2>
        <form action="" method="POST">
        <? 
  \
            $firstname = $_POST['firstname'] ?? '';
            $lastname = $_POST['lastname'] ?? '';

            $dataquery = "SELECT patient_id FROM `patients` WHERE `patient_id` = '$patientID'";
            $result = mysqli_query($conn,$dataquery);
            $resultcheck = mysqli_fetch_assoc($result);
            $nameID = $resultcheck['patientID'];
            $selectName = "SELECT firstname, lastname FROM `users` WHERE `ID` = '$nameID'";
           
            



        ?>
            <label>Patient ID: </label>
            <input type="number" name="patientID" value="<?php echo $resultcheck['patientID'];  ?>"><br>
            <input type="submit" value="search" name="search">
            <label>Patient Name: <?php echo $nameID['firstname'] . " " . $nameID['lastname']; ?></label>

            <label>Group: </label><input type="text" name="group" /><br>
            <select name="group">
            <option> Choose Which Group: </option>
            <option value="1"> 1 </option>
            <option value="2"> 2 </option>
            <option value="3"> 3 </option>
            <option value="4"> 4 </option>

        </select>  
    <br>
            <label>Admission Date: </label><input type="text" name="admissionDate" /><br>
            <input type="submit" name="ok" value="OK">
            <input type="submit" name="cancel" value="Cancel">

            <a href="logout.php">Logout</a>
        </form>
    </body>
</html>

    