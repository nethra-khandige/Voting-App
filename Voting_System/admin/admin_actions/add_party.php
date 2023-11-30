<?php
session_start();
include('../../actions/connect.php');

$pname = $_POST['partyname'];
$leadername = $_POST['leadername'];
$symbol = $_POST['symbol'];
$aadhar= $_POST['aadhaar'];

$sql2 = "SELECT * FROM party WHERE pname='$pname'";
$result2 = mysqli_query($con,$sql2);
if ($result2) {
    $numRows = mysqli_num_rows($result2);

    if ($numRows > 0) {
        // Party already exists
        echo '<script>
            alert("Party already exists");
            window.location="../admin_dash.php";
        </script>';
        exit;
    }
}
$sql = "INSERT INTO party (pname,leader,symbol,Aadhaar_leader,active) VALUES('$pname','$leadername','$symbol','$aadhar',0)";
$result = mysqli_query($con,$sql);
if($result){
    echo '<script>
    alert("Party registered");
    window.location="../admin_dash.php";
    </script>';
    exit;
}
//use join to check party or constituency

