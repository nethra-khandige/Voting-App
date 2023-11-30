
<?php
session_start();
include('../../actions/connect.php');

$sql = "SELECT * FROM election_name WHERE active=1"; 
$result = mysqli_query($con, $sql);
$type = $_POST['election_type'];
$_SESSION['type']=$type;

// Check if the query was successful
if ($result) {
    // Fetch all rows from $result and store them in an array
    $data2 = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data2[] = $row;
    } 

    // Store the array in the session variable
    $_SESSION['data2'] = $data2;
    
    if($type=='LS'){
        $sql1 = "SELECT ls.name as name,ls.count as votes,ls.aadhaar as aadhaar, ls.party as party, ls.constituency as constituency, party.symbol as symbol
        FROM ls
        JOIN party ON ls.party = party.pname;";
    }elseif($type=='VS'){
        $sql1 = "SELECT vs.name as name,vs.count as votes,vs.aadhaar as aadhaar, vs.party as party, vs.constituency as constituency, party.symbol as symbol
        FROM vs
        JOIN party ON vs.party = party.pname;";
    }

    $resultcandi = mysqli_query($con, $sql1);

    if (mysqli_num_rows($resultcandi) > 0) {
        $candi = mysqli_fetch_all($resultcandi, MYSQLI_ASSOC); // Fetch all candidates
        $_SESSION['candi'] = $candi;
    }

    // Redirect to the admin dashboard
    echo '<script>
        alert("Data fetched successfully");
        window.location="../candi.php";
    </script>';
} else {
    // Handle the case where the query was not successful
    echo '<script>
        alert("Error fetching data");
        window.location="../dashboard.php";
    </script>';
}
?>


