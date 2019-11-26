<?php 
// connect to the DB
include_once 'db.php';
// checks connection, othewrise stop running script and throw error.
if (!$conn) {
    die("Connection failed: " . mysqli_error());
}
session_start();
if(($_SESSION['loggedIn'] = true) && ($_SESSION['role'] == "supervisor") || $_SESSION['role'] == "admin") {
    
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
        <title>Patients</title>
    </head>
    <body>

        <?php
        if ($_SESSION['role'] == "supervisor"){
            echo '<nav class="nav">';
                echo '<ul>';
                    echo '<li><a href="roster.php">Home</a></li>';
                    echo '<li><a href="newroster.php">New Roster</a></li>';
                echo '</ul>';
            echo '</nav>';
        }
        if ($_SESSION['role'] == "admin") {
            echo '<ul>';
                echo '<li><a href="addinfo.php">Home</a></li>';
                echo '<li><a href="role.php">Roles</a></li>';
                echo '<li><a href="employee.php">Employee</a></li>';
                echo '<li><a href="patients.php">Patients</a></li>';
                echo '<li><a href="regapproval.php">Registration Approval</a></li>';
                echo '<li><a href="roster.php">Roster</a></li>';
                echo '<li><a href="adminreport.php">Admin Report</a></li>';
            echo '</ul>';
        }
        ?>  
       <h1>Patients Chart</h1>
      
        <?php

            $getPatientInfo = "SELECT users.ID, firstname, lastname, dob, econtactnum, familyrelation, admission_date FROM `users` INNER JOIN `patients` ON users.ID = patients.ID WHERE users.role = 'patient'";
            $result = mysqli_query($conn, $getPatientInfo);
            $resultCheck = mysqli_num_rows($result);
    
           
            echo "<table>";
                echo "<tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Emergency Contact Phone Number</th>
                    <th>Emergency Contact Family Relation</th>
                    <th>Admission Date</th>
                </tr>";
                echo "<form action='' method='POST'>";
                     echo "<tr>";
                        echo "<td><input type='text' placeholder='Search By ID' name='srchID' /></td>";
                        echo "<td><input type='text' placeholder='Search By First Name' name='srchfName' /></td>";
                        echo "<td><input type='text' placeholder='Search By Last Name' name='srchlName' /></td>";
                        echo "<td><input type='text' placeholder='Search By Age' name='srchAge' /></td>"; 
                        echo "<td><input type='text' placeholder='Search By Emergency Contact Phone Number' name='srchEContactPhone' /></td>";
                        echo "<td><input type='text' placeholder='Search By Family Relation' name='srchFamilyRelation' /></td>";
                        echo "<td><input type='text' placeholder='Search By Admission Date' name='srchAdmissionDate' /></td>";
                        echo "<td><input type='submit' name='search' value='Search'/></td>";
                    echo "</tr>";
                echo "</form>";
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $patientBirth = $row['dob'];
                        $today = date("Y-m-d");
                        $dateDiff = date_diff(date_create($patientBirth), date_create($today));
                        $patientAge = $dateDiff->format('%y');
                        echo "<tr>";
                            echo "<td name='id'>" . $row['ID'] . "</td>";
                            echo "<td name='firstName'>" . $row['firstname'] . "</td>";
                            echo "<td name='lastName'>" . $row['lastname'] . "</td>";
                            echo "<td name='age'>$patientAge</td>";
                            echo "<td name='econtactnum'>" . $row['econtactnum'] . "</td>";
                            echo "<td name='familyrelation'>" . $row['familyrelation'] . "</td>";
                            echo "<td name='admissionDate'>" . $row['admission_date'] . "</td>";
                        echo "</tr>";
                    }
                    if (isset($_POST['search'])) {
                        $srchID = $_POST['srchID'] ?? '';
                        $srchfName = $_POST['srchfName'] ?? '';
                        $srchlName = $_POST['srchlName'] ?? '';
                        $srchAge = $_POST['srchAge'] ?? '';
                        $srchEContactPhone = $_POST['srchEContactPhone'] ?? '';
                        $srchFamilyRelation = $_POST['srchFamilyRelation'] ?? '';
                        $srchAdmissionDate = $_POST['srchAdmissionDate'] ?? '';

                        if ($srchID != '') {
                            $result = $getPatientInfo . " AND users.ID LIKE '%$srchID%'";
                        }
                        if ($srchfName != '') {
                            $result = $getPatientInfo . " AND users.firstname LIKE '%$srchfName%'";
                        }
                        if ($srchlName != '') {
                            $result = $getPatientInfo . " AND users.lastname LIKE '%$srchlName%'";
                        }
                        if ($srchFamilyRelation != '') {
                            $result = $getPatientInfo . " AND patients.familyrelation LIKE '%$srchFamilyRelation%'";
                        }
                        if ($srchAge != '') {
                            $currentYear = date("Y-m-d");
                            $birthDate = $currentYear - $patientAge;
                            $result = $getPatientInfo . " AND users.dob LIKE '$birthDate%'";
                        }
                        if ($srchEContactPhone != '') {
                            $result = $getPatientInfo . " AND patients.econtactnum LIKE '%$srchEContactPhone%'";
                        }
                        if ($srchAdmissionDate != '') {
                            $result = $getPatientInfo . " AND patients.admission_date LIKE '%$srchAdmissionDate%'";
                        }
                        $showSrchResult = mysqli_query($conn, $result);
                        $resultCheck = mysqli_num_rows($showSrchResult);
                        if ($resultCheck > 0) {
                            echo "<table>";
                                echo "<tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Age</th>
                                    <th>Emergency Contact Phone Number</th>
                                    <th>Emergency Contact Family Relation</th>
                                    <th>Admission Date</th>
                                </tr>";
                            while ($row = mysqli_fetch_assoc($showSrchResult)) {
                                $patientBirth = $row['dob'];
                                $today = date("Y-m-d");
                                $dateDiff = date_diff(date_create($patientBirth), date_create($today));
                                $patientAge = $dateDiff->format('%y');
                                echo "<tr>";
                                    echo "<td name='id'>" . $row['ID'] . "</td>";
                                    echo "<td name='firstName'>" . $row['firstname'] . "</td>";
                                    echo "<td name='lastName'>" . $row['lastname'] . "</td>";
                                    echo "<td name='age'>$patientAge</td>";
                                    echo "<td name='econtactnum'>" . $row['econtactnum'] . "</td>";
                                    echo "<td name='familyrelation'>" . $row['familyrelation'] . "</td>";
                                    echo "<td name='admissionDate'>" . $row['admission_date'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table";
                        }
                    }
                }
            echo "</table>";

        ?>
        
        <a href="logout.php">Logout</a>
    </body>
</html>