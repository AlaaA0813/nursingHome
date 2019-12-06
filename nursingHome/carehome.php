<?php
    // connect to the DB
    include_once 'db.php';
    session_start();
    // checks connection, othewrise stop running script and throw error.
    if (!$conn) {
        die("Connection failed: " . mysqli_error());
    }
    if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == "caregiver") {
    } else {
        header("location: login.php");
    }
    

?>
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
        <nav class="nav">
            <ul>
                <li><a href="carehome.php">Home</a></li>
                <li><a href="roster.php">Roster</a></li>
            </ul>
        </nav>
        <h1>Cavegiver's Home</h1>
        <?php
            $getPatientName = "SELECT ID, firstname, lastname FROM `users` WHERE role='patient'";
            $result = mysqli_query($conn, $getPatientName);
            $resultCheck = mysqli_num_rows($result);
            
            // $getCurrentDate = "SELECT activity_date FROM `daily_activities` WHERE activity_date(date) = CURDATE()";
            echo "<table>";
                echo "<tr>
                    <th>Name</th>
                    <th>Morning Medicine</th>
                    <th>Afternoon Medicine</th>
                    <th>Night Medicine</th>
                    <th>Breakfast</th>
                    <th>Lunch</th>
                    <th>Dinner</th>
                </tr>";
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $patientID = $row['ID'];
                    $firstName = $row['firstname'];
                    $lastName = $row['lastname'];
            
                    echo "<form action='' method='POST'>";
                        echo "<tr>";
                            echo "<td name='fullname'>$firstName $lastName</td>
                            <td><input type='checkbox' name='morningMed' /></td>
                            <td><input type='checkbox' name='afternoonMed' /></td>
                            <td><input type='checkbox' name='nightMed' /></td>
                            <td><input type='checkbox' name='breakfast' /></td>
                            <td><input type='checkbox' name='lunch' /></td>
                            <td><input type='checkbox' name='dinner' /></td>";
                        echo "</tr>";
                    echo "</form>";
                }
            }
            echo "</table>";
        ?>
        <a href="logout.php">Logout</a>
    </body>
</html>