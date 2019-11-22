<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8">
        <title>Caregiver's Home</title>
    </head>
    <body>
        <h1>Cavegiver's Home</h1>
        <nav class="nav">
            <ul>
                <li><a href="carehome.php">Home</a></li>
                <li><a href="roster.php">Roster</a></li>
            </ul>
        </nav>
        <form action="" method="POST">
            <label>List of Patients duty today</label>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Room</th>
                    <th>Morning Medicine</th>
                    <th>Afternoon Medicine</th>
                    <th>Night Medicine</th>
                    <th>Breakfast</th>
                    <th>Lunch</th>
                    <th>Dinner</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="checkbox" name="morningMed" /></td>
                    <td><input type="checkbox" name="afternoonMed" /></td>
                    <td><input type="checkbox" name="nightMed" /></td>
                    <td><input type="checkbox" name="breakfast" /></td>
                    <td><input type="checkbox" name="lunch" /></td>
                    <td><input type="checkbox" name="dinner" /></td>
                </tr>
            </table>
            <a href="logout.php">Logout</a>
        </form>
    </body>
</html>