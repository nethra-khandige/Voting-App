<?php
session_start();
if (!isset($_SESSION['data2'])) {
    echo 'Not set';
}
$data2 = $_SESSION['data2'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting system</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--bootstrap-->

    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Grand+Hotel&family=Playpen+Sans&display=swap" rel="stylesheet" />
    <!--Google font-->

    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!--Font awesome-->
    <link rel="stylesheet", href="../css/style.css" />
    <style>
        /* Hide the checkbox visually */
        #check {
            display: none;
        }
    </style>
</head>

<body>
    <!--Navbar-->
    <nav>
        <input type="checkbox" id="check" />
        <label for="check" class="checkbtn">
            <i class="fa fa-bars"></i>
        </label>
        <label class="logo">Admin Dashboard</label>
        <ul>
            <li><a href="index_admin.html">Home</a></li>
            <li><a class="active" href="admin_dash.php">Dashboard</a></li>
        </ul>
    </nav>
    <h2 class="text-center" style ="font-size: 50px;
    font-style: italic;
    margin-top: 50px;
    margin-bottom: 50px;">Active Elections</h2>
    <div class="container text-center my-5">
    <div class="row">
        <form action="admin_actions/de_activate.php" method="POST">
            <?php foreach ($data2 as $election) : ?>
                <div>
                    <button type="submit" name="election_type" value="<?= $election['type'] ?>" class="magnifyBtn" style="padding: 12px 24px;
                        background-image: linear-gradient(to right, #a517ba,#5f1178);
                        color: white;
                        border-radius: 6px;
                        border: 2px white solid;
                        transition: transform 250ms ease-in-out;
                        margin-left: auto;
                        /* margin-top: 20px; */
                        margin-bottom: 20px;
                        padding: 20px 20px;
                        padding-right: 100px;
                        padding-left: 100px;
                        font-size: 50px;
                        transition: background-color 0.3s;">
                        <?= $election['type'] ?>
                    </button>
                </div>
            <?php endforeach; ?>
        </form>
    </div>
</div>

    <script src="../js/jquery-3.2.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
