<?php
session_start();
include('../../actions/connect.php');

function authenticateAdmin($aadhar, $password, $con) {
    $sql = "SELECT * FROM party WHERE Aadhaar_leader = '$aadhar' AND active=1";

    $result = mysqli_query($con, $sql);


    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //$_SESSION['id'] = $data['id'];
        $_SESSION['leader'] = $data;
        return true; // Authentication successful
    } else {
        return false; // Authentication failed
    }
}

$aadhar = $_POST['aadhar'];
$password = $_POST['password'];

if (authenticateAdmin($aadhar, $password, $con)) {
    echo '<script>
    alert("success");
    window.location="active.php";
    </script>';
} else {
    echo '<script>
    alert("Invalid credentials or its election time");
    window.location="../login.php";
    </script>';
}
?>