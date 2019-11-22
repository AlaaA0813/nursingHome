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
    <nav class="nav">
            <ul>
                <li><a href="addinfo.php">Home</a></li>
                <li><a href="role.php">Roles</a></li>
                <li><a href="employee.php">Employee</a></li>
                <li><a href="patients.php">Patients</a></li>
                <li><a href="regapproval.php">Registration Approval</a></li>
                <li><a href="roster.php">Roster</a></li>
                <li><a href="adminreport.php">Admin's Report</a></li>
                <li><a href="payment.php">Payment</a></li>
            </ul>
        </nav>
    <form action='employee.php' method='POST'>
    <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Role</th>
          <th>Salary</th>
        </tr>
        <?php 
            $query = mysqli_query($conn, "SELECT employees.ID, employees.salary, users.role, users.firstname, users.lastname FROM employees, users WHERE employees.ID = users.ID");
            $i = 1;
            while($row = mysqli_fetch_array($query)){
            echo "
                    <tr>
                    <td name='ID'>" . $row['ID'] . "</td>
                    <td name='name'>" . $row['firstname'] . '&nbsp;' . $row['lastname'] . "</td>
                    <td name='role'>" . $row['role'] . "</td>
                    <td name='salary'>" . $row['salary'] . "</td>
                    </tr>";
            }
            echo "
            <label>Employee ID: </label>
                <input type='number' name='ID'>
            <br>
            <label>New Salary: </label>
                <input type='number' name='salary'>
            <br>
            <button type='submit' name='update'>Update</button>";
            //add cancel button            
    
        if (isset($_POST['update'])) {
            $ID = $_POST['ID'];
            $salary = $_POST['salary'];
            if (($ID != '') && ($salary != '')) {
            $insertQuery = "UPDATE employees SET salary = '$salary' WHERE ID = '$ID'";
            if (mysqli_query($conn, $insertQuery)) {
                echo "Your salary has been updated";
            }
            else {
                echo "Error updating your salary" . mysqli_error($conn);
            }
            }
        }
            mysqli_close($conn); //close connection
    ?>
            </table>
            <a href="logout.php">Logout</a>
        </form>
    </body>
    </html>

