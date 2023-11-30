<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!--bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/bootstrap.min.css">
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
  <link rel="stylesheet" , href="../css/style.css" />
  <link rel="stylesheet" href="../css/login.css">
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
    <label class="logo">Admin Login</label>
    <ul>
      <li><a href="index_admin.html">Home</a></li>
      <li><a href="#">About</a></li>
    </ul>
  </nav>
  <section>
    <div class="container">
      <div class="form-container" id="login-form">
        <h1 style="color: #fff;">Admin Login</h1>
        <?php session_start();
                    if(isset($_SESSION['error'])){// checks if the variable is set i.e if there is an error
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
        <form action="admin_auth.php" method="post">
          <label for="aadhar">Aadhar</label>
          <input type="text" id="aadhar" name="aadhar" required  maxlength="12" minlength="12">
          <label for="Password">Password</label>
          <input type="Password" id="Password" name="password" required>
          <button type="submit" value="Login">Login</button>
        </form>
      </div>
    </div>
  </section>




  <script src="../js/jquery-3.2.1.slim.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>