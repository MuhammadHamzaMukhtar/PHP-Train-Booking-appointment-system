<?php 
session_start();
// if(!isset($_SESSION['email'])){
//     header('location: ../LogINOUT/login.php');
// }

if (isset($_SESSION['id'])) {

include "db_conn.php";
include 'php/User.php';
include 'includes/navbar.php';
$user = getUserById($_SESSION['id'], $conn);


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php if ($user) { ?>
    <div class="d-flex justify-content-center align-items-center vh-100 mt-5">
    	
    	<div class="shadow w-350 p-3 text-center">
    		<img src="upload/<?= $user['pp'] ?>"
    		     class="img-fluid rounded-circle">
            <h3 class="display-4 "><?=$user['first_name']?></h3>
			<div>
			 <h3 class="display-4 "><?=$user['phone_number']?></h3>
            <a href="edit.php" class="btn btn-primary">
            	Edit Profile
            </a>
             <a href="../LogINOUT/logout.php" class="btn btn-warning">
                Logout
            </a>		
		</div>
		 <a href="user.php" class="btn btn-warning">
                 
            </a>
    </div>
    <?php }else { 
     header("Location: ../LogINOUT/login.php");
     exit;
    } ?>
</body>
</html>

<?php }else {
	header("Location: ../LogINOUT/login.php");
	exit;
} ?>