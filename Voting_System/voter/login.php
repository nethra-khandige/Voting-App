<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width= , initial-scale=1.0" />
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
  <link rel="stylesheet" , href="../css/style.css" />
  <link rel="stylesheet" href="../css/login.css" class="stylesheet">
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
    <input type="checkbox" id="check" />
    <label for="check" class="checkbtn">
      <i class="fa fa-bars"></i>
    </label>
    <label class="logo"> Voting System</label>
    <ul>
      <li><a href="../index.html">Home</a></li>
      <li><a href="#">About</a></li>
    </ul>
  </nav>

  <!-- voterid,name,address,phone number -->
  <div class="container" style="margin-top: 100px;">
    <div class="form-container" id="login-form">
      <h1 style="color: #fff;">Login</h1>
      <form action="voter_actions/login_back.php" method="POST">
        <label for="name">Name</label>
        <input type="text" id="username" name="name" required>
        <label for="aadhaar">Aadhaar number</label>
        <input type="text" id="aadhaar" name="aadhaar" required  maxlength="12" minlength="12">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
      </form>
      <p>Don't have an account? <a href="register.php">Sign up</a></p>
    </div>
  </div>

  <!--bootstrap-->
  <script src="../js/jquery-3.2.1.slim.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>