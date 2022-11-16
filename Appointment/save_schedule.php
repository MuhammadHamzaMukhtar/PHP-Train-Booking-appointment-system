<?php 
require_once('./../include/DBconn.php');


if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No data to save.'); location.replace('./') </script>";
    $conn->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

$sql = "SELECT id, aptDate, aptTime FROM booking_list WHERE aptDate = '{$aptDate}' AND aptTime = '{$aptTime}'";
$result = $conn->query($sql);

if (mysqli_num_rows($result)<2){
    if(empty($id)){
        $sql = "INSERT INTO `booking_list` (`title`,`description`,`aptDate`,`aptTime`) VALUES ('$title','$description','$aptDate','$aptTime')";
    }else{
        $sql = "UPDATE `booking_list` set `title` = '{$title}', `description` = '{$description}', `aptDate` = '{$aptDate}', `aptTime` = '{$aptTime}' where `id` = '{$id}'";
    }
    $save = $conn->query($sql);
}
else{
    echo "<script> alert('Sorry. Time chosen are full'); location.replace('./appointment.php') </script>";
}
if($save){
    echo "<script> alert('Booking Successfully Saved.'); location.replace('./appointment.php') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();
?>