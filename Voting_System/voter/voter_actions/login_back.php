<?php
session_start();
include('../../actions/connect.php');

$username = $_POST['name'];
$aadhaar = $_POST['aadhaar'];
$password = $_POST['password'];

$sql = "SELECT * FROM voter WHERE Aadhaar = '$aadhaar' AND Name = '$username' AND Password = '$password' AND active=1";

$result = mysqli_query($con, $sql);

// Checking if the person is present in the database
if (mysqli_num_rows($result) > 0) {
    // $sql1 = "SELECT candidates.name as name, candidates.party as party, candidates.constituency as constituency, party.symbol as symbol
    // FROM candidates
    // JOIN party ON candidates.party = party.pname;
    //  ";
    // $resultcandi = mysqli_query($con, $sql1);

    // if (mysqli_num_rows($resultcandi) > 0) {
    //     $candi = mysqli_fetch_all($resultcandi, MYSQLI_ASSOC); // Fetch all candidates
    //     $_SESSION['candi'] = $candi;
    // }

    $data = mysqli_fetch_array($result, MYSQLI_ASSOC); // Fetch the user and store in session variables
    $_SESSION['id'] = $data['id'];
    $_SESSION['status'] = $data['status'];
    $_SESSION['data'] = $data;
    echo '<script>
    window.location="../dashboard.php";
    </script>';

} else {
    echo '<script>
    alert("Invalid credentials");
    window.location="../login.php";
    </script>';
}
?>
