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

        <br><br>
        <!-- Business information -->
        <div class="row col-12">
            <div class="col-10">
                <h3 style="margin-left:150px;">FAQs</h3>
            </div>

            <div class="col-2">
                <!-- <button type="submit" name="save_promotion" class="btn btn-primary">Add</button> -->
                <button type="button" class="btn btn-primary" onclick="window.location.href='Add_FAQs.php';">Add FAQs</button>

            </div>
        </div>

        <div class="row col-12">
            <?php
                
                $query = "SELECT * FROM enquiry_faqs";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $enquiry_faqs)
                    {

                        ?>
                        <div class="row col-12">
                            <div class="row col-10">
                                <?php echo $enquiry_faqs['FAQs_enquiry'];?>
                            </div>
                            <div class="row col-2">
                                <button type="submit" name="save_promotion" class="btn btn-secondary">Edit</button>
                                <button type="submit" name="save_promotion" class="btn btn-secondary">Delete</button>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {

                }
                
            
            ?>
        </div>
        






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    </body>
</html>