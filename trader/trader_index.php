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

<body style="background-color:#eee">
    <!-- NAVBAR -->
    <div class="container-nav flex-row">
        <nav class="navbar navbar-expand-md navbar-light navcolor">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
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

                    <ul class="navbar-nav w-100 navbar-links" style="flex-wrap:wrap">

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

    <style>
        .nav-item .nav-link:hover {
            background-color: darkblue;

        }
    </style>
    <!-- sidebar -->
    <div class="row ">
        <ul class="nav flex-column col-2 settings-links-col text-light " style="background-color:cadetblue;">
            <li class="nav-item py-3">
                <a class="nav-link text-white lead" href="./shop.php    " id="traderProfile">Dashboard</a>
            </li>
            <li class="nav-item py-3">
                <a class="nav-link text-white lead active" aria-current="page" href="trader_index.php" id="traderProfile">Add/Delete Shop</a>
            </li>
            <li class="nav-item py-3">
                <a class="nav-link text-white lead" href="./addproduct.php" id="myorders">Add Product</a>
            </li>
            <li class="nav-item py-3">
                <a class="nav-link text-white lead" href="./update.php" id="contactinfo">Update/delete</a>
            </li>
        </ul>
        <div class="col settings-body ">
            <ul class="nav nav-pills d-flex settings-tabs text-light">
                <li class="nav-item ">
                    <a class="nav-link text-white lead" href="#" id="traderProfile">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" id="myprofile">Add/Delete Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./addproduct.php" id="myorders">Add Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./update.php" id="contactinfo">Update/delete</a>
                </li>
            </ul>

            <style>
                .add-shop {
                    border-radius: 2em;
                    background: white;
                    box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
                }
            </style>

            <form action="trader_index.php" method="post">
                <div class="container contact">
                    <div class="row py-5 m-3 add-shop">
                        <div class="col-md-3 p-3 m-0 ">
                            <div class="contact-info">

                                <div class="py-3">
                                    <h4>Add new Shop</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 ">
                            <div class="contact-form ">
                                <div class="form-group p-3">
                                    <label class="control-label col-sm-2" for="">Shop Name:</label>
                                    <div class="col-sm-10 py-3">
                                        <?php
                                        $user_id = $_SESSION['user_id'];
                                        $stid = oci_parse($connection, "SELECT COUNT(shop_id) FROM shop WHERE user_id = '$user_id'");
                                        oci_execute($stid);

                                        if (($row = oci_fetch_array($stid, OCI_ASSOC))) {
                                            $noofshops = $row['COUNT(SHOP_ID)'];
                                            if ($row['COUNT(SHOP_ID)'] >= 2) {
                                                echo 'You reached your max limit of shops.';
                                                echo '<input type="text" class="form-control" name="shop-name" id="shop-name" placeholder="Enter Shop Name" disabled>';
                                            } else echo '<input type="text" class="form-control" name="shop-name" id="shop-name" placeholder="Enter Shop Name">';;
                                        } ?>
                                        <!-- <input type="text" class="form-control" name="shop-name" id="shop-name" placeholder="Enter Shop Name"> -->
                                    </div>
                                </div>
                                <div class="form-group p-3">
                                    <div class="col-sm-offset-2 col-sm-10 ">
                                        <button type="submit" name="add-shop" class="btn btn-primary btn-block confirm-button ">Add Shop</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                        .del-shop {
                            border-radius: 2em;
                            background: white;
                            box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
                        }
                    </style>
                    <div class="row py-5 m-3 del-shop">
                        <div class="col-md-3 p-3">
                            <div class="contact-info">
                                <div class="py-3">
                                    <h4>Delete Shop</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 ">
                            <div class="contact-form ">
                                <div class="form-group p-3">
                                    <label class="control-label col-sm-2" for="">Shop Name:</label>
                                    <div class="col-sm-10 py-3">
                                        <select class="form-control" name="shop-id" id="shop-id">
                                            <option value="">Select the shop to delete</option>
                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $stid = oci_parse($connection, "SELECT shop_id, shop_name FROM shop WHERE user_id = '$user_id'");
                                            oci_execute($stid);

                                            while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
                                                echo '<option value="' . $row['SHOP_ID'] . '">' . $row['SHOP_NAME'] . '</option>';
                                            } ?>
                                        </select>
                                        <!-- <input type="text" class="form-control" name="shop-name" id="shop-name" placeholder="Enter Shop Name"> -->
                                    </div>
                                </div>
                                <div class="form-group p-3">
                                    <div class="col-sm-offset-2 col-sm-10 ">
                                        <button type="submit" name="delete-shop" class="btn btn-primary btn-block confirm-button ">Delete Shop</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
            if (isset($_POST['add-shop'])) {
                $shop_name = $_POST['shop-name'];
                $user_id = $_SESSION['user_id'];

                $stid = oci_parse($connection, "INSERT INTO shop (shop_name, user_id) VALUES ('$shop_name','$user_id')");
                if (oci_execute($stid)) echo 'Shop added';
            }
            if (isset($_POST['delete-shop'])) {
                $shop_id = $_POST['shop-id'];
                $user_id = $_SESSION['user_id'];
                $stid = oci_parse($connection, "DELETE FROM shop WHERE SHOP_ID = '$shop_id'");
                if (oci_execute($stid)) echo 'Shop deleted';
                // header("Location: trader_index.php");
            }
            ?>
        </div>
    </div>

    <!-- <div class="footer navcolor">
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
    </div> -->

    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--Custom JS-->
    <script src="./scripts/javascript.js"></script>
</body>

</html>