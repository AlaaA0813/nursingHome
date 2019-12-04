
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
        if ($_SESSION['role'] =="supervisor"){
        echo '<nav class="nav">';
        echo    '<ul>';
        echo       '<li><a href="roster.php">Home</a></li>';
        echo     '<li><a href="newroster.php">New Roster</a></li>';
        echo   '</ul>';
        echo '</nav>';
        }
        if ($_SESSION['role'] =="admin") {
        echo   '<ul>';
        echo   ' <li><a href="regapproval.php">Home</a></li>';
        echo        '<li><a href="role.php">Roles</a></li>';
        echo        '<li><a href="employee.php">Employee</a></li>';
        echo        '<li><a href="patients.php">Patients</a></li>';
        echo       '<li><a href="addinfo.php">Add Patient Info</a></li>';
        echo       '<li><a href="roster.php">Roster</a></li>';
        echo        '<li><a href="adminreport.php">Admin Report</a></li>';
        echo   '</ul>';
        }
        ?>
        <h1>Create New Roster</h1>
        <form action="" method="POST">
            <br><label>Date: </label><input type="text" name="date" /><br>
            <br><label>Supervisor</label>  
            <select name="SUPERVISORDROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select><br>
            <label>Doctor</label>  
            <select name="DOCTORDROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select><br>
            <label>Caregiver1</label>  
            <select name="CAREGIVER1DROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
            <select name="CAREGIVER1DROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select><br>
            <label>Caregiver2</label>  
            <select name="CAREGIVER2DROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
            <select name="CAREGIVER2DROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select><br>
            <label>Caregiver3</label>  
            <select name="CAREGIVER3DROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
            <select name="CAREGIVER3DROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select><br>
            <label>Caregiver4</label>  
            <select name="CAREGIVER4DROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
            <select name="CAREGIVER4DROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
            <br><br>
            <input type="submit" name="add" value="Add">
            <input type="submit" name="cancel" value="Cancel">
            <a href="logout.php">Logout</a>
        </form>
    </body>
</html>