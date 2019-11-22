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
        <h1>Appointments Page</h1>
        <nav class="nav">
            <ul>
                <li><a href="doctorhome.php">Home</a></li>
                <li><a href="appointment.php">Appointments</a></li>
                <li><a href="patientofdoc.php">Your Patients</a></li>
            </ul>
        </nav>
        <form action="" method="POST">
            <label>Date: </label><input type="text" name="date" /><br>
            <label>Doctor: </label>
            <select name="DOCTORDROPDOWN">
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select><br>
            <input type="submit" name="Set Appointment" value="Set Appointment">
            <input type="submit" name="cancel" value="Cancel">
            <a href="logout.php">Logout</a>
        </form>
    </body>
</html>