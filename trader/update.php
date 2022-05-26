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
        <!-- <ul class="nav flex-column col-3 settings-links-col text-light">
            <li class="nav-item py-3">
                <a class="nav-link active" aria-current="page" href="trader_index.php" id="traderProfile">Add/Delete Shop</a>
            </li>
            <li class="nav-item py-3">
                <a class="nav-link" href="./addproduct.php" id="myorders">Add Product</a>
            </li>
            <li class="nav-item py-3">
                <a class="nav-link" href="./update.php" id="contactinfo">Update/delete</a>
            </li>
        </ul> -->
        <div class="col pb-3">
            <ul class="nav nav-pills d-flex settings-tabs text-light " style="background-color:cadetblue;">
                <li class="nav-item">
                    <a class="nav-link text-white lead" href="./shop.php" id="traderProfile">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white lead
" href="./trader_index.php" id="myprofile">Add/Delete Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white lead
" href="./addproduct.php" id="myorders">Add Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white lead
 active" aria-current="page" href="#" id="contactinfo">Update/delete</a>
                </li>
            </ul>


            <div class="container py-2 my-5" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <td>Product Name</td>
                            <td>Unit Price</td>
                            <td>Stock</td>
                            <td>Availability</td>
                            <td>Short Description</td>
                            <td>Description</td>
                            <!-- <td>Image URL</td> -->
                            <td>Category ID</td>
                            <td>Delete</td>
                        </tr>
                    </thead>


                    <!-- Update cmd here -->


                    <?php
                    $user_id = $_SESSION['user_id'];
                    $stid = oci_parse(
                        $connection,
                        "SELECT p.* FROM product p, shop s, users u WHERE p.fk2_shop_id = s.shop_id and s.user_id = u.user_id and u.user_id = '$user_id'"
                    );
                    oci_execute($stid);

                    //MAKE A FORMMMMMMM!-!-!-!-!-!-!-!-!-!-!-!-!-!
                    //each row should be a form that when submitted, should update that specifc row having the specific product_id
                    ?>

                    <!-- <input type="text" name="product_name" id="product_name" value=""> -->
                    <style>
                        input {
                            size: 5 px;
                        }
                    </style>
                    <?php
                    $number_of_reviews = 0;
                    while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
                        echo '<form action="update_process.php?pid=' . $row['PRODUCT_ID'] . '" method="post" id="update_product">';
                        echo '<input type="text" hidden name="pid" value="' . $row['PRODUCT_ID'] . '">';
                        echo '<tr>';
                        echo '<td><input type="text" name="product_name" id="product_name" value="' . $row['PRODUCT_NAME'] . '" ></td>';
                        echo '<td><input type="number"  step="0.5" name="unit_price" id="product_name" value="' . $row['UNIT_PRICE'] . '" ></td>';
                        echo '<td><input type="text" name="stock" id="stock" value="' . $row['STOCK'] . '" size="5"></td>';
                        echo '<td><input type="text" name="available" id="available" value="' . $row['AVAILABLE'] . '" size="5"></td>';
                        echo '<td><input type="text" name="short_desc" id="short_desc" value="' . $row['SHORT_DESCRIPTION'] . '"></td>';
                        echo '<td><input type="text" name="description" id="description" value="' . $row['PRODUCT_DESCRIPTION'] . '"></td>';
                        echo '<td><input type="text" name="category_id" id="category_id" value="' . $row['FK3_CATEGORY_ID'] . '" size="5"></td>';
                        // echo '<td><a onclick="myFunc() => document.getElementById(\'update_product\').submit()"
                        // href="update_process.php?pid='.$row['PRODUCT_ID'].'" name="update">Update</a><td>';
                        echo '<td><a href="trader\update_process.php"><button type="submit" name="update_process">Update</button></a></td>';
                        echo '</form>';
                        echo '<form action="delete_product.php?pid=' . $row['PRODUCT_ID'] . '" method="post" id="delete_product">';

                        echo '<td><a href="trader\delete_product.php"><button type="submit" name="delete_process">Delete</button></a></td>';
                        echo '</tr>';
                        // echo '<input type="text" name="product_name" id="product_name" value="'.$row['IMG_URL'].'">';
                        // echo '<td>' . $row['PRODUCT_NAME'] . '</td>';
                        // echo '<td>' . $row['UNIT_PRICE'] . '</td>';
                        // echo '<td>' . $row['STOCK'] . '</td>';
                        // echo '<td>' . $row['AVAILABLE'] . '</td>';
                        // echo '<td>' . $row['SHORT_DESCRIPTION'] . '</td>';
                        // echo '<td>' . $row['PRODUCT_DESCRIPTION'] . '</td>';
                        // echo '<td>' . $row['IMG_URL'] . '</td>';
                        // echo '<td>' . $row['FK2_SHOP_ID'] . '</td>';
                        // echo '<td>' . $row['FK3_CATEGORY_ID'] . '</td>';
                        echo '</form>';
                    }

                    ?>
                </table>
            </div>

        </div>
    </div>





    <!-- Footer -->

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