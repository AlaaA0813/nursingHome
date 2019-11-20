<?php 
// connect to the DB
include_once 'db.php';
// checks connection, othewrise stop running script and throw error.
if (!$conn) {
    die("Connection failed: " . mysqli_error());
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
    $familycode = $_POST['familycode'] ?? '';
    $econtactnum = $_POST['econtactnum'] ?? '';
    $familyrelation = $_POST['familyrelation'] ?? '';
  
    if (($role != '') && ($firstname != '') && ($lastname != '') && ($email != '') && ($password != '') && ($phonenumber != '') && ($dob != '')) { //&& ($econtactnum != '') && ($familyrelation != '') && ($familycode != '')) {
        // insert query, inserts all data into each columns
        $insertQuery1 = "INSERT INTO `users` (role, firstname, lastname, email, password, phonenumber, dob) VALUES ('$role', '$firstname', '$lastname', '$email', '$password', '$phonenumber', '$dob')";
        $insertQuery2 = "INSERT INTO `patients` (familycode, econtactnum, familyrelation) VALUES ('$familycode', '$econtactnum', '$familyrelation')";
        // if query succesfully runs, notify user 
        if (mysqli_query($conn, $insertQuery1) && (mysqli_query($conn, $insertQuery2))) {
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
        <title>Database</title>
        <link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8">
        <script language="javascript">
            var roleTypes = document.getElementById("role"),
                roleOptions = [
                    document.getElementById("admin"),
                    document.getElementById("supervisor"),
                    document.getElementById("caregiver"),
                    document.getElementById("doctor"),
                    document.getElementById("patient"),
                    document.getElementById("family")
                ],
                hidingRoles=[
                    document.getElementById("familycode"),
                    document.getElementById("econtactnum"),
                    document.getElementById("familyrelation")
                ];
            function hideRoles(){
                for (i=0; i < roleOptions.length; i++) {
                    if (role.value == "patient") {
                        hidingRoles[0].style.display="inline-block";
                        hidingRoles[1].style.display="inline-block";
                        hidingRoles[2].style.display="inline-block";
                    } else {
                        console.log("hidden roles.");
                        hidingRoles[0].style.display="none";
                        hidingRoles[1].style.display="none";
                        hidingRoles[2].style.display="none";
                    }
                }
            }
            fuction disable() {
                if (document..D1.value != 'Others') {
                    document.register.otherz.disabled=1;
                } else  {
                    document.register.otherz.disabled=0;
                }
            }
        </script>
    </head>

    <body>
        <h2>Register</h2>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $("#role").change(function() {
                    if ($(this).val() == "patient") {
                        $("#familycode").removeAttr("disabled");
                        $("#familycode").focus();
                        $("#econtactnum").removeAttr("disabled");
                        $("#econtactnum").focus();
                        $("#familyrelation").removeAttr("disabled");
                        $("#familyrelation").focus();
                    } else {
                        $("#familycode").attr("disabled", "disabled");
                        $("#econtactnum").attr("disabled", "disabled");
                        $("#familyrelation").attr("disabled", "disabled");
                    }    
                });
            });      
        </script>
        <form action="registration.php" name="register" method="POST">
            <label>Role</label>
                <select id="role" name="role">
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
            <label>Date of Birth: </label><input type="date" name="dob" /><br>
            <label>Family Code (For Patient Family Member): </label><input type="text" name="familycode" id="familycode" disabled="disabled"><br>
            <label>Emergency Contact Phone Number: </label><input type="text" name="econtactnum" id="econtactnum" disabled="disabled" /><br>
            <label>Relation to Emergency Contact: </label><input type="text" name="familyrelation" id="familyrelation" disabled="disabled" /><br>
            <input type="submit" name="register" value="Register Me">
            <input type="submit" name="cancel" value="Cancel Registration">
        </form>
    </body>
</html>