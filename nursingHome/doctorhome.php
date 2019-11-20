<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8">
        <title>Doctor's Home</title>
    </head>
    <body>
        <h1>Doctor's Home</h1>
        <nav class="nav">
            <ul>
                <li><a href="doctorhome.php">Home</a></li>
                <li><a href="appointment.php">Appointments</a></li>
                <li><a href="patientofdoc.php">Your Patients</a></li>
            </ul>
        </nav>
        <p>Add a search option for each attribute</p>
        <form action="" method="POST">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Comment</th>
                    <th>Morning Med</th>
                    <th>Afternoon Med</th>
                    <th>Night Med</th>
                </tr>
                <input type="submit" name="search" value="Search">
                <tr>
                    <td><input type="text" name="name" /></td>
                    <td><input type="text" name="date" /></td>
                    <td><input type="text" name="comment" /></td>
                    <td><input type="text" name="morningMed" /></td>
                    <td><input type="text" name="afternoonMed" /></td>
                    <td><input type="text" name="nightMed" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>  
                </tr>
            </table>
        </form>
        <form action="" method="POST">
            <label>Appointment: </label><input type="text" name="tilldate" placeholder="Till Date" /><input type="submit" name="searchAppt" value="Search">
            <table>
                <tr>
                    <th>Patient</th>
                    <th>Date</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </body>
</html>