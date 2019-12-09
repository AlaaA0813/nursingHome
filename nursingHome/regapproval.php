<?php 
// connect to the DB
include_once 'db.php';
// checks connection, othewrise stop running script and throw error.
if (!$conn) {
    die("Connection failed: " . mysqli_error());
}
session_start();
if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == "admin") {
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
        <title>Registration Approval</title>
    </head>
    <body>
        <nav class="nav">
            <ul>
                <li><a href="regapproval.php">Home</a></li>
                <li><a href="role.php">Roles</a></li>
                <li><a href="employee.php">Employee</a></li>
                <li><a href="patients.php">Patients</a></li>
                <li><a href="addinfo.php">Add Patient Info</a></li>
                <li><a href="roster.php">Roster</a></li>
                <li><a href="adminreport.php">Admin's Report</a></li>
            </ul>
        </nav>
        <h1>Admin's Home</h1>
        <h1>Registration Approval</h1>

        <?php
            $query = "SELECT * FROM `users` WHERE is_approved='0'";
            $result = mysqli_query($conn, $query);
            $i = 1; // counter for the checkboxes
            echo "<form action='' method='POST'>";
                echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Role</th>
                        <th>Approval</th>
                    </tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                            echo "<td name='id'>" . $row['ID'] . "</td>";
                            echo "<td name='firstname'>" . $row['firstname'] . "</td>";
                            echo "<td name='lastname'>" . $row['lastname'] . "</td>";
                            echo "<td name='role'>" . $row['role'] . "</td>";
                            echo "<td name='is_approved'>" . $row['is_approved'] . "</td>";
                            echo "<td><input type='checkbox' name='check[$i]' value='".$row['ID']."'/>";
                        echo "</tr>";
                        $i++;
                    }
                echo "</table>";
                echo "<input type='submit' name='approve' value='Approve'/>";
                echo "<input type='submit' name='remove' value='Remove'/>";
            echo "</form>";

            if (isset($_POST['approve'])) {
                if (isset($_POST['check'])) {
                    foreach ($_POST['check'] as $value) {
                        $update = "UPDATE `users` SET is_approved=1 WHERE ID='$value'";
                        mysqli_query($conn, $update);
                    }
                }
                header('Location: regapproval.php');
            }
            if (isset($_POST['remove'])) {
                if (isset($_POST['check'])) {
                    foreach ($_POST['check'] as $value) {
                        $deleteUser = "DELETE FROM `users` WHERE ID='$value'";
                        mysqli_query($conn, $deleteUser); 
                    }
                }
                header('Location:  regapproval.php');
            }

            mysqli_close($conn);
        ?>
        <a href="logout.php">Logout</a>
    </body>
</html>