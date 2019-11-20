<?php
include_once 'db.php';
if (!$conn) {
    die("Connection failed: " . mysqli_error());
}
session_start();


//correct way of checking for form submissions.
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    //insert query to get email and password they regidtered with from database
    $query = "SELECT * FROM `users` WHERE email = '$email'  AND password = '$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){    
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname']= $row['lastname'];
            
            header("Location: welcome.php");
            echo "you have logged in!";
        
        }
    } else if (($_POST['email'] == '') || ($_POST['password'] == '')) {
        echo "<p>You did not enter a username or password.</p>";
    } else {
        echo "<p>Incorrect Username or Password.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8">
        <title>Log In</title>
    </head>
    <body>
        <h1>Log In</h1>
        <h2>Please provide account information.</h2>

        <form action="" method="POST">
            <label>Email: </label><input type="text" name="email" />
            <label>Password: </label><input type="text" name="password" />
            <input type="submit" name="logIn" value="Log In" />
            <input type="submit" name="cancel" value="Cancel Login" />
        </form>
    </body>
</html>