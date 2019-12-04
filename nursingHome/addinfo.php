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
                <li><a href="regapproval.php">Home</a></li>
                <li><a href="role.php">Roles</a></li>
                <li><a href="employee.php">Employee</a></li>
                <li><a href="patients.php">Patients</a></li>
                <li><a href="addinfo.php">Add Patient Info</a></li>
                <li><a href="roster.php">Roster</a></li>
                <li><a href="adminreport.php">Admin's Report</a></li>
            </ul>
        </nav>
        <h1>Admin's Home</h1>
        <h2>Additional Information of Patient</h2>

        <!--show before entering data then the rest pops up after ID entered-->
        <form method="POST">
            <label for="patient_id">Enter Patient ID: </label>
                <input type="number" name="patient_id" value="<?php echo $_POST['patient_id'] ?? ''; ?>"><br>
                <input type="submit" name="grab_patient">
        </form>

         <?php
            //if entered number select name from users table and match the ID
            if (isset($_POST['grab_patient'])) {
                $patient_id = $_POST['patient_id'];
                $selectQuery = "SELECT users.firstname, users.lastname FROM `users` JOIN `patients` ON users.ID = patients.ID WHERE patients.ID = '$patient_id';";
                $result = mysqli_query($conn,$selectQuery);
                $resultCheck = mysqli_fetch_assoc($result);

                echo "
                    <form method='post'>
                    <!--shows name of PATIENT-->
                        <p>Patient Name: ".$resultCheck['firstname'].' '.$resultCheck['lastname']."</p>
                        <label for'patient_id'>Patient ID</label>
                        <input type='text' name='patient_id' value='$patient_id'required readonly>
                        <label for='group'>Group</label>
                        <input type='number' name='group' required>
                        <label for='admission_date'>Admission Date</label>
                        <input type='date' name='admission_date' required>
                        <input type='submit' name='update'>
                    </form>
                    ";
            } 

            //add patient info to table
            
            if (isset($_POST['update'])) {
                $patient_id = $_POST['patient_id'];
                $group = $_POST['group'];
                $admission_date = $_POST['admission_date'];
                
                $dataQuery = "UPDATE `patients` SET groupnum = '$group', admission_date = '$admission_date' WHERE patients.ID = '$patient_id';";
                mysqli_query($conn,$dataQuery);
                echo "Info has been added";
            }  
        ?> 
        <a href="logout.php">Logout</a>
    </body>
</html>

    