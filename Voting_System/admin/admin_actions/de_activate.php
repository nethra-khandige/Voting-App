<?php
session_start();
include('../../actions/connect.php');

$type = $_POST['election_type'];


$sql = "UPDATE election_name SET active = 0 WHERE type='$type'";
//removes access for leaders
// $sql2 = "UPDATE party SET active = 0";
$sql3 = "UPDATE voter SET active = 0";
$result = mysqli_query($con,$sql);
// $result2 = mysqli_query($con,$sql2);
$result3 = mysqli_query($con,$sql3);



header('location:../admin_dash.php');

//use join to check party or constituency

