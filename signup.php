<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connection.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    //$exists = false;
    //check  whether this username exists
    $existSql = "SELECT * FROM `user_info` WHERE  username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows =  mysqli_num_rows($result);
    if ($numExistRows > 0) {
        //$exists = true;
        $showError = "User Already Exists";
    } else {
        //$exists = false;
        if (($password)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user_info` ( `username`, `password`, `email`, `mobile`, `address`) VALUES ('$username', '$hash', '$email', '$mobile', '$address')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
            header("location: login.php");
        } else {
            $showError = "Passwords do not match";
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.jpg">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SignUp</title>
</head>

<body>
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
                        <li><a href="login.php">Login</a></li>
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
                            <!-- <li class="nav-item"><a class="nav-link" href="account.php">Accounts</a></li> -->
                            <li class="nav-item"><a class="nav-link" href="about-us.php">About us</a></li>

                        </div>
                    </ul>
                </div>
            </nav>
        </header>
        <br><br><br><br><br>

    </body>

    <?php
    if ($showAlert) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 12px;">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if ($showError) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 12px;">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4">
        <h1 class="text-center">Signup to our website</h1>
        <form action="signUp.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="email">Mobile</label>
                <input type="tel" class="form-control" id="mobile" name="mobile">
            </div>
            <div class="form-group">
                <label for="email">Address</label>
                <input type="test" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
            </div>

            <button type="submit" class="btn btn-primary">SignUp</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>