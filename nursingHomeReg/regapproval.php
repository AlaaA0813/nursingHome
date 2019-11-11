<?php 
// connect to the DB
include_once 'db.php';
// checks connection, othewrise stop running script and throw error.
if (!$conn) {
    die("Connection failed: " . mysqli_error());
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
        <h1>Registration Approval</h1>

        <?php
            $query = "SELECT * FROM Users";
            $result = mysqli_query($conn, $query);
            $i = 1; // counter for the checkboxes
            echo "<form action='' method='POST'>";
                echo "<table>
                    <tr>
                        <th>ID</th>
                        <th> First Name</th>
                        <th>Last Name</th>
                        <th>Role</th>
                        <th>Approval</th>
                    </tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                            echo "<td name='id'>" . $row['ID'] . "</td>";
                            echo "<td name='firstName'>" . $row['firstname'] . "</td>";
                            echo "<td name='lastName'>" . $row['lastname'] . "</td>";
                            echo "<td name='row'>" . $row['role'] . "</td>";
                            echo "<td name='is_approved'>" . $row['is_approved'] . "</td>";
                            echo "<td><input type='checkbox' name='check[$i]' value='".$row['ID']."'/>";                        echo "</tr>";
                        $i++;
                    }
                echo "</table>";
                echo "<input type='submit' name='approve' value='Approve'/>";
                echo "<input type='submit' name='remove' value='Remove'/>";
            echo "</form>";

        if (isset($_POST['approve'])) {
            if (isset($_POST['check'])) {
                foreach ($_POST['check'] as $value) {
                    echo $value . "\n";
                    $update = "UPDATE Users SET is_approved=TRUE WHERE ID='$value'";
                    mysqli_query($conn, $update);
                }
            }
        }
        if (isset($_POST['remove'])) {
            if (isset($_POST['check'])) {
                foreach ($_POST['check'] as $value) {
                    echo $value . "\n";
                    $update = "UPDATE Users SET is_approved=FALSE WHERE ID='$value'";
                    mysqli_query($conn, $update);
                }
            }
        }
        
        mysqli_close($conn);
        ?>
    </body>
</html>