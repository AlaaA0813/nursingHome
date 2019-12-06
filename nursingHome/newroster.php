
<?php
// connect to the DB
include_once 'db.php';
session_start();
// checks connection, othewrise stop running script and throw error.
if (!$conn) {
    die("Connection failed: " . mysqli_error());
}
if(($_SESSION['loggedIn'] = true) && ($_SESSION['role'] == "supervisor") || $_SESSION['role'] == "admin") {
    
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
        <title>New Roster</title>
    </head>
    <body>
        <?php
        if ($_SESSION['role'] == "supervisor"){
            echo '<nav class="nav">';
                echo '<ul>';
                    echo '<li><a href="roster.php">Home</a></li>';
                    echo '<li><a href="newroster.php">New Roster</a></li>';
                echo '</ul>';
            echo '</nav>';
        }
        if ($_SESSION['role'] == "admin") {
            echo '<ul>';
                echo '<li><a href="addinfo.php">Home</a></li>';
                echo '<li><a href="role.php">Roles</a></li>';
                echo '<li><a href="employee.php">Employee</a></li>';
                echo '<li><a href="patients.php">Patients</a></li>';
                echo '<li><a href="regapproval.php">Registration Approval</a></li>';
                echo '<li><a href="roster.php">Roster</a></li>';
                echo '<li><a href="adminreport.php">Admin Report</a></li>';
            echo '</ul>';
        }
        ?>

        <h1>Create New Roster</h1>
        <form action="newroster.php" method="POST">
        <?php  if (isset($_POST['add'])) {
                    $roster_date = $_POST['roster_date'];
                    $supervisor = $_POST['supervisor'];
                    $doctor = $_POST['doctor'];
                    $caregiver1 = $_POST['caregiver1'];
                    $caregiver2 = $_POST['caregiver2'];
                    $caregiver3 = $_POST['caregiver3'];
                    $caregiver4 = $_POST['caregiver4'];
                    
                    if (($roster_date != '') && ($supervisor != '') && ($doctor != '') && ($caregiver1 != '') && ($caregiver2 != '') && ($caregiver3 != '') && ($caregiver4 != '')) {
                        $insertRoster = "INSERT INTO `daily_roster` (roster_date, supervisor, doctor, caregiver1, caregiver2, caregiver3, caregiver4) VALUES ('$roster_date', '$supervisor', '$doctor', '$caregiver1', '$caregiver2', '$caregiver3, '$$caregiver4')";
                        mysqli_query($conn, $insertRoster); 
                        echo "Congratulations, you have made a roster";
                    } else {
                        echo "Error with roster." . mysqli_error($conn);
                    }
                }
            ?>
            <br><label>Date: </label><input type="date" name="roster_date" /><br>

            <br><label>Supervisor</label> 
                <select name="supervisor"><br>
                    <?php
                    /* fetch associative array */
                    $result = mysqli_query($conn, "SELECT ID, firstname FROM `users` WHERE role = 'supervisor';");
                    while ($row = $result->fetch_assoc()){
                        echo '<option value=" '.$row['ID'].' "> '.$row['firstname'].' </option>';     
                    }
                    ?>
                </select>
            <br>

            <label>Doctor</label>  
                <select name="doctor">
                    <?php
                        $result = mysqli_query($conn, "SELECT ID, firstname FROM `users` WHERE role = 'doctor';");
                        while ($row = $result->fetch_assoc()){
                            echo '<option value=" '.$row['ID'].' "> '.$row['firstname'].' </option>';     
                        }
                    ?>
                <br>
                    
                </select>
            <br>
            <label>Caregiver1</label>  
                <select name="caregiver1">
                    <?php
                        $result = mysqli_query($conn, "SELECT ID, firstname FROM `users` WHERE role = 'caregiver';");
                        while ($row = $result->fetch_assoc()){
                            echo '<option value=" '.$row['ID'].' "> '.$row['firstname'].' </option>';     
                        }
                    ?>
                <br>
                </select>
            <label>Caregiver2</label> 
                <select name="caregiver2">
                    <?php
                    $result = mysqli_query($conn, "SELECT ID, firstname FROM `users` WHERE role = 'caregiver';");
                    while ($row = $result->fetch_assoc()){
                        echo '<option value=" '.$row['ID'].' "> '.$row['firstname'].' </option>';     
                    }
                    ?>
                <br>
                </select>
                <br>
            <label>Caregiver3</label>  
                <select name="caregiver3">
                    <?php
                    $result = mysqli_query($conn, "SELECT ID, firstname FROM `users` WHERE role = 'caregiver';");
                    while ($row = $result->fetch_assoc()){
                        echo '<option value=" '.$row['ID'].' "> '.$row['firstname'].' </option>';     
                    }
                    ?>
                <br>
                </select>
            <label>Caregiver4</label> 
                <select name="caregiver4">
                    <?php
                    $result = mysqli_query($conn, "SELECT ID, firstname FROM `users` WHERE role = 'caregiver';");
                    while ($row = $result->fetch_assoc()){
                        echo '<option value=" '.$row['ID'].' "> '.$row['firstname'].' </option>';     
                    }
                    ?>
            <br>
>>>>>>> 98f9124051a9797f98c4e1f13568af82ea82de73
            </select>
            <br>
            <br><br>
            <input type="submit" name="add" value="Add">
            <input type="submit" name="cancel" value="Cancel">
            <a href="logout.php">Logout</a>
        </form>
    </body>
</html>