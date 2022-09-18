<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>

<body>
    <?php include_once("connection.php");
    $p_id = $_GET['pid'];
    $sql1 = "SELECT * FROM products JOIN brands ON brands.brand_id = products.product_brand WHERE product_id = $p_id";
    $result1 = mysqli_query($conn, $sql1);
    while ($row = mysqli_fetch_assoc($result1)) {
        //Use a loop to iterate through categories 
        $pid = $row['product_id'];
        $p_title = $row['product_title'];
        $p_brand = $row['product_brand'];
        $p_brand_name = $row['brand_title'];
        $p_desc = $row['product_desc'];
        $p_qty = $row['product_qty'];
        $p_price = $row['product_price'];
        $p_keywords = $row['product_keywords'];
        $p_img = $row['product_image'];
    ?>
        <div class="container-fluid">
            <div class="row">

                <?php include "./templates/sidebar.php"; ?>

                <div class="row">
                    <div class="col-10">
                        <h4> Edit / Update Product</h4>
                    </div>
                    <div class="container" style="margin-left: 50px;">
                        <div class="modal-body">
                            <form id="edit-product-form" enctype="multipart/form-data" action="edit-product1.php" method="POST">
                                <div class="row">
                                    <div class="col-9">
                                    <?php echo '<div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="product_name" value="' . $p_title . '" class="form-control" placeholder="Enter Product Name">
                                    </div>
                                </div>
                                <div class="col-9">
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <select class="form-control brand_list" name="brand_id">
                                    <option value="' . $p_brand . '">' . $p_brand_name . '</option>';

                                    $get_user = 'SELECT * FROM `brands`';
                                    $run_user = mysqli_query($conn, $get_user);
                                    while ($row = mysqli_fetch_array($run_user)) {
                                        $bid = $row['brand_id'];
                                        $b_name = $row['brand_title'];
                                        echo "<option value='$p_brand'> $b_name </option>";
                                    }

                                    echo ' </select>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <select class="form-control category_list" name="category_id">';


                                    $get_user = "select * from categories";
                                    $run_user = mysqli_query($conn, $get_user);
                                    while ($row = mysqli_fetch_array($run_user)) {
                                        $cid = $row['cat_id'];
                                        $c_name = $row['cat_title'];
                                        echo "<option value='$cid'> $c_name </option>";
                                    }

                                    echo '</select>
                                </div>
                            </div>
                                <div class="col-9">
                                    <div class="form-group">
                                        <label>Product Description</label>
                                        <textarea class="form-control" name="product_desc" placeholder="Enter product desc">' . $p_desc . '</textarea>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-group">
                                        <label>Product Qty</label>
                                        <input type="number" name="product_qty" value="' . $p_qty . '" class="form-control" placeholder="Enter Product Quantity">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <input type="number" name="product_price" value="' . $p_price . '" class="form-control" placeholder="Enter Product Price">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-group">
                                        <label>Product Keywords <small>(eg: Electric, Latest, Stylish)</small></label>
                                        <input type="text" name="product_keywords" value="' . $p_keywords . '" class="form-control" placeholder="Enter Product Keywords">
                                    </div>
                                </div>';

                                    if ($p_id < 8) {
                                        echo '<div class="col-9">
                                    <div class="form-group">
                                        <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
                                        <input type="file" name="product_image" class="form-control"><br>
                                        <img src="data:image;base64,' . base64_encode($p_img) . '" alt="database image" class="img-fluid" width="80">
                                    </div>
                                </div>';
                                    } else {
                                        echo '<div class="col-9">
                                    <div class="form-group">
                                        <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
                                        <input type="file" name="product_image" class="form-control"><br>
                                        <img src="images/' . isset($row['product_image']) . '" alt="Unable to load" class="img-fluid" width="80">
                                    </div>
                                </div>';
                                    }

                                    echo ' <div class="col-9">
                                <input type="hidden" name="pid" value="' . $pid . '">
                                <button type="submit" name="submit" class="btn btn-primary submit-edit-product">Update Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>';
                                } ?>


                                    <?php include_once("./templates/footer.php"); ?>
</body>