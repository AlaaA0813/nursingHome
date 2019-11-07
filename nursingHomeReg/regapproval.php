<?php 
// connect to the DB
include_once 'db.php';
// checks connection, othewrise stop running script and throw error.
if (!$conn) {
    die("Connection failed: " . mysqli_eeror());
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
        <form action="" method="POST">
            <table>
                <tr>
                    <th>ID</th>
                    <th> First Name</th>
                    <th>Last Name</th>
                    <th>Role</th>
                    <th>Approval</th>
                </tr>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM Users");
                    while ($row = mysqli_fetch_array($result)) {
                        echo "
                            <tr>

                                <td name='id'>" . $row['ID'] . "</td>
                                <td name='firstName'>" . $row['firstname'] . "</td>
                                <td name='lastName'>" . $row['lastname'] . "</td>
                                <td name='row'>" . $row['role'] . "</td>
                                <td name='is_approved'>" . $row['is_approved'] . "</td>
                                <td>
                                    <button type='submit' name='approve'>Approve</button>
                                    <button type='submit' name='disapprove''>Disapprove</button>
                                </td>
                            </tr>";
                    }
                    if(isset($_POST['approve'])){
                        $id = $_POST['ID'];
                        $sql = "UPDATE Users SET is_approved = 1 WHERE ID LIKE '$id'"; 
                        mysqli_query($conn, $sql);
                    }

                    if(isset($_POST['disapprove'])){
                        $id = $_POST['ID'];
                        $sql = "UPDATE Users SET is_approved = 0 WHERE ID LIKE '$id'"; 
                        mysqli_query($conn, $sql);
                    }
                    mysqli_close($conn);
                    ?>
            </table>
        </form>
    </body>
</html>