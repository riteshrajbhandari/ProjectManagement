<?php
include('../connection.php');
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css%22%3E">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amita:wght@700&display=swap" rel="stylesheet">


    <!--Custom CSS-->
    <link rel=" stylesheet" href="../styles/style.css">
    <title>Your home to fresh products</title>
</head>

<body>
    <!-- NAVBAR -->
    <div class="container-nav flex-row">
        <nav class="navbar navbar-expand-md navbar-light navcolor">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="..\images\logo(small).png" alt="" width="40" class="d-inline-block align-text-bottom">
                    <div id="logo">
                        <div id="fresh">
                            <h1>Fresh</h1>
                        </div>
                        <div id="mart">
                            <h1>Mart</h1>
                        </div>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
                    <form class="navbar-nav justify-content-center d-flex nav-search" action="./search.php" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    </form>
                    <ul class="navbar-nav w-100 navbar-links" style="flex-wrap:wrap">
                        <li class="nav-item me-2">
                            <a class="nav-link" aria-current="" href="#">Browse by Category</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link" href="../contact-us.php">Contact</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link" href="../cart.php"> <img src="images/bag-heart.svg" alt="">
                                Cart</a>
                        </li>
                        <li class="nav-item me-2 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php
                                session_start();

                                if (isset($_SESSION['user'])) {
                                    echo 'Welcome, ' . $_SESSION['user'] . '!';
                                } else echo 'Login/Register';
                                ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                if (isset($_SESSION['user']) && $_SESSION['user_type'] == 'Trader') {
                                    echo '<li><a class="dropdown-item" href="./trader_index.php">Trader Settings</a></li>';
                                    echo '<li><a class="dropdown-item" href="../logout.php">Logout</a></li>';
                                } else {
                                    echo '<li><a class="dropdown-item" href="../login.php">Login</a></li>';
                                    echo '<li><a class="dropdown-item" href="../register.php">Register</a></li>';
                                }
                                ?>
                                <!-- <li><a class="dropdown-item" href="./account-settings/customersettings.php">Account Settings</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li> -->
                                <!-- <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- sidebar -->
    <div class="row ">
        <ul class="nav flex-column col-3 settings-links-col text-light">
            <li class="nav-item py-3">
                <a class="nav-link active" aria-current="page" href="trader_index.php" id="traderProfile">Add Shop</a>
            </li>
            <li class="nav-item py-3">
                <a class="nav-link" href="./addproduct.php" id="myorders">Add Product</a>
            </li>
            <li class="nav-item py-3">
                <a class="nav-link" href="./update.php" id="update">Update/delete</a>
            </li>
        </ul>
        <div class="col settings-body ">
            <ul class="nav nav-pills d-flex settings-tabs text-light">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" id="myprofile">Add Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./addproduct.php" id="myorders">Add Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./update.php" id="contactinfo">Update/delete</a>
                </li>
            </ul>




            <form action="addproduct.php" method="post" enctype="multipart/form-data">
                <div class="container contact">
                    <div class="row py-5 m-3" style="border:2px solid green; border-radius:1em; background-color:white">
                        <div class="col-md-3  p-3" id="side">
                            <div class="contact-info">
                                <!-- <h2>Fresh Mart Trader Profile</h2> -->
                                <div class="py-3">
                                    <h4>Product Name</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 ">
                            <div class="contact-form ">
                                <div class="form-group p-3">
                                    <label class="control-label col-sm-2" for="">Shop:</label>
                                    <div class="col-sm-10 py-3">
                                        <select class="form-control" name="shop-id" id="shop-id">
                                            <option value="">Select your shop to add the product to</option>
                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $stid = oci_parse($connection, "SELECT shop_id, shop_name FROM shop WHERE user_id = '$user_id'");
                                            oci_execute($stid);

                                            while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
                                                echo '<option value="' . $row['SHOP_ID'] . '">' . $row['SHOP_NAME'] . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group p-3">
                                    <label class="control-label col-sm-2" for="">Product Name:</label>
                                    <div class="col-sm-10 py-3">
                                        <input type="text" class="form-control" name="product-name" id="product-name" placeholder="Enter Product Name" required>
                                    </div>
                                </div>
                                <div class="form-group p-3">
                                    <label class="control-label col-sm-2" for="">Product Price:</label>
                                    <div class="col-sm-10 py-3">
                                        <input type="number" step="0.1" class="form-control" name="product-price" id="product-price" placeholder="Enter Product Price" required>
                                    </div>
                                </div>
                                <div class="form-group p-3">
                                    <label class="control-label col-sm-2" for="">Product Image:</label>
                                    <div class="col-sm-10 py-3">
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                        <div id="imageUploadError"></div>
                                    </div>
                                </div>
                                <div class="form-group p-3">
                                    <label class="control-label col-sm-2" for="">Product Stock:</label>
                                    <div class="col-sm-10 py-3">
                                        <input type="text" class="form-control" name="product-stock" id="product-stock" placeholder="Enter Product Stock" required>
                                    </div>
                                </div>

                                <div class="form-group p-3">
                                    <label class="control-label col-sm-2" for="">Product Availability:</label>
                                    <div class="col-sm-10 py-3">
                                        <select class="form-control" name="product-availibility" id="product-availibility">
                                            <option value=0>No</option>
                                            <option value=1>Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group p-3">
                                    <label class="control-label col-sm-2" for="">Short Description:</label>
                                    <div class="col-sm-10 py-3">
                                        <input type="text" class="form-control" name="short-description" id="short-description" placeholder="Enter short description" required>
                                    </div>
                                </div>
                                <div class="form-group p-3">
                                    <label class="control-label col-sm-2" for="">Product Description:</label>
                                    <div class="col-sm-10 py-3">
                                        <input type="text" class="form-control" name="description" id="description" placeholder="Enter Product description" required>
                                    </div>
                                </div>
                                <div class="form-group p-3">
                                    <label class="control-label col-sm-2" for="">Category:</label>
                                    <div class="col-sm-10 py-3">
                                        <select class="form-control" name="category-id" id="category-id">
                                            <option value="">Select the category for your product</option>
                                            <?php

                                            $stid = oci_parse($connection, "SELECT category_id, category_name FROM Category");
                                            oci_execute($stid);

                                            while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
                                                echo '<option value="' . $row['CATEGORY_ID'] . '">' . $row['CATEGORY_NAME'] . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="form-group p-3">
                                    <div class="col-sm-offset-2 col-sm-10 ">
                                        <button type="submit" name="add-product" class="btn btn-primary btn-block confirm-button ">Add Product</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <?php
            $error = false;
            if (isset($_POST['add-product'])) {



                $target_dir = "../images/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    //   echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    //   echo "File is not an image.";
                    $uploadOk = 0;
                    $errors = true;
                }
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    $errors = true;
                }
                $image_name = '.\images\\' . htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));







                if (!$_POST['shop-id'] == "")
                    $shop_id = $_POST['shop-id'];
                else {
                    echo 'you must choose a shop';
                    $error = true;
                }
                $user_id = $_SESSION['user_id'];

                $product_name = strtoupper($_POST['product-name']);
                $price = $_POST['product-price'];
                $stock = $_POST['product-stock'];
                $availability = $_POST['product-availibility'];
                $short_desc = $_POST['short-description'];
                $description = $_POST['description'];
                if (isset($_POST['category-id']) && !$_POST['category-id'] == "")
                    $category_id = $_POST['category-id'];
                else {
                    echo 'you must choose a category';
                    $error = true;
                }
                if (!$error) {
                    $stid = oci_parse($connection, "INSERT INTO product (
                    PRODUCT_NAME,
                    UNIT_PRICE,
                    STOCK,
                    AVAILABLE,
                    SHORT_DESCRIPTION,
                    PRODUCT_DESCRIPTION,
                    IMG_URL,
                    FK2_SHOP_ID,
                    FK3_CATEGORY_ID) VALUES ('$product_name','$price','$stock','$availability','$short_desc','$description','$image_name','$shop_id','$category_id')");
                    if(oci_execute($stid))echo 'Product added!';
                }
            }
            ?>
        </div>
    </div>



    <!-- Footer -->
    <div class="footer navcolor">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="./index.php">
                        <img id="footer" src="../images/logo.png" alt="" srcset="">
                    </a>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md my-auto justify-content-center" id="footer">
                    <ul id="footer">
                        <li><a href="../browse-by-category.php">Browse By Category</a></li>
                        <li><a href="../contact-us.php">Contact</a></li>
                        <li><a href="../login.php">Login</a></li>
                    </ul>
                </div>
                <div class="col-md-1"></div>

                <div class="col-md my-auto" id="footer">
                    <a href="../about.php">
                        <h2>About Us</h2>
                    </a>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta consectetur cum voluptatibus, optio sequi officia? Natus ex soluta maxime aliquid.</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="row" id="footer-icons">
                    <a href="http://"><img src="images\facebook.svg" alt="" srcset=""></a>
                    <a href="http://"><img src="images\instagram.svg" alt="" srcset=""></a>
                    <a href="http://"><img src="images\paypal.svg" alt="" srcset=""></a>
                    <a href="http://"><img src="images\envelope.svg" alt="" srcset=""></a>
                </div>
            </div>
        </div>
        <br>
    </div>

    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--Custom JS-->
    <script src="./scripts/javascript.js"></script>
</body>

</html>