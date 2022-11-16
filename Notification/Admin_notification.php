<?php 
    session_start();
    include "../Booking-appointment-system/include/DBconn.php";

    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "Notification_Page" content = "Notification_Page">
        <title>Booking Appointment System</title>
        <link rel="stylesheet" href="../../CSS/Notificationx.css">
        <script src="../js/Notificationx.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
    </head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 
        <!-- Nav bar -->
        <?php 
            include($_SERVER['DOCUMENT_ROOT']."/Booking-appointment-system/include/navigation.php");
            include($_SERVER['DOCUMENT_ROOT']."/Booking-appointment-system/include/DBconn.php");
        ?>
        
        <div class="container" id="table1">
            <div class="row">
                <table class="table caption-top">
                    <caption>Notification</caption>
                    <thead class="table-dark">
                        <tr>
                            <th class="no" scope="col">#</th>
                            <th class="id" scope="col">Appointment ID</th>
                            <th class="details" scope="col">Details</th>
                            <th class="datetime" scope="col">Date/ Time</th>
                        </tr>
                    </thead>
                    <tbody id="result">
                        <?php 
                        $sr_no = 1;
                        $sql_get=mysqli_query($conn, "SELECT * FROM notification_tb ORDER BY noti_date DESC");
                        if($sql_get -> num_rows > 0):
                            while($main_result = mysqli_fetch_assoc($sql_get)):
                                ?>
                                <tr id="data_row">
                                    <th class="sr_no" scope="row">
                                        <?php echo $sr_no++; ?>.
                                    </th>
                                    <th class="id_no" scope="row">
                                        Appointment #<?php echo $main_result['appointment_id'];?><br>
                                        <p class="a_type">" <?php echo $main_result['appointment_type'];?> "</p>
                                    </th>
                                    <td class="custName">
                                        <?php echo $main_result['cust_name'];?><br>
                                        <p class="notiDetails"><?php echo $main_result['details'];?></p>
                                    </td>
                                    <td class="dateNtime">
                                        <?php echo $main_result['noti_date'];?><br>
                                        <?php echo $main_result['noti_day'];?><br>
                                        <p class="notiTime"><?php echo $main_result['noti_time'];?></p>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <?php include('../include/footer.php') ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <script>

            //Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('e43d8cddaeae61172fde', {
                cluster: 'ap1'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                //alert(JSON.stringify(data));
                $.ajax({url: "users.php", success: function(result){
                    $("#result").html(result);
                }});
            });

        </script>

    </body>

</html>