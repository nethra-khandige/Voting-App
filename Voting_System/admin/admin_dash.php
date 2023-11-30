
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting system</title>
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
        <li><a href="results.php">Results</a></li>
        <li><a href="../logout.php">Logout</a></li>
      </ul>
    </nav>
    <div>
      <h2 class="text-center">Add Party</h2>
      <div class="container text-center">
        <form action="admin_actions/add_party.php" method="POST">
          <div class="mb-3">
            <input
              type="text"
              class="form-control w-30 m-auto"
              name="partyname"
              placeholder="Enter the party name"
              required
            />
          </div>
          <div class="mb-3">
            <input
              type="text"
              class="form-control w-30 m-auto"
              name="leadername"
              placeholder="Enter the leadername"
              required
            />
          </div>
          <div class="mb-3">
            <input
              type="text"
              class="form-control w-30 m-auto"
              name="aadhaar"
              placeholder="Enter the leadername's aadhaar number"
              required
              maxlength="12" minlength="12"
            />
          </div>
          <label for="new-photo" style = "display: inline-block;
    margin-right: 1000px;">Party Symbol</label>
          <div class="mb-3">
          <input type="file" id="new-file" name="symbol">
    </div>
          <a href="#"><button class="magnifyBtn" type="submit">Add</button></a>
    </form>
    <hr><hr><hr>
    <!-- <form action="admin_actions/add_election.php" method="POST">
          <div class="mb-3">
            <input
              type="text"
              class="form-control w-30 m-auto"
              name="electionname"
              placeholder="Enter the election name"
              required
            />
          </div>
          <a href="#"><button class="magnifyBtn" type="submit">Add election</button></a>
    </form> -->
    <form action="admin_actions/inactive.php" method="POST">
      <a href="elec.php"><button class="magnifyBtn" type="submit">Activate election</button></a>
    </form>
    <form action="admin_actions/deactivate_leader.php" method="POST">
      <a href="#"><button class="magnifyBtn" type="submit">De-activate leader</button></a>
    </form>
    <form action="admin_actions/active.php" method="POST">
      <a href="deact.php"><button class="magnifyBtn" type="submit">De-activate election</button></a>
    </form>
    





    
<script src="../js/jquery-3.2.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>