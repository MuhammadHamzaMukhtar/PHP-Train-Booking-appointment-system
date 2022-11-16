<?php 
session_start();
include "../include/DBconn.php";

if(!isset($_SESSION['email'])){
    header('location: login.php');
}
?>

<form>
    
</form>