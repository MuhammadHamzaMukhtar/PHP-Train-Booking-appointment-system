<?php 
session_start();
include "../include/DBconn.php";

if(!isset($_SESSION['email'])){
    header('location: login.php');
}
?>

<!DOCTYPE html>
<hmtl lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name = "Homepage" content = "Homepage">
        <title>Booking Appointment System</title>

        <!-- CSS -->
        <link href="../style/.css" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>
        <!-- Nav bar -->
        <div class="">
            <br><br><br>
            <?php include("../include/navigation.php"); ?>
        </div>

        <!-- Business information -->
        <div class="row col-12 mx-auto shadow">
            <div class="col col-after">
            
            </div>
        </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    </body>
</html>