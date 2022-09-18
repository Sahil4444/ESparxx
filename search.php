<?php
include 'header.php';
include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ESparxx</title>
</head>

<body>
    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-1-1920x500.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>Your searched cars</h4>
                        <h2></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- searched cars -->
    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Your searched results</h2>
                        <!-- <a href="cars.php">view more <i class="fa fa-angle-right"></i></a> -->
                    </div>
                </div>
                <?php
                $query = $_GET['query'];
                $min_length = 3;
                if (strlen($query) >= $min_length) {

                    $query = htmlspecialchars($query);

                    // $query = mysqli_real_escape_string($query);

                    $sql = "SELECT * FROM products WHERE (`product_title` LIKE '%" . $query . "%') 
    OR (`product_desc` LIKE '%" . $query . "%')";
                    $result = mysqli_query($conn, $sql);
                    // $raw_results = mysqli_query() or die(mysqli_error());

                    if (mysqli_num_rows($result) > 0) {
                        while ($results = mysqli_fetch_array($result)) {
                            $p_id = $results['product_id'];
                            $p_title = $results['product_title'];
                            $p_price = $results['product_price'];
                            $p_img = $results['product_image'];
                            echo '<div class="col-lg-4 col-md-6">
            <div class="product-item">
                <a href="car-details.php"><img src="data:image;base64,' . base64_encode($p_img) . '" alt=""></a>
                <div class="down-content">
                    <a href="car-details.php">
                        <h4>' . $p_title . '</h4>
                    </a>
                    <h6> ₹ ' . $p_price . '</h6>
                    <a href="car-details.php?productid=' . $p_id . '"> <button type="button" style="padding:10px 100px 10px 100px;" class="btn btn-outline-success">View all Offers</button></a>
                </div>
            </div>
        </div>';
                        }
                    } else { // if there is no matching rows do following
                        echo "No results";
                    }
                } else { // if query length is less than minimum
                    echo "Minimum length is " . $min_length;
                }
                ?>
            </div>
        </div>

        <!-- end -->
        <?php include 'footer.php'; ?>
</body>

</html>