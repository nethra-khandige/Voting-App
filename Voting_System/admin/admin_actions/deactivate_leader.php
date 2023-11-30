<?php
session_start();
include('../../actions/connect.php');


//removes access for leaders
$sql2 = "UPDATE party SET active = 0";
$sql3 = "UPDATE voter SET active = 1";
$result2 = mysqli_query($con,$sql2);
$result3 = mysqli_query($con,$sql3);


echo '<script>
alert("Deactivated leader");
window.location="../admin_dash.php";
</script>';
// header('location:../admin_dash.php');

//use join to check party or constituency

