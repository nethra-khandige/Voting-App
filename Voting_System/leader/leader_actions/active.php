
<?php
session_start();
include('../../actions/connect.php');

$sql = "SELECT * FROM election_name WHERE active=1"; 
$result = mysqli_query($con, $sql);

// Check if the query was successful
if ($result) {
    // Fetch all rows from $result and store them in an array
    $data2 = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data2[] = $row;
    }

    // Store the array in the session variable
    $_SESSION['data2'] = $data2;

    // Redirect to the admin dashboard
    echo '<script>
        alert("Data fetched successfully");
        window.location="../leader_dash.php";
    </script>';
} else {
    // Handle the case where the query was not successful
    echo '<script>
        alert("Error fetching data");
        window.location="../login.php";
    </script>';
}
?>


