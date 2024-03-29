<?php 
// connect to the DB
include_once 'db.php';
session_start();
// checks connection, othewrise stop running script and throw error.
if (!$conn) {
    die("Connection failed: " . mysqli_error());
}
if(($_SESSION['loggedIn'] = true) && ($_SESSION['role'] == "admin")) {
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
        <title>Roles</title>
    </head>
    <body>
    <form action='role.php' method='POST'>
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
​       <h1>Roles</h1>
        <?php
            $query = "SELECT * FROM `roles`"; 
            $result = mysqli_query($conn, $query);
            $i = 1; // counter for the checkboxes
                echo "<table>
                    <tr>
                        <th>Role</th>
                        <th> Access Level</th>
                    </tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                            echo "<td name='role_id'>" . $row['role_id'] . "</td>";
                            echo "<td name='access_level'>" . $row['access_level'] . "</td>";
                        echo "</tr>";
                        $i++;
                    }
                echo "</table>";
            echo "<label>New Role: </label>";
            echo "<input type='text' name='newrole' />";
            echo "<br>";
            echo "<label>Access Level: </label>";
            echo "<input type='text' name='accesslevel' />";
            echo "<br>";
    

            echo "<input type='submit' name='addrole' value='Add Role'>";
            echo "<input type='submit' name='cancel' value='Cancel'>";
            
            if (isset($_POST['addrole'])) {
                $newrole = $_POST['newrole'];
                $accesslevel = $_POST['accesslevel'];
                
        
                if (($newrole != '') && ($accesslevel != '')) {
                  
                  $sql = "INSERT INTO `roles` (role_id, access_level) VALUES
                     ('$newrole', '$accesslevel')";
        
                  if (mysqli_query($conn, $sql)) {
                    echo "Role has been added";
                  }
                  else {
                    echo "Error adding role" . mysqli_error($conn);
                  }
                  header('Location:  role.php');
                }
              }
              
    
            mysqli_close($conn); //Make sure to close out the database connection
    
        ?>
        <a href="logout.php">Logout</a>
    </form>
    </body>
</html>