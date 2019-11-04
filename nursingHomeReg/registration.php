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
            <label>First Name: </label><input type="text" name="fname" /><br>
            <label>Last Name: </label><input type="text" name="lname" /><br>
            <label>Email: </label><input type="text" name="email" /><br>
            <label>Phone Number: </label><input type="text" name="phoneNumber" /><br>
            <label>Password: </label><input type="text" name="pword" /><br>
            <label>Date of Birth: </label><input type="text" name="dob" /><br>
            <label>Family Code (For Patient Family Member): </label><input type="text" name="familycode" /><br>
            <label>Emergency Contact: </label><input type="text" name="econtact" /><br>
            <label>Relation to Emergency Contact: </label><input type="text" name="familyrelation" /><br>

            <input type="submit" name="register" value="Register Me">
            <input type="submit" name="cancel" value="Cancel Registration">
        </form>
    </body>
</html>