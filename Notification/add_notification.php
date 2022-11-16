<?php
include("../include/DBconn.php");
require __DIR__ . '/vendor/autoload.php';

if(isset($_POST['send'])){
    date_default_timezone_set("Asia/Kuching");

    $options = array(
        'cluster' => 'ap1',
        'useTLS' => true
    );

    $pusher = new Pusher\Pusher(
        'e43d8cddaeae61172fde',
        'b1855b80caf087fc83e6',
        '1498123',
        $options
    );

    $randomid = (rand(1,10000));
    $type = $_POST['type'];
    $name = $_POST['name'];
    $msg = $_POST['msg'];
    $date = date('Y-m-d');
    $day = date('l');
    $time = date('h:i A');

    $sql_insert = mysqli_query($conn, "INSERT INTO 
    notification_tb(appointment_id, appointment_type, cust_name, details, noti_date, noti_day, noti_time)
    VALUES ('$randomid', '$type', '$name', '$msg', '$date', '$day', '$time')");

    if($sql_insert){
        $data['message'] = 'hello world';
        $pusher->trigger('my-channel', 'my-event', $data);
        echo "<script>alert(Notification Created Successfully !);</script>";
    }else{
        echo mysqli_error($conn);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "Notification_Page" content = "Notification_Page">
        <title>Booking Appointment System</title>
        <link rel="stylesheet" href="../CSS/Notificationx.css">
        <script src="Notification.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
    </head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <body>
        <!-- Nav bar -->
        <?php 
        include("../include/navigation.php"); 
        ?>

        <div class="container" id="center">
            <div class="row">
                <div class="col-sm-4">
                    <form method="post" class="formx">
                        <div class="form-group">
                            <label for="expampleInputEmail1">Appointment Type</label>
                            <input type="text" class="form-control" name="type" id="expampleInputEmail1" aria-describedby="emailHelp" placeholder="Appointment Type">
                        </div>
                        <div class="form-group">
                            <label for="CustomerName">Name</label>
                            <input type="text" class="form-control" name="name" id="expampleInputEmail1" aria-describedby="emailHelp" placeholder="Type Your Name">
                        </div>
                        <div class="form-group">
                            <label for="AppointDetails">Details</label>
                            <textarea class="form-control" name="msg" id="exampleFormControlTextarea1" cols="30" rows="3"></textarea>
                        </div>
                        <button type="submit" name="send" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>