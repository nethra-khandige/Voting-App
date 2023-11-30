<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width= , initial-scale=1.0" />
    <!--bootstrap-->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--bootstrap-->

    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Grand+Hotel&family=Playpen+Sans&display=swap"
      rel="stylesheet"
    />
    <!--Google font-->

    <!--Font awesome-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!--Font awesome-->
    <link rel="stylesheet" , href="../css/style.css" />
    <style>
      /* Hide the checkbox visually */
      #check {
        display: none; 
      }
    </style>
  </head>

  <body style="background-image: linear-gradient(45deg, #8193ee, transparent)">
    <!--Navbar-->
    <nav>
      <input type="checkbox" id="check" />
      <label for="check" class="checkbtn">
        <i class="fa fa-bars"></i>
      </label>
      <label class="logo"> Voting System</label>
      <ul>
        <li><a href="index_admin.html">Home</a></li>
        <li><a class="active" href="#">Results</a></li>
        <li><a href="admin_dash.php">Admin Dashboard</a></li>
      </ul>
    </nav>
        <!--bootstrap-->
        <script src="../js/jquery-3.2.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>

<?php
session_start();
include('../actions/connect.php');
$type = $_SESSION['typeResult'];

if ($type == 'LS') {
    $sql = "SELECT l.name, l.constituency, l.party, l.count AS votes
            FROM ls l
            JOIN (
                SELECT constituency, MAX(count) AS max_votes
                FROM ls
                GROUP BY constituency
            ) AS max_counts
            ON l.constituency = max_counts.constituency AND l.count = max_counts.max_votes
            ORDER BY l.constituency, l.count DESC";
    $sql2 = "SELECT party, SUM(count) as total_votes
            FROM ls
            GROUP BY party
            ORDER BY total_votes DESC
            LIMIT 1;";
} elseif ($type == 'VS') {
    $sql = "SELECT v.name, v.constituency, v.party, v.count AS votes
            FROM vs v
            JOIN (
                SELECT constituency, MAX(count) AS max_votes
                FROM vs
                GROUP BY constituency
            ) AS max_counts
            ON v.constituency = max_counts.constituency AND v.count = max_counts.max_votes
            ORDER BY v.constituency, v.count DESC";
    $sql2 = "SELECT party, SUM(count) as total_votes
            FROM vs
            GROUP BY party
            ORDER BY total_votes DESC
            LIMIT 1;";
}

$result = mysqli_query($con, $sql);
$resultparty = mysqli_query($con, $sql2);
$rowParty = mysqli_fetch_assoc($resultparty);
$totalVotes = $rowParty['total_votes'];
$party = $rowParty['party'];

if ($result) {
    echo '<h3>The winners in ' . $type . ' election are:</h3>';
    while ($row = mysqli_fetch_assoc($result)) {
        $constituency = $row['constituency'];
        $candi = $row['name'];
        $maxParty = $row['party'];
        $maxVotes = $row['votes'];

        echo "Constituency: $constituency\nCandidate: $candi\nVotes: $maxVotes\nParty: $maxParty\n<br>";
    }
} else {
    echo "Error executing query: " . mysqli_error($con);
}

echo '<h3>The winning party is:</h3>';
if ($rowParty) {
  echo "Winning Party: " . $rowParty['party'];
} else {
  echo "No party found.";
}

$createtrigls="CREATE TRIGGER clear_after_result_ls
AFTER INSERT
ON backup_ls FOR EACH ROW
BEGIN
    DELETE FROM ls;
    UPDATE voter SET status = 0;
END;";

//$resultTrigger = mysqli_query($con, $createtrigls);

$createtrigvs="CREATE TRIGGER clear_after_result_vs
AFTER INSERT
ON backup_vs FOR EACH ROW
BEGIN
    DELETE FROM vs;
    UPDATE voter SET status = 0;
END;";

//$resultTrigger = mysqli_query($con, $createtrigvs);

if($rowParty){
  if($type=='LS'){
    $sqlback="INSERT INTO backup_ls (election,party,votes) VALUES ('$type','$party',$totalVotes);";
  }else{
    $sqlback="INSERT INTO backup_vs (election,party,votes) VALUES ('$type','$party',$totalVotes);";
  }
}

$resultb = mysqli_query($con, $sqlback);

?>



        


