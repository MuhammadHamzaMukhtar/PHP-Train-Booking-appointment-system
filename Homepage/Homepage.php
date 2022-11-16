<?php 
session_start();
include "../include/DBconn.php";

if(!isset($_SESSION['id'])){
    header('location: ../LogINOUT/login.php');
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
        <link href="../CSS/Homepage.css" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>


    <body>

        <!-- Nav bar -->
        <div class="">
            <br><br><br>
            <?php include("../include/navigation.php"); ?>
        </div>

        <!-- Introduction row -->
        <div class = "row col-12 mx-auto shadow">
            <div class = "col xcol col-after">
                <br><br><br><br>
                <h1> 
                    Succulent-Plant Kuching
                </h1>
                <h3>
                    Live Love Laugh
                </h3>
                <br>
                <h4 style="padding-right: 100px;">
                    Cacti-Succulent Kuching is a locally owned and operated company 
                    that specializes in selling a wide variety of succulent plants and related products. 
                    Affordably priced succulent plants of all types and sizes 
                    as well as gardening tools, soils, and fertilizers are available.
                </h4>
                <a href="../Appointment/appointment.php" class="btn btn-secondary xxbutton rounded-pill" tabindex="1" role="button" aria-disabled="true" style="font-size: 25px; border: 0; padding-top:15px;">Visit us</a>

                <br><br><br>


            </div>
            <div class ="col" style="padding: 0">
                <img src="Homepage_Images/background5.jpg" alt="background" style="width: 100%; padding: 0;">
            </div>
        </div>  

        <!-- Promotion text -->
        <br><br>
        <hr class="col-9 mx-auto" style="border-top: 3px double;">
        <h2 class="text-center" style=" font-size: 45px; font-family: 'Untitled Serif',Georgia,Moderat,Helvetica Neue,Helvetica,Arial,sans-serif; font-weight: 700; font-style: normal; text-rendering: optimizeLegibility; padding-top: 30px;">Promotions</h2>
        <hr class="col-9 mx-auto" style="border-top: 3px double;">

        <!-- Promotion container - cards -->
        <div class="row col-12 row-cols-1 row-cols-md-4  g-5" style="margin:0;">
        

            <?php
                
                $query = "SELECT * FROM promotions";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $promotion)
                    {

                        ?>

                        <div class="col">
                            <div class="card h-100">
                                <img src="Homepage_Images/<?php echo $promotion['product_image'];?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $promotion['product_name'];?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted fst-italic"><?php echo $promotion['product_sname'];?></h6>
                                    <div class="col-12 card-text row">
                                        <div class="col-3 text-decoration-line-through text-left">$
                                            <?php echo $promotion['product_price'];?></div>
                                        <div class="col-9 text-danger" style="padding-left:0"><?php echo $promotion['product_discount'];?>%</div>
                                    </div>
                                    <p class="card-text">$<?php echo $promotion['product_dprice'];?></p>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    echo "No products found";
                }
                
            
            ?>



        </div> 
        
        <hr style="border-top: 3px double;">
        <hr style="border-top: 3px double;">
        <br><br>
        <h2 class="text-center" style=" font-size: 50px; font-family: 'Untitled Serif',Georgia,Moderat,Helvetica Neue,Helvetica,Arial,sans-serif; font-weight: 700; font-style: normal; text-rendering: optimizeLegibility; padding-top: 50px; padding-bottom: 50px; margin-bottom: 0px;">Why us?</h2>

        <div class="row col-12">
            <div class="row col-9 mx-auto">
                <div class="col-3 mx-auto">
                    <div class="card border-0">
                        <img alt="icon" src="https://res.cloudinary.com/patch-gardens/image/upload/c_scale,h_144,q_auto:good,w_144/v1/cms/SVG_Quality_illustration.svg">                                                                                                                                            
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                Best Quality
                            </h5>
                            <h6 class="card-subtitle mb2 text-muted text-center">
                                The plants are all carefully nourished by our excellent team. With the outmost care, comes with the outmost quality.
                            </h6>
                        </div>    
                    </div>
                </div>

                <div class="col-3 mx-auto">
                    <div class="card border-0">
                        <img alt="icon" src="https://res.cloudinary.com/patch-gardens/image/upload/c_scale,h_144,q_auto:good,w_144/v1/cms/SVG_Quality_illustration.svg">                                                                                                                                            
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                Best Quality
                            </h5>
                            <h6 class="card-subtitle mb2 text-muted text-center">
                                The plants are all carefully nourished by our excellent team. With the outmost care, comes with the outmost quality.
                            </h6>
                        </div>    
                    </div>
                </div>

                <div class="col-3 mx-auto">
                    <div class="card border-0">
                        <img alt="icon" src="https://res.cloudinary.com/patch-gardens/image/upload/c_scale,h_144,q_auto:good,w_144/v1/cms/SVG_Quality_illustration.svg">                                                                                                                                            
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                Best Quality
                            </h5>
                            <h6 class="card-subtitle mb2 text-muted text-center">
                                The plants are all carefully nourished by our excellent team. With the outmost care, comes with the outmost quality.
                            </h6>
                        </div>    
                    </div>
                </div>
                
                
            </div>
           
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>

</hmtl>