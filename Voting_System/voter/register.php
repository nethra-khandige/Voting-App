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
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/login.css" class="stylesheet">
  <style>
    /* Hide the checkbox visually */
    #check {
      display: none;
    }

    .container {
      margin-bottom: 100px;
    }

    select {
      background-color: #555;
      color: #fff;
      margin-bottom: 20px;
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
    </ul>
  </nav>

  <!-- voterid,name,address,phone number -->
  <div class="container" style="margin-top: 300px;">
    <div class="form-container" id="signup-form">
      <h1>Sign Up</h1>
      <form action="voter_actions/reg_back.php" method="POST" enctype="multipart/form-data">
        <label for="new-first-name">Name</label>
        <input type="text" id="new-first-name" name="name" required>
        <label for="aadhaar">Aadhaar number</label>
        <input type="text" id="aadhaar" name="aadhaar" required  maxlength="12" minlength="12">
        <label for="new-password">Password</label>
        <input type="password" id="new-password" name="password" required>
        <label for="new-confirm-password">Confirm password</label>
        <input type="password" id="new-confirm-password" name="confirm_password" required>
        <label for="ls_c">Choose Lok Sabha Constituency</label>
        <select class="form-control" name="ls_constituency" style="background-color: #555; color:#fff;margin-bottom:20px">
          <option value="" disabled selected style="display:none;">--Choose a Constituency for LS election--</option>
          <option>Banashankari</option>
          <option>Rajajinagar</option>
          <option>Bellandur</option>
        </select>

        <label for="vs_c">Choose Vidhan Soudha Constituency</label>
        <select class="form-control" name="vs_constituency" style="background-color: #555; color:#fff;margin-bottom:20px">
          <option value="" disabled selected style="display:none;">--Choose a Constituency for VS election--</option>
          <option>Girinagar</option>
          <option>Kanakpura</option>
          <option>Marathahalli</option>
        </select>

        <label for="new-photo">Photo</label>
        <input type="file" id="new-file" name="photo" required>
        <a href="login.php" style="padding: 5px;
          background-color: #5f1178;
          color: #fff;
          border: none;
          font-size: 16px;
          text-align:center;
          transition: background-color 0.2s ease-in-out;">
          <button type="submit" style="padding-right: 200px; padding-left: 200px;"> Sign Up</button></a>
      </form>
      <p>Already have an account? <a href="login.php" id="login-link">Login</a></p>
    </div>
  </div>

  <!--bootstrap-->
  <script src="../js/jquery-3.2.1.slim.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>