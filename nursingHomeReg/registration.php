<?php 
// connect to the DB
include_once 'db.php';
// checks connection, othewrise stop running script and throw error.
if (!$conn) {
    die("Connection failed: " . mysqli_eeror());
}

// check whether REGISTRATION variables are set or not
// isset() function return false if testing variable contains a NULL value
if (isset($_POST['register'])) {
    $role = $_POST['role'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phonenumber'];
    $dob = $_POST['dob'];

    // if family role is selected, the following variables will be set
    $familycode = $_POST['familycode'];
    $econtact = $_POST['econtact'];
    $familyrelation = $_POST['familyrelation'];
  
    // if inputs are not empty insert this data into the DB
    if (($role != '') && ($firstname != '') && ($lastname != '') && ($email != '') && ($password != '') && ($phonenumber != '') && ($dob != '') && ($familycode != '') && ($econtact != '') && ($familyrelation != '')) {
        // insert query, inserts all data into each columns
        $insertQuery = "INSERT INTO Users (role, firstname, lastname, email, password, phonenumber, dob, familycode, econtact, familyrelation) VALUES ('$role', '$firstname', '$lastname', '$email', '$password', '$phonenumber', '$dob', '$familycode', '$econtact','$familyrelation')";
        // if query succesfully runs, notify user 
        if (mysqli_query($conn, $insertQuery)) {
            echo "Congratulations, you have registered!";
        }
        // if query fails to run, notify user
        else {
            echo " Error with registering." . mysqli_error($conn);
        }
    }
}

// close connection
mysqli_close($conn)

?>

<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8">
        <title>Database</title>
    </head>
    <body>
        <form action="" method="POST">
            <h2>Register</h2>
            <label>Role</label>
                <select name="role">
                    <option value="admin">Administrator</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="doctor">Doctor</option>
                    <option value="caregiver">Caregiver</option>
                    <option value="patient">Patient</option>
                    <option value="family">Patient Family</option>
                </select><br>
            <label>First Name: </label><input type="text" name="firstname" /><br>
            <label>Last Name: </label><input type="text" name="lastname" /><br>
            <label>Email: </label><input type="text" name="email" /><br>
            <label>Password: </label><input type="text" name="password" /><br>
            <label>Phone Number: </label><input type="text" name="phonenumber" /><br>
            <label>Date of Birth: </label><input type="text" name="dob" /><br>
            <label>Family Code (For Patient Family Member): </label><input type="text" name="familycode" /><br>
            <label>Emergency Contact: </label><input type="text" name="econtact" /><br>
            <label>Relation to Emergency Contact: </label><input type="text" name="familyrelation" /><br>
            <input type="submit" name="register" value="Register Me">
            <input type="submit" name="cancel" value="Cancel Registration">
        </form>
    </body>
</html>