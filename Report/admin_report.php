<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "csk");
$GLOBALS['conn'] = $conn;

if (!isset($_SESSION['email'])) 
    header('location: ../LogINOUT/login.php');


$result = mysqli_query($conn, "SELECT * FROM booking_list");

while($row = mysqli_fetch_assoc($result)) $date[] = $row['aptDate'];


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
        <link href="../style/Homepage.css" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages': ['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        <?php
$i = 0;
$j = 0;
$k = 0;
$l = 0;
$m = 0;
$n = 0;
$o = 0;

foreach($date as $res)
    if(date('l', strtotime($res))  == 'Monday') ++$i;
    if(date('l', strtotime($res))  == 'Tuesday') ++$j;
    if(date('l', strtotime($res))  == 'Wednesday') ++$k;
    if(date('l', strtotime($res))  == 'Thursday') ++$l;
    if(date('l', strtotime($res))  == 'Friday') ++$m;
    if(date('l', strtotime($res))  == 'Saturday') ++$n;
    if(date('l', strtotime($res))  == 'Sunday') ++$o;

?>
        var data = new google.visualization.arrayToDataTable([
          ['Days', 'Appointments'],
          ['Monday', '<?php echo $i ?>'],
          ['Tuesday', '<?php echo $j ?>'],
          ['Wednesday', '<?php echo $k ?>'],
          ['Thursday', '<?php echo $l ?>'],
          ['Friday', '<?php echo $m ?>'],
          ['Saturday', '<?php echo $n ?>'],
          ['Sunday', '<?php echo $o ?>']
        ]);

        var options = {
          title: 'Appointments per day',
          width: 700,
          legend: { position: 'none' },
          chart: { title: 'Appointments per day', subtitle: '' },
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {  x: {  0: { side: 'bottom', label: 'Days'}  }  },
          vAxis: { title: 'Appointments', direction: -1 },
          bar: { groupWidth: "50%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
    </head>


    <body>

    <?php include("../include/admin_navigation.php"); ?>

     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>

    <div id="top_x_div" class="" style="width: 100px; height: 500px; margin-left: 190px; margin-top: 70px;"></div>
 
</hmtl>
