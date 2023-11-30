<?php
session_start();
include('../actions/connect.php');

function authenticateAdmin($aadhar, $password, $con) {
    $sql = "SELECT * FROM election_commissioner WHERE Aadhaar = '$aadhar' AND Password = '$password'";

    $result = mysqli_query($con, $sql);


    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['id'] = $data['id'];
        $_SESSION['data'] = $data;
        return true; // Authentication successful
    } else {
        return false; // Authentication failed
    }
}

$aadhar = $_POST['aadhar'];
$password = $_POST['password'];

if (authenticateAdmin($aadhar, $password, $con)) {
    echo '<script>
    window.location="admin_dash.php";
    </script>';
} else {
    echo '<script>
    alert("Invalid credentials");
    window.location="admin_login.php";
    </script>';
}
?>