<?php 
//let the script keep running (with a warning) if the file is missing.
include_once 'db.php';
// checks connection and if failed or not.
if (!$conn) {
    die("Connection failed: " . mysqli_eeror());
}

// check whether REGISTRATION variables are set or not
//isset() function return false if testing variable contains a NULL value

if (isset($_POST['register'])) {
    //if registration 
    $role = $_POST['role'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phonenumber'];
    $dob = $_POST['dob'];    
    //if family role  is selected then:
    $familycode = $_POST['familycode'];
    $econtact = $_POST['econtact'];
    $familyrelation = $_POST['familyrelation'];
  

    // if inputs are available insert this data
  
    if (($role != '') && ($firstname != '') && ($lastname != '') && ($email != '') && ($password != '') && ($phoneNumber != '') && ($dob != '') && ($familycode != '') && ($econtact != '') && ($familyrelation != '')) {
        //insert query, inserts all data in columns 
        //MIGHT CHANGE USERS TO EMPLOYEE NOT SURE ask MASTER ALAA
        $insertQuery = "INSERT INTO Users (role, firstname, lastname, email, password, phonenumber, dob, familycode, econtact, familyrelation) VALUES ('$id', '$role', '$firstname', '$lastname', '$email', '$password', '$phoneNumber', '$dob', '$familycode', '$econtact','$familyrelation')";
       
      

        //IF USER HAS BEEN CREATED 
        if (mysqli_query($conn, $insertQuery)) {
            echo "Congratulations, you have registered!";
        }
        else {
            echo " Error with registering." . mysqli_error($conn);
        }
    }
}
//THEN CLOSE CONNECTION
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
                <select>
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