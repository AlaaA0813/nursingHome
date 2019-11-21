<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8">
        <title>Patient's Home</title>
    </head>
    <body>
        <h1>Patient's Home</h1>
        <form action="" method="POST">
            <label>Patient ID </label><input type="text" name="Date" /><br>
            <label>Date: </label><input type="text" name="Family Code" /><br>
            <label>Patient Home: </label><input type="text" name="Patient ID" /><br>
            <table>
                <tr>
                    <th>Doctor's Name</th>
                    <th>Doctor's Appointment</th>
                    <th>Caregiver's Name</th>
                    <th>Morning Medicine</th>
                    <th>Afternoon Medicine</th>
                    <th>Night Medicine</th>
                    <th>Breakfast</th>
                    <th>Lunch</th>
                    <th>Dinner</th>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" name="doctorappt" /></td>
                    <td></td>
                    <td><input type="checkbox" name="morningMed" /></td>
                    <td><input type="checkbox" name="afternoonMed" /></td>
                    <td><input type="checkbox" name="nightMed" /></td>
                    <td><input type="checkbox" name="breakfast" /></td>
                    <td><input type="checkbox" name="lunch" /></td>
                    <td><input type="checkbox" name="dinner" /></td>
                </tr>
            </table>
        </form>
    </body>
</html>