<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php");

include 'connection.php';
$insert = false;
$update = false;
$delete = false;

if (isset($_GET['delete'])) {
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `products` WHERE `product_id` = $sno";
  $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['productEdit'])) {
    //update 
    $p_title = $_POST['e_product_title'];
    $p_brand = $_POST['e_product_brand'];
    $p_cat = $_POST['e_product_cat'];
    $p_desc = $_POST['e_product_desc'];
    $p_qauntity = $_POST['e_product_qty'];
    $p_price = $_POST['e_product_price'];
    $p_keywords = $_POST['e_product_keywords'];
    $p_img = $_POST['e_product_image'];

    $sql = "UPDATE `products` SET `product_cat`='$p_cat',`product_brand`='$p_brand',`product_title`='$p_title',`product_price`='$p_price',`product_qty`='$p_qauntity',`product_desc`='$p_desc',`product_image`='$p_img',`product_keywords`='$p_keywords'  WHERE `products`.`sno` = $sno";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $update = true;
    } else {

      echo "Can't insert the record ";
    }
  } else {

    $p_title = $_POST['product_name'];
    $p_brand = $_POST['brand_id'];
    $p_cat = $_POST['category_id'];
    $p_desc = $_POST['product_desc'];
    $p_qauntity = $_POST['product_qty'];
    $p_price = $_POST['product_price'];
    $p_keywords = $_POST['product_keywords'];
    $p_img = $_POST['product_image'];

    //sql insert query to be execute
    $sql = "INSERT INTO `products`(`product_cat`, `product_brand`, `product_title`, `product_price`, `product_qty`, `product_desc`, `product_image`, `product_keywords`) VALUES ('$p_cat', '$p_brand', '$p_title', '$p_price', '$p_qauntity', '$p_desc', '$p_img', '$p_keywords')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      // echo "Record inserted successfully";
      $insert = true;
    } else {

      echo "Can't insert the record ";
    }
  }
}

?>
<?php
if ($insert) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong> Your note has been added successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>
<?php
if ($delete) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong> Your note has been deleted successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>
<?php
if ($update) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong> Your note has been updates successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>
<div class="container-fluid">
  <div class="row">

    <?php include "./templates/sidebar.php"; ?>

    <div class="row">
      <div class="col-10">
        <h2>Product List</h2>
      </div>
      <div class="col-2">
        <a href="add-product.php" class="btn btn-primary btn-sm">Add Product</a>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="product_list">
          <?php
          $sql = 'SELECT * FROM products WHERE product_id < 8';
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $sno++;
            //Use a loop to iterate through categories 
            $p_id = $row['product_id'];
            $p_title = $row['product_title'];
            $p_img = $row['product_image'];
            $p_price = $row['product_price'];
            $p_qauntity = $row['product_qty'];
            $p_cat = $row['product_cat'];
            $p_brand = $row['product_brand'];

            // <a href="car-details.php"><img src="assets/images/Tesla_Model_3.jpg" alt=""></a>
            echo '<tr>
                        <td>' . $sno . '</td>
                        <td>' . $p_title . '</td>
                        <td><img src="data:image;base64,' . base64_encode($p_img) . '" alt="car image" height="150" width="150">
                        </td>
                        <td>' . $p_price . '</td>
                        <td>' . $p_qauntity . '</td>
                        <td>' . $p_cat . '</td>
                        <td>' . $p_brand . '</td>
                        <td><a href="edit-product.php?pid=' . $p_id . '"><button class="edit btn btn-sm btn-primary"> Edit</button></a> 
                        <button class="delete btn btn-sm btn-primary" id=d' . $row['product_id'] . '>Delete</button> 
                        </tr>';
          }
          ?>
          <?php
          $sql = 'SELECT * FROM products WHERE product_id > 8';
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $sno++;
            //Use a loop to iterate through categories 
            $p_id = $row['product_id'];
            $p_title = $row['product_title'];
            $p_img = $row['product_image'];
            $p_price = $row['product_price'];
            $p_qauntity = $row['product_qty'];
            $p_cat = $row['product_cat'];
            $p_brand = $row['product_brand'];

            // <a href="car-details.php"><img src="assets/images/Tesla_Model_3.jpg" alt=""></a>
            // <img src="data:image;base64,' . base64_encode($p_img) . '" alt="car image" height="150" width="150">
            echo '<tr>
                        <td>' . $sno . '</td>
                        <td>' . $p_title . '</td>
                        <td><img src="images/' . $row['product_image'] . '" alt="car image" height="150" width="150"></td>
                        <td>' . $p_price . '</td>
                        <td>' . $p_qauntity . '</td>
                        <td>' . $p_cat . '</td>
                        <td>' . $p_brand . '</td>
                        <td><a href="edit-product.php?pid=' . $p_id . '"><button class="edit btn btn-sm btn-primary"> Edit</button></a>  
                        <button class="delete btn btn-sm btn-primary" id=d' . $row['product_id'] . '>Delete</button> 
                        </tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
    </main>
  </div>
</div>

<!-- Edit Product Modal end -->

<?php include_once("./templates/footer.php"); ?>
<script type="text/javascript" src="admin/js/products.js"></script>
<script>
  edits = document.getElementsByClassName('edit');
  Array.from(edits).forEach((element) => {
    element.addEventListener("click", (e) => {
      console.log("edit ");
      tr = e.target.parentNode.parentNode;
      title = tr.getElementsByTagName("td")[0].innerText;
      description = tr.getElementsByTagName("td")[1].innerText;
      console.log(product_title, brand_id, product_cat, product_desc, product_qty, product_price, product_keywords, product_image);
      e_product_name = product_title;
      e_brand_id = brand_id;
      e_category_id = product_cat;
      e_product_desc = product_desc;
      e_product_qty = product_qty;
      e_product_price = product_price;
      e_product_keywords = product_keywords;
      e_product_image = product_image;
      snoEdit.value = e.target.id;
      console.log(e.target.id);
      $('#edit_product_modal').modal('toggle');
    })
  })

  deletes = document.getElementsByClassName('delete');
  Array.from(deletes).forEach((element) => {
    element.addEventListener("click", (e) => {
      console.log("edit ");
      sno = e.target.id.substr(1);

      if (confirm("Are you sure you want to delete this note!")) {
        console.log("yes");
        window.location = `products.php?delete=${sno}`;
        // TODO: Create a form and use post request to submit a form
      } else {
        console.log("no");
      }
    })
  })
</script>