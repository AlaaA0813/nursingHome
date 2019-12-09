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
            $getPatientName = "SELECT ID, firstname, lastname FROM `users` WHERE role='patient' AND is_approved=1";
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
                    $i = 1;
                    //$morning_med = $row['morning_med'];
                    //$afternoon_med = $row['afternoon_med'];
                   // $night_med = $row['night_med'];
                   // $breakfast = $row['breakfast'];
                   // $lunch = $row['lunch'];
                   // $dinner = $row['dinner'];
            
                    echo "<form action='carehome.php' method='POST'>";
                        echo "<tr>";
                            echo "<td name='fullname'>$firstName $lastName </td>";
                            echo "<td><input type='checkbox' name='check_list[$i]' value='morning_med'/></td>";
                            echo "<td><input type='checkbox' name='check_list[$i]' value='afternoon_med'/></td>";
                            echo "<td><input type='checkbox' name='check_list[$i]' value='night_med'/></td>";
                            echo "<td><input type='checkbox' name='check_list[$i]' value='breakfast'/></td>";
                            echo "<td><input type='checkbox' name='check_list[$i]' value='lunch'/></td>";
                           echo  "<td><input type='checkbox' name='check_list[$i]' value='dinner'/></td>";
                        echo "</tr>";
                        $i++;
                }
                        echo "</table>";
                        echo "<input type='submit' name='add' value='add'/>";

                    echo "</form>";

                }
            
  
                if (isset($_POST['add'])){
                    if(isset($_POST['check_list'])) {
                        $checked_count = count($_POST['check_list']);
                        echo "You have selected following ".$checked_count." option(s): <br/>";
                        // Loop to store and display values of individual checked checkbox.
                        foreach($_POST['check_list'] as $selected) {
                            echo "<p>".$selected ."</p>";
                            $update = "UPDATE `daily_activities` SET morning_med=1, afternoon_med=1, night_med=1, breakfast=1, lunch=1, dinner=1 WHERE ID= '$selected'"; 
                            mysqli_query($conn, $update);
                            echo "congrats you did your tasks.";
                        }
                    } 
                }
                
               //     header('Location: carehome.php');
                
            ?>
       
        <a href="logout.php">Logout</a>
    </body>
</html>