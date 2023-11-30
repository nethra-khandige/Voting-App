<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:login.php');
}
$data = $_SESSION['data'];
if ($_SESSION['status'] == 1) {
    $status = '<b class="text-success">Voted</b>';
} else {
    $status = '<b class="text-danger">Not Voted</b>';
}
$data2 = $_SESSION['data2'];
$type= $_SESSION['type'];


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
        <li><a href="../index.html">Home</a></li>
        <li><a href="./login.php">Login</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>
<h2 class="text-center">Dashboard</h2>
<div class="container text-center my-5">
    <div class="row my-5">
        <div class="col-md-7">
            <?php
            if(isset($_SESSION['candi'])){
                $candi = $_SESSION['candi'];
                for ($i = 0;$i<count($candi);$i++){
                    ?>
                    <div class="row">
                        <?php
                        if($_SESSION['status']==1){
                            ?>
                            <div class="col-md-12">
                            <p>You have already voted!</p>
                            </div>
                        </div>
                        <?php
                        }
                        if($type=='LS' && isset($data['LS']) && $candi[$i]['constituency']==$data['LS']){
                            ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="../uploads/<?php echo $candi[$i]['symbol']; ?>"
                                        alt="candi image" width="200" height="200" style="object-fit: contain;">
                                </div>
                                <div class="col-md-8">
                                    <strong class="h5">Candidate name:</strong>
                                    <?php echo $candi[$i]['name']; ?><br>
                                    <strong class="h5">Party:</strong>
                                    <?php echo $candi[$i]['party']; ?><br>
                                    <strong class="h5">Votes:</strong>
                                    <?php echo $candi[$i]['votes']; ?><br>
                                    <strong class="h5">Constituency:</strong>
                                    <?php echo $candi[$i]['constituency']; ?><br>
                                </div>
                        </div>
                        <form action="voter_actions/voting.php" method="POST">
                            <input type="hidden" name="candivote" value="<?php echo $candi[$i]['votes']; ?>">
                            <input type="hidden" name="aadhaar" value="<?php echo $candi[$i]['aadhaar']; ?>">
                            <?php
                            if ($_SESSION['status'] == 1) {
                                ?>
                                <button class="magnifyBtn">Voted</button>
                                <?php
                            } else {
                                ?>
                                <button class="magnifyBtn" type="submit">Vote</button>
                                <?php
                            }
                            ?>
                        </form>
                        <hr>
                        <?php
                        
                    }
                    if($type=='VS' && isset($data['VS']) && $candi[$i]['constituency']==$data['VS']){
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="../uploads/<?php echo $candi[$i]['symbol']; ?>"
                                    alt="candi image" width="200" height="200" style="object-fit: contain;">
                            </div>
                            <div class="col-md-8">
                                <strong class="h5">Candidate name:</strong>
                                <?php echo $candi[$i]['name']; ?><br>
                                <strong class="h5">Party:</strong>
                                <?php echo $candi[$i]['party']; ?><br>
                                <strong class="h5">Votes:</strong>
                                <?php echo $candi[$i]['votes']; ?><br>
                                <strong class="h5">Constituency:</strong>
                                <?php echo $candi[$i]['constituency']; ?><br>
                            </div>
                    </div>
                    <form action="voter_actions/voting.php" method="POST">
                        <input type="hidden" name="candivote" value="<?php echo $candi[$i]['votes']; ?>">
                        <input type="hidden" name="aadhaar" value="<?php echo $candi[$i]['aadhaar']; ?>">
                        <?php
                        if ($_SESSION['status'] == 1) {
                            ?>
                            <button class="magnifyBtn">Voted</button>
                            <?php
                        } else {
                            ?>
                            <button class="magnifyBtn" type="submit">Vote</button>
                            <?php
                        }
                        ?>
                    </form>
                    <hr>
                    <?php
                    
                }
                    else{
                        ?>
                        <div class="container">
                          <p> No candidates to display</p>
                      </div>
                      <?php
                      }
                      ?>
            <?php    
           
                }
            }
?>
