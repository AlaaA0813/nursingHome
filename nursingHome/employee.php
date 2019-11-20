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
        <title>Employees</title>
    </head>
    <body>
    <h1>Employees</h1>
    <form action='employee.php' method='POST'>
    <?php
    //write a query that gets id, name, role from user but only gets employees
            $query = "SELECT ID, firstname, lastname, role FROM Users WHERE role IN ('admin', 'supervisor','caregiver','doctor')";
            //SELECT firstname, lastname FROM Users UNION SELECT ID, salary FROM Employees WHERE role IN ('admin', 'supervisor','caregiver','doctor'
            $result = mysqli_query($conn, $query);
            $i = 1; // counter for the checkboxes
                echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Role</th>
                        <th>Salary</th>
                    </tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                            echo "<td name='ID'>" . $row['ID'] . "</td>";
                            echo "<td name='firstname'>" . $row['firstname'] . "</td>";
                            echo "<td name='lastname'>" . $row['lastname'] . "</td>";
                            echo "<td name='role'>" . $row['role'] . "</td>";
                            echo "<td name='salary'>" . $row['salary'] . "</td>";


                        echo "</tr>";
                        $i++;
                    }
                echo "</table>";
            //FIGURE OUT SEARCH ID echo "<label>Employee ID: </label>";
            echo "<input type='text' name='ID' />";
            echo "<br>";
            echo "<label>New Salary: </label>";
            echo "<input type='text' name='salary' />";
            echo "<br>";
    

            
            echo "<input type='submit' name='add_salary' value='Add Salary'>";
       

            
            if (isset($_POST['add_salary'])) {
                $salary = $_POST['salary'];
                
        
                if ( ($salary != '')) {
                  
                  $sql = "INSERT INTO Users (salary) VALUES
                  ('$salary')";
     
        
                  if (mysqli_query($conn, $sql)) {
                    echo "New Salary has been added";
                  }
                  else {
                    echo "Error adding salary" . mysqli_error($conn);
                  }
                }
              }
              
    
            mysqli_close($conn); //Make sure to close out the database connection
    
        ?>
    </form>
    </body>
</html>