<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
} else {
  $loggedin = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="assets/images/favicon.jpg">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>ESparxx</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/footerstyle.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <script src="jquery.js"></script>
</head>

<body>

  <!--header  -->
  <header>
    <nav id="nav1">
      <ul>
        <li class="logo"><img src="assets/images/logo.jpg" style="margin-top: 10px; height: 30px"></li>
        <li class="btn"><span class="fas fa-bars"></span></li>

        <form action="search.php" method="GET">
          <li class="search-icon">
            <input type="search" placeholder="Search" name="query">
            <label class="icon">
              <span class="fas fa-search"></span>
            </label>
          </li>
        </form>

        <div class="items">
          <?php if (!$loggedin) {
            echo '<li><a href="login.php">Login</a></li>&nbsp;
          <li><a href="signup.php">Register</a></li>';
          } else {
            echo '<li style="font-size:19px; font-weight:bold;">Welcome ' . $_SESSION['username'] . '</li>&nbsp; <li><a href="logout.php">Logout</a></li>';
          }
          ?>
          </a>
        </div>
      </ul><br>

    </nav>
    <nav id="nav2">
      <div>
        <ul>
          <div class="Nav-items">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="cars.php">Brands</a></li>
            <li class="nav-item"><a class="nav-link" href="shops.php">Shop</a></li>
            <li class="nav-item"><a class="nav-link" href="show_bookmark.php">Account</a></li>
            <li class="nav-item"><a class="nav-link" href="about-us.php">About us</a></li>

          </div>
        </ul>
      </div>
    </nav>
  </header>
  <br><br><br><br><br>

</body>

</html>