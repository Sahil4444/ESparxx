<?php
include 'connection.php';
include 'header.php';
include 'connection.php';
if (!isset($_SESSION['userid'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ESparxx</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>

<body>
    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-1-1920x500.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>Your Bookmarked Products</h4>
                        <h2>Your Account</h2>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>

    <br><br>
    <!-- end -->
    <div class="container text-black">
        <h2 class='text-center text-black'>My Bookmarked Items</h2>

        <section id="content">
            <div class="content-blog content-account">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <table class="cart-table account-table table table-bordered bg-white text-dark">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>

                                        <th>Date and Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $c_id = $_SESSION['userid'];

                                    $sql = "SELECT * FROM bookmark JOIN products on products.product_id=bookmark.product_id";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                                <td>
                                                    <a href="car-details.php?productid=<?php echo $row["product_id"] ?>" style="color: black;"> <?php echo $row["product_title"] ?></a>
                                                </td>
                                                <td>
                                                    <?php echo $row["product_price"] ?>
                                                </td>

                                                <td>
                                                    <?php echo date('M j g:i A', strtotime($row["timestamp"]));  ?>
                                                </td>
                                                <?php echo ' 
                                               <td>
                                                <a href="delete-bookmark.php?pid=' . $row["product_id"] . '&userid=' . $_SESSION['userid'] . '" style="color: red;"> Delete</a>
                                                </td>'; ?>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section><br><br>
    <?php include 'footer.php'; ?>
</body>

</html>