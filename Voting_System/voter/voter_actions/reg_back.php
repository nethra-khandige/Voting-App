<?php
include('../../actions/connect.php');
 
$username=$_POST['name'];
$aadhaar=$_POST['aadhaar'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$ls_constituency=$_POST['ls_constituency'];
$vs_constituency=$_POST['vs_constituency'];
$image=$_FILES['photo']['name'];
$temp_name=$_FILES['photo']['tmp_name'];




if($password !=$confirm_password){
    echo '<script>
    alert("Passwords do not match")
    window.location="../register.php";
    </script>';
    exit;
}
else{
    move_uploaded_file($temp_name,"../../uploads/$image");
    $sql="INSERT INTO voter (Name,Aadhaar,Password,LS,VS,Photo,status,active)
    VALUES ('$username','$aadhaar','$password','$ls_constituency','$vs_constituency','$image',0,1)";
    }
$result = mysqli_query($con,$sql);


if($result){
    $lastInsertedId = mysqli_insert_id($con);
    echo '<script>
    alert("Registration successful! Your Voter ID is:'.$lastInsertedId.'")
    window.location="../login.php";
    </script>';
    exit;
}


?>

