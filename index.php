<?php
include 'header.php';
include 'connection.php';
?>
<!-- Flex -->
<section id="flex">
  <div id="booking" class="section" style="height: 100vh;">
    <div class="section-center">
      <div class="container">
        <div class="row">
          <div class="col-md-7 col-md-push-5">
            <div class="booking-cta">
              <h1>Find your right car</h1>
              <p>Sell your car. Best price assured<br>Get the best resale price of your car
                You bought your car as an investment and it's only fair that you get a good resale value for it. But
                how? It’s not possible for one person to visit tens of hundreds of buyers and bargain over the price.
                At CarDekho Gaadi Store, we do that for you.</p>
            </div>
          </div>
          <div class="col-md-4 col-md-pull-7">
            <div class="booking-form">
              <form action="search.php" method="GET">
                <div class="form-group">
                  <span class="form-label">Select Budget</span>
                  <select name="cars" id="cars">
                    <option>Select</option>
                    <option value="volvo">0-2 Lakh</option>
                    <option value="saab">2-5 Lakh</option>
                    <option value="opel">5-8 Lakh</option>
                    <option value="audi">8-10 Lakh</option>
                    <option value="audi">10+ Lakh</option>
                  </select>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <span class="form-label">Enter Vehical Type</span>
                      <input class="form-control" type="text" name="query" placeholder="Vehical Type" required>
                    </div>
                  </div>
                </div>
                <div class="form-btn">
                  <button class="submit-btn">Search</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>
</section>
<!-- Flex End -->

<!-- Suggest car -->
<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Recommended Cars for you</h2>
          <a href="cars.php">view more <i class="fa fa-angle-right"></i></a>
        </div>
      </div>
      <?php
      $sql = 'SELECT * FROM products LIMIT 3';
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        //Use a loop to iterate through categories 
        $p_id = $row['product_id'];
        $p_title = $row['product_title'];
        $p_price = $row['product_price'];
        $p_img = $row['product_image'];
        // <a href="car-details.php"><img src="assets/images/Tesla_Model_3.jpg" alt=""></a>
        echo '<div class="col-lg-4 col-md-6">
                    <div class="product-item"> 
                    <a href="car-details.php?productid=' . $p_id . '">
                    <img src="data:image;base64,' . base64_encode($p_img) . '" alt=""></a>
                        <div class="down-content">
                            <a href="car-details.php?productid=' . $p_id . '">
                                <h4>' . $p_title . '</h4>
                            </a>
                            <h6> ₹ ' . $p_price . '</h6>
                            <a href="car-details.php?productid=' . $p_id . '"> <button type="button" style="padding:10px 100px 10px 100px;" class="btn btn-outline-success">View all Offers</button></a><br><br>
                            <a href="login.php"> <button type="button" style="padding:10px 100px 10px 140px;" class="btn btn-outline-success">Buy Now</button></a><br><br>
                        </div>
                    </div>
                </div>';
      }
      ?>

    </div>
  </div>

  <!-- Most searched cars -->
  <div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Most Searched Cars</h2>
            <a href="cars.php">view more <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        <?php
        $sql = 'SELECT * FROM products  WHERE product_keywords LIKE "%most search%" LIMIT 3';
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          //Use a loop to iterate through categories 
          $p_id = $row['product_id'];
          $p_title = $row['product_title'];
          $p_price = $row['product_price'];
          $p_img = $row['product_image'];
          // <a href="car-details.php"><img src="assets/images/Tesla_Model_3.jpg" alt=""></a>
          echo '<div class="col-lg-4 col-md-6">
                    <div class="product-item">
                        <a href="car-details.php?productid=' . $p_id . '"><img src="data:image;base64,' . base64_encode($p_img) . '" alt=""></a>
                        <div class="down-content">
                            <a href="car-details.php?productid=' . $p_id . '">
                                <h4>' . $p_title . '</h4>
                            </a>
                            <h6> ₹ ' . $p_price . '</h6>
                            <a href="car-details.php?productid=' . $p_id . '"> <button type="button" style="padding:10px 100px 10px 100px;" class="btn btn-outline-success">View all Offers</button></a><br><br>
                            <a href="login.php"> <button type="button" style="padding:10px 100px 10px 140px;" class="btn btn-outline-success">Buy Now</button></a><br><br>
                        </div>
                    </div>
                </div>';
        }
        ?>

      </div>
    </div>

    <!-- Popular Brands -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Our Popular Brands</h2>
            <a href="cars.php">view more <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        <div class="footer-brand-logos">

          <div class='container2'>
            <div>
              <img src='assets/images/maruti .jpg' class=' iconDetails'>
            </div>

          </div>

          <div class='container2'>
            <div>
              <img src='assets/images/hyundai.jpg' class='iconDetails'>
            </div>
          </div>

          <div class='container2'>
            <div>
              <img src='assets/images/tata.jpg' class='iconDetails'>
            </div>
          </div>

          <div class='container2'>
            <div>
              <img src='assets/images/mahindra.jpg' class='iconDetails'>
            </div>
          </div>
          <div class='container2'>
            <div>
              <img src='assets/images/kia.jpg' class='iconDetails'>
            </div>
          </div>

          <div class='container2'>
            <div>
              <img src='assets/images/mercedes-benz.jpg' class='iconDetails'>
            </div>
          </div>

          <div class='container2'>
            <div>
              <img src='assets/images/datsun.jpg' class='iconDetails'>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>
</div>


<!--  Latest cars -->
<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Latest Cars</h2>
          <a href="cars.php">view more <i class="fa fa-angle-right"></i></a>
        </div>
      </div>
      <?php
      $sql = 'SELECT * FROM products  WHERE product_keywords LIKE "%Latest%" LIMIT 3';
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        //Use a loop to iterate through categories 
        $p_id = $row['product_id'];
        $p_title = $row['product_title'];
        $p_price = $row['product_price'];
        $p_img = $row['product_image'];
        // <a href="car-details.php"><img src="assets/images/Tesla_Model_3.jpg" alt=""></a>
        echo '<div class="col-lg-4 col-md-6">
                    <div class="product-item">
                    <a href="car-details.php?productid=' . $p_id . '"><img src="data:image;base64,' . base64_encode($p_img) . '" alt=""></a>
                        <div class="down-content">
                            <a href="car-details.php?productid=' . $p_id . '">
                                <h4>' . $p_title . '</h4>
                            </a>
                            <h6> ₹ ' . $p_price . '</h6>
                            <a href="car-details.php?productid=' . $p_id . '"> <button type="button" style="padding:10px 100px 10px 100px;" class="btn btn-outline-success">View all Offers</button></a><br><br>
                            <a href="login.php"> <button type="button" style="padding:10px 100px 10px 140px;" class="btn btn-outline-success">Buy Now</button></a><br><br>
                        </div>
                    </div>
                </div>';
      }
      ?>
    </div>
  </div>
</div>


<!-- About us -->
<div class="best-features">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>About Us</h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="left-content">
          <p style="text-align: justify;">ESparxx brings a complete range of new electric cars in 2022 in India with prices. You can search cars by applying filters such as by price, by bodytype, by brand, by seating capacity & more. Also, stay updated with upcoming cars, electric cars in India, compare cars in your price range and
            stay tuned to the latest car news.
          </p>
          <ul class="featured-list">
            <li><a href="#">Check Valuation
                Enter car details & get best price instantly</a></li>
            <li><a href="#">Book Inspection
                Book your car’s inspection at your Home or at nearby Gaadi store & get best offer</a></li>
            <li><a href="#">Sell Car
                After deal, we transfer the amount instantly to your account & assist in RC transfer.</a></li>
            <li><a href="#">Sell Car
                After deal, we transfer the amount instantly to your account & assist in RC transfer.</a></li>
          </ul>
          <a href="about-us.php" class="filled-button">Read More</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="right-image">
          <img src="assets/images/about-1-570x350.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
</div>



<?php
include 'footer.php';
?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>
<script>
  $('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
  })
</script>
</body>