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
        <title>Patients</title>
    </head>
    <body>
        <h1>Patients Chart</h1>
        <?php
            $query = "SELECT * FROM Patients";
            $result = mysqli_query($conn, $query);

            echo "<form action='' method='POST'>";
                echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Emergency Contact Name</th>
                        <th>Emergency Contact Phone Number</th>
                        <th>Admission Date</th>
                    </tr>";
                echo "<tr>";
                    echo "<td><input type='text' name='srchID' /></td>";
                    echo "<td><input type='text' name='srchfName' /></td>";
                    echo "<td><input type='text' name='srchlName' /></td>";
                    echo "<td><input type='text' name='srchAge' /></td>";
                    echo "<td><input type='text' name='srchEContactName' /></td>";
                    echo "<td><input type='text' name='srchemEContactPhone' /></td>";
                    echo "<td><input type='text' name='srchAdmissionDate' /></td>";
                    echo "<td><input type='submit' name='search' value='Search'/></td>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                        echo "<td name='id'>" . $row['ID'] . "</td>";
                        echo "<td name='firstName'>" . $row['firstname'] . "</td>";
                        echo "<td name='lastName'>" . $row['lastname'] . "</td>";
                        echo "<td name='age'>" . $row['age'] . "</td>";
                        echo "<td name='econtactname'>" . $row['econtactname'] . "</td>";
                        echo "<td name='econtact'>" . $row['econtact'] . "</td>";
                        echo "<td name='admissionDate'>" . $row['admission_date'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            echo "</form>";
            
            if (isset($_POST['search'])) {
                if (isset($_POST['srchID'])) {
                    $id = mysqli_real_escape_string($conn, htmlspecialchars($_POST['srchID']));
                    $srchID = "SELECT * FROM Patients WHERE ID LIKE '{$_POST['srchID']}%'";
                    $result = mysqli_query($conn, $srchID);
                    echo $result;
                }
            }

            if (isset($_POST['search'])) {
                if (isset($_POST['srchfName'])) {
                    $id = mysqli_real_escape_string($conn, htmlspecialchars($_POST['srchfName']));
                    $srchfName = "SELECT * FROM Patients WHERE firstname LIKE '{$_POST['srchfName']}%'";
                    $result = mysqli_query($conn, $srchfName);
                    echo $result;
                }
            }

            if (isset($_POST['search'])) {
                if (isset($_POST['srchlName'])) {
                    $id = mysqli_real_escape_string($conn, htmlspecialchars($_POST['srchlName']));
                    $srchlName = "SELECT * FROM Patients WHERE lastname LIKE '{$_POST['srchlName']}%'";
                    $result = mysqli_query($conn, $srchlName);
                    echo $result;
                }
            }

            if (isset($_POST['search'])) {
                if (isset($_POST['srchAge'])) {
                    $id = mysqli_real_escape_string($conn, htmlspecialchars($_POST['srchAge']));
                    $srchAge = "SELECT * FROM Patients WHERE age LIKE '{$_POST['srchAge']}%'";
                    $result = mysqli_query($conn, $srchAge);
                    echo $result;
                }
            }

            if (isset($_POST['search'])) {
                if (isset($_POST['srchEContactName'])) {
                    $id = mysqli_real_escape_string($conn, htmlspecialchars($_POST['srchEContactName']));
                    $srchEContactName = "SELECT * FROM Patients WHERE econtactname LIKE '{$_POST['srchEContactName']}%'";
                    $result = mysqli_query($conn, $srchEContactName);
                    echo $result;
                }
            }

            if (isset($_POST['search'])) {
                if (isset($_POST['srchEContactPhone'])) {
                    $id = mysqli_real_escape_string($conn, htmlspecialchars($_POST['srchEContactPhone']));
                    $srchEContactPhone = "SELECT * FROM Patients WHERE econtact LIKE '{$_POST['srchEContactPhone']}%'";
                    $result = mysqli_query($conn, $srchEContactPhone);
                    echo $result;
                }
            }

            if (isset($_POST['search'])) {
                if (isset($_POST['srchAdmissionDate'])) {
                    $id = mysqli_real_escape_string($conn, htmlspecialchars($_POST['srchAdmissionDate']));
                    $srchAdmissionDate = "SELECT * FROM Patients WHERE admission_date LIKE '{$_POST['srchAdmissionDate']}%'";
                    $result = mysqli_query($conn, $srchAdmissionDate);
                    echo $result;
                }
            }
        ?>
    </body>
</html>