<?php 

session_start(); 

include_once 'db.php';


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8">
        <title>Welcome Page</title>
    </head>
    <body>
        <!-- <h1>Welcome to your temporary home page.</h1> -->
    <?php

if (isset($_SESSION['ID'])){
    $role = $_SESSION['role'];
    if ($role == "admin"){
        include ("regapproval.php");
    } else if ($role == "supervisor"){
        include ("roster.php");
    } else if ($role == "caregiver"){
        include ("carehome.php");
    } else if ($role == "doctor"){
        include ("doctorhome.php");
    } else if ($role == "patient"){
        include ("patients.php");
    } else if ($role == "family") {
        include ("famhome.php"); 
    }
}
    ?>

    </body>
</html>