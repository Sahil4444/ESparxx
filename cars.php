<?php include 'header.php';
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ESparxx</title>
</head>

<body>
  <!-- Page Content -->
  <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>Search your dream </h4>
            <h2>Electric Cars</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="products">
    <div class="container">
      <!-- <div class="row">
        <div class="col-md-3">
          <div class="contact-form">
            <form action="#">
              <label>Used/New:</label>

              <select class="form-control">
                <option value="">All</option>
                <option value="new">New vehicle</option>
                <option value="used">Used vehicle</option>
              </select>

              <label>Vehicle Type:</label>

              <select class="form-control">
                <option value="">All</option>
                <option value="">Electric</option>

              </select>

              <label>Make:</label>

              <select class="form-control">
                <option value="">All</option>
                <option value="">Tesla</option>
                <option value="">BMW</option>
                <option value="">Mistsubhishi</option>
                <option value="">Ford</option>
                <option value="">Nissan</option>
                <option value="">Smart EV</option>
              </select>

              <label>Model:</label>

              <select class="form-control">
                <option value="">All</option>
                <option value="">Model 3</option>
                <option value="">Model S</option>
                <option value="">Model X</option>
                <option value="">Model Y</option>
                <option value="">BMW i4 M50</option>

              </select>

              <label>Price:</label>

              <select class="form-control">
                <option value="">All</option>
                <option value=""></option>
                <option value=""></option>
                <option value="">option>
              </select>

              <label>Mileage:</label>

              <select class="form-control">
                <option value="">All</option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
              </select>

              <label>Power:</label>

              <select class="form-control">
                <option value="">Al</option>
                <option value="">80.5 kWh</option>
                <option value="">17.6 kWh</option>
                <option value="">24.6 kWh</option>
                <option value="">50.2 kWh</option>
                <option value="">46.4 kWh</option>
              </select>

              <label>Fuel:</label>

              <select class="form-control">
                <option value="">All</option>
                <option value="">Electricity</option>
                <option value="">Solar power</option>
              </select>

              <label>Transmission:</label>

              <select class="form-control">
                <option value="">All</option>
                <option value="">Single-Speed</option>
                <option value="">Multi-Speed</option>
              </select>

              <label>Doors:</label>

              <select class="form-control">
                <option value="">All</option>
                <option value="">2</option>
                <option value="">4</option>
              </select>

              <label>Number of seats:</label>

              <select class="form-control">
                <option value="">All</option>
                <option value="">2</option>
                <option value="">4</option>
                <option value="">6</option>
              </select>

              <button type="submit" class="filled-button btn-block">Search</button>
            </form>
          </div>
        </div> -->


      <!-- start -->

      <div class="col-md-12">
        <div class="row">
          <?php
          $sql = 'SELECT * FROM products';
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            //Use a loop to iterate through categories 
            $p_id = $row['product_id'];
            $p_title = $row['product_title'];
            $p_price = $row['product_price'];
            $p_img = $row['product_image'];
            echo '<div class="col-lg-4 col-md-6">
                            <div class="product-item">
                            <a href="car-details.php"><img src="data:image;base64,' . base64_encode($p_img) . '" alt=""></a>
                            <div class="down-content">
                                    <a href="car-details.php">
                                    <h6> ₹ ' . $p_price . '</h6>
                                    </a>
                                    <h6>' . $p_title . '</h6>
                                    <a href="car-details.php?productid=' . $p_id . '"> <button type="button" style="padding:10px 100px 10px 100px;" class="btn btn-outline-success">View all Offers</button></a><br><br>
                                    <a href="login.php"> <button type="button" style="padding:10px 100px 10px 140px;" class="btn btn-outline-success">Buy Now</button></a><br><br>
                                </div>
                            </div>
                        </div>';
          }
          ?>
        </div>
      </div>
      <!-- end -->

      <div class="col-md-12">
        <ul class="pages">
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  <br>
  <?php include 'footer.php'; ?>
</body>

</html>