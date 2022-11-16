<?php
session_start();
// include "../include/DBconn.php";
$conn = mysqli_connect("localhost", "root", "", "csk");
$GLOBALS['conn'] = $conn;

if (!isset($_SESSION['email'])) {
    header('location: ../LogINOUT/login.php');
}
// function NumberOfAppointmentsPerDay()
// {
//     $sql = "SELECT COUNT(member_id) AS Appointments, CAST(aptDate as DATE) AS Date FROM booking_list GROUP BY CAST(aptDate as DATE)";
//     $result = $GLOBALS['conn']->query($sql) or die($GLOBALS['conn']->error);
//     $data = [];
//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             $data[] = $row;
//         }
//     }
//     return $data;
// }
// $chart_data = NumberOfAppointmentsPerDay();
// mysqli_close($GLOBALS['conn']);

$sql = "SELECT * ,
DAYNAME(aptDate) AS aptDay,
MONTHNAME(aptDate) AS aptMonth,
Year(aptDate) AS aptYear
FROM booking_list";

$result = mysqli_query($conn, $sql);

// echo $result;

while($row = mysqli_fetch_assoc($result)){
    echo $row['aptDay'];
    echo $row['aptMonth'];
    // $date = $row['aptDate'];
    // $f_date = date('l', strtotime($date));
    // echo $f_date;
}


// $i = 0;
// $j = 0;

// foreach($row['aptDate'] as $res){
//     if(date('l', strtotime($res))  == 'Sunday'){
//         $i++;
//     }

//     if(date('l', strtotime($res) == 'Thursday')){
//         $j++;
//     }

// }

// echo $i;

?>
