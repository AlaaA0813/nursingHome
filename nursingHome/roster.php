<?php
// connect to the DB
include_once 'db.php';
session_start();
// checks connection, othewrise stop running script and throw error.
if (!$conn) {
    die("Connection failed: " . mysqli_error());
}
if($_SESSION['loggedIn'] = true && $_SESSION['role'] == "caregiver" || $_SESSION['role'] == "supervisor" || $_SESSION['role'] == "admin" || $_SESSION['role'] == "doctor" ) {
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
        <title>Roster</title>
    </head>
    <form action="" method="POST">
    <body>
        <?php
            if ($_SESSION['role'] == "supervisor"){
                echo '<nav class="nav">';
                    echo '<ul>';
                        echo '<li><a href="roster.php">Home</a></li>';
                        echo '<li><a href="newroster.php">New Roster</a></li>';
                        echo '<li><a href="appointment.php">Appointments</a></li>';
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
            if ($_SESSION['role'] == "caregiver"){
                echo '<ul>';
                    echo '<li><a href="carehome.php">Home</a></li>';
                    echo '<li><a href="roster.php">Roster</a></li>';
                echo '</ul>';
            }
            if ($_SESSION['role'] == "doctor"){
            echo '<ul>';
                echo '<li><a href="doctorhome.php">Home</a></li>';
                echo '<li><a href="patientofdoc.php">Your Patients</a></li>';
                echo '<li><a href="roster.php">Roster</a></li>';
            echo '</ul>';
            }
        ?>
        <h1>Roster</h1>
            <label>Date: </label>
            <?php 
            //current date
        echo date("m/d/Y", time()); 
      ?>
            <table>
        <tr>
            <th>Supervisor</th>
            <th>Doctor</th>
            <th>Caregiver1</th>
            <th>Caregiver2</th>
            <th>Caregiver3</th>
            <th>Caregiver4</th>
        </tr>
        <tr> 
<?php
    // supevisor
    $roster_date = date("Y/m/d", time()); 
          $sql = mysqli_query($conn,"SELECT * FROM daily_roster, users WHERE users.ID = daily_roster.supervisor AND roster_date = '$roster_date'");
              while($row = mysqli_fetch_array($sql)){
                echo "
                          <td name='name'>" . $row['firstname'] ." " . $row['lastname'] . "</td>
                       ";
                }
        ?> 
<?php
    // doctor
    $roster_date = date("Y/m/d", time()); 
          $sql = mysqli_query($conn,"SELECT * FROM daily_roster, users WHERE users.ID = daily_roster.doctor AND roster_date = '$roster_date'");
              while($row = mysqli_fetch_array($sql)){
                echo "
                          <td name='name'>" . $row['firstname'] ." " . $row['lastname'] . "</td>
                        ";
                }
        ?>
<?php
  // caregiver1
  $roster_date = date("Y/m/d", time()); 
          $sql = mysqli_query($conn,"SELECT * FROM daily_roster, users WHERE users.ID = daily_roster.caregiver1 AND roster_date = '$roster_date'");
              while($row = mysqli_fetch_array($sql)){
                  echo "
                          <td name='name'>"  . $row['firstname'] ." " . $row['lastname'] . "</td>
                        ";
                }
        ?>
<?php
    // caregiver2
    $roster_date = date("Y/m/d", time()); 
          $sql = mysqli_query($conn,"SELECT * FROM daily_roster, users WHERE users.ID = daily_roster.caregiver2 AND roster_date = '$roster_date'");
              while($row = mysqli_fetch_array($sql)){
                  echo "
                          <td name='name'>". $row['firstname'] ." " . $row['lastname'] . "</td>
                        ";
                }
        ?>
<?php
    // caregiver3
    $roster_date = date("Y/m/d", time()); 
          $sql = mysqli_query($conn,"SELECT * FROM daily_roster, users WHERE users.ID = daily_roster.caregiver3 AND roster_date = '$roster_date'");
              while($row = mysqli_fetch_array($sql)){
                  echo "
                          <td name='name'>". $row['firstname'] ." " . $row['lastname'] . "</td>
                        ";
                }
        ?>
<?php
    // caregiver4
    $roster_date = date("Y/m/d", time()); 
          $sql = mysqli_query($conn,"SELECT * FROM daily_roster, users WHERE users.ID = daily_roster.caregiver4 AND roster_date = '$roster_date'");
              while($row = mysqli_fetch_array($sql)){
                  echo "
                          <td name='name'>" . $row['firstname'] ." " . $row['lastname'] . "</td>
                        ";
                }
        ?>
      </tr>
    </table>
            
            <a href="logout.php">Logout</a>
        </form>
    </body>
</html>