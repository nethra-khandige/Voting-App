<?php
session_start();

$leader = $_SESSION['leader'];
if (!isset($_SESSION['data2'])) {
    echo 'Not set';
}
$data2 = $_SESSION['data2'];

// if ($_SESSION['active'] == 0) {
//     $status = '<b class="text-success">Registered</b>';
// } else {
//     $status = '<b class="text-danger">Not Registered</b>';
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width= , initial-scale=1.0"/>
    <!--bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--bootstrap-->

    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Grand+Hotel&family=Playpen+Sans&display=swap"
        rel="stylesheet"/>
    <!--Google font-->

    <!--Font awesome-->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <!--Font awesome-->
    <link rel="stylesheet", href="../css/style.css"/>
    <style>
        /* Hide the checkbox visually */
        #check {
            display: none;
        }

        .container {
            margin-bottom: 100px;
        }
    </style>
</head>
<body>
<!--Navbar-->
<nav>
    <input type="checkbox" id="check"/>
    <label for="check" class="checkbtn">
        <i class="fa fa-bars"></i>
    </label>
    <label class="logo"> Voting System</label>
    <ul>
        <li><a href="index_leader.html">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="../logout.php">Logout</a></li>
    </ul>
</nav>
<h2>Elections:</h2>
<form action="leader_actions/candidates.php" method="POST">
            <?php foreach ($data2 as $election) : ?>
                <div>
                    <button type="submit" name="election_type" value="<?= $election['type'] ?>" class="magnifyBtn" style="
                        background-image: linear-gradient(to right, #a517ba,#5f1178);
                        color: white;
                        border-radius: 6px;
                        border: 2px white solid;
                        transition: transform 250ms ease-in-out;
                        margin-left: auto;
                        /* margin-top: 20px; */
                        margin-bottom: 20px;
                        padding: 10px 10px;
                        padding-right: 50px;
                        padding-left: 50px;
                        font-size: 50px;
                        transition: background-color 0.3s;">
                        <?= $election['type'] ?>
                    </button>
                </div>
            <?php endforeach; ?>
        </form>
    <!-- <form action="leader_actions/add_candi.php" method="POST">
            <label for="name">Name of Candidate</label>
          <input type="text" id="name" name="name" required>
         <label for="aadhar">Aadhar of Candidate</label>
          <input type="text" id="aadhar" name="aadhar" required  maxlength="12" minlength="12">
          <label for="constituency">Constituency</label>
          <input type="text" id="constituency" name="constituency" required>
        <button class="magnifyBtn" type="submit">Add candidate</button>
    </form> -->

        <!--bootstrap-->
        <script src="../js/jquery-3.2.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>

