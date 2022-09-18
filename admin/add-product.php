<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<?php include_once("connection.php"); ?>
<div class="row">

    <?php include "./templates/sidebar.php"; ?>

    <div class="row">
        <div class="col-9">
            <h2> Add Product</h2>
        </div>
    </div>

    <div class="modal-content">
        <div class="modal-body" style="margin-left: 50px;">
            <form id="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <label>Brand Name</label>
                            <select class="form-control brand_list" name="brand_id">
                                <option value="6">Select Brand</option>

                                <?php
                                $get_user = "select * from brands";
                                $run_user = mysqli_query($conn, $get_user);
                                while ($row = mysqli_fetch_array($run_user)) {
                                    $bid = $row['brand_id'];
                                    $b_name = $row['brand_title'];
                                    echo "<option value='$bid'> $b_name </option>";
                                }
                                ?>
                                <!-- <option value="7">Nissan</option>
                                <option value="8">Tesla</option>
                                <option value="9">BMW</option>
                                <option value="10">Mistsubhishi</option>
                                <option value="11">Smart EV</option>
                                <option value="12">Ford</option>
                                <option value="13">Tata</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <label>Category Name</label>
                            <select class="form-control category_list" name="category_id">
                                <option value="">Select Category</option>
                                <?php
                                $get_user = "select * from categories";
                                $run_user = mysqli_query($conn, $get_user);
                                while ($row = mysqli_fetch_array($run_user)) {
                                    $cid = $row['cat_id'];
                                    $c_name = $row['cat_title'];
                                    echo "<option value='$cid'> $c_name </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea class="form-control" name="product_desc" placeholder="Enter product desc"></textarea>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <label>Product Qty</label>
                            <input type="number" name="product_qty" class="form-control" placeholder="Enter Product Quantity">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="number" name="product_price" class="form-control" placeholder="Enter Product Price">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <label>Product Keywords <small>(eg: Tesla, Tata, Electric)</small></label>
                            <input type="text" name="product_keywords" class="form-control" placeholder="Enter Product Keywords">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
                            <input type="file" name="product_image" class="form-control">
                        </div>
                    </div>
                    <input type="hidden" name="add_product" value="1">
                    <div class="col-9">
                        <button type="submit" name="submit" class="btn btn-primary add-product">Add Product</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
<?php include_once("./templates/footer.php"); ?>

<?php

if (isset($_POST['submit'])) {

    $p_id = $_POST['product_id'];
    session_start();
    $_SESSION['p_id'] = $p_id;
    $product_title = $_POST['product_name'];
    $brand_id = $_POST['brand_id'];
    $category_id = $_POST['category_id'];
    $product_desc = $_POST['product_desc'];
    $product_qty = $_POST['product_qty'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];

    // $targetDir = "images/";
    // $fileName = basename($_FILES["product_image"]["name"]);
    // $targetFilePath = $targetDir . $fileName;
    // $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    // move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFilePath);
    $product_image = $_FILES['product_image']['name'];
    $temp_name1 = $_FILES['product_image']['tmp_name'];
    move_uploaded_file($temp_name1, "images/" . $product_image);

    $inset_product = "INSERT INTO products VALUES('','$category_id','$brand_id','$product_title','$product_price','$product_qty','$product_desc','$product_image','$product_keywords')";

    $run_product = mysqli_query($conn, $inset_product);

    if ($run_product) {
        echo "<script>alert('Product Inserted Successfully') </script>";
        echo "<script>alert('If you want you can add more products') </script>";
        echo "<script>window.open('index.php') </script>";
    }
}
?>