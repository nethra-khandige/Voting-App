<?php
session_start();
include('../../actions/connect.php');

if($_SESSION['status']==1){
    echo "<script>
    alert('You have already voted!');
    window.location='../dashboard.php'
    </script>
    ";
    exit;
}

//increasin the vote count
$votes =$_POST['candivote'];
$totalvotes=$votes+1;

$aadhaar=$_POST['aadhaar'];
$uid=$_SESSION['id'];

$type = $_SESSION['type'];


if($type=='LS'){
    $voteup="UPDATE ls SET count='$totalvotes' WHERE aadhaar= '$aadhaar'";
}
if($type=='VS'){
    $voteup="UPDATE vs SET count='$totalvotes' WHERE aadhaar= '$aadhaar'";
}
$statusup="UPDATE voter SET status=1 WHERE id= '$uid'";

$updatevotes=mysqli_query($con,$voteup);
$updatestatus=mysqli_query($con,$statusup);

if($voteup and $statusup){
    if($type=='LS'){
        $sql="SELECT * from ls";
    }
    if($type=='VS'){
        $sql="SELECT * from vs";
    }
    $getcandi = mysqli_query($con,$sql);
    $candis = mysqli_fetch_all($getcandi,MYSQLI_ASSOC);
    $_SESSION['candi']=$candis;
    $_SESSION['status'] =1;
    echo "<script>
    alert('Voting successful');
    window.location='../dashboard.php'
    </script>
    ";
    exit;

}



else{
    echo "<script>
    alert('Technical error!! Try again later');
    window.location='../dashboard.php'
    </script>
    ";
    exit;
}


