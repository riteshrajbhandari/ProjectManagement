<?php
include('../connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amita:wght@700&display=swap" rel="stylesheet">
    <!--Custom CSS-->
    <link rel="stylesheet" href="../styles/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container-nav flex-row">
        <nav class="navbar navbar-expand-md navbar-light navcolor">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../images/logo(small).png" alt="" width="40" class="d-inline-block align-text-bottom">
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
                    <form class="navbar-nav justify-content-center d-flex nav-search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>
                    <ul class="navbar-nav w-100 navbar-links" style="flex-wrap:wrap">
                        <li class="nav-item me-2">
                            <a class="nav-link" aria-current="" href="#">Browse by Category</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link" href="#"> <img src="../images/bag-heart.svg" alt="">
                                Cart</a>
                        </li>
                        <li class="nav-item me-2 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                                if (isset($_SESSION['user'])) {
                                    echo 'Welcome, ' . $_SESSION['user'] . '!';
                                } else echo 'Login/Register';
                                ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                                if (isset($_SESSION['user'])) {
                                    echo '<li><a class="dropdown-item" href="./account-settings/customersettings.php">Account Settings</a></li>';
                                    echo '<li><a class="dropdown-item" href="../logout.php">Logout</a></li>';
                                } else{
                                    echo '<li><a class="dropdown-item" href="../login.php">Login</a></li>';
                                    echo '<li><a class="dropdown-item" href="../register.php">Register</a></li>';
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <ul class="nav flex-column col-3 settings-links-col">
            <li class="nav-item">
                <a class="nav-link" href="./customersettings.php" id="myprofile">My Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" id="myorders">My Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./contactinfo.php" id="contactinfo">Contact Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./changepass.php" id="changepass">Change Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./paymentinfo.php" id="paymentinfo">Payment Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./wishlist.php" id="wishlist">My Wishlist</a>
            </li>
        </ul>
        <div class="col settings-body">
            <ul class="nav nav-pills d-flex settings-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="./customersettings.php" id="myprofile">My Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" id="myorders">My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contactinfo.php" id="contactinfo">Contact Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./changepass.php" id="changepass">Change Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./paymentinfo.php" id="paymentinfo">Payment Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./wishlist.php" id="wishlist">My Wishlist</a>
                </li>
            </ul>

            <div class="myorders" id="settings-body">
                <h1>My Orders</h1>
                <table>
                    <tr>
                        <th>Order</th>
                        <th>Order Placed</th>
                        <th>Qty</th>
                        <th>Collection Slot</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>


<?php

                    $stid = oci_parse($connection, "SELECT * FROM users U, orders O, payment PAY, wishlist W, 
                wishlist_product WP, product P 
                WHERE U.user_id = '$user_id' and 
                U.user_id = O.FK3_USER_ID and 
                U.user_id = PAY.FK1_USER_ID and 
                U.user_id = W.FK1_USER_ID and 
                W.wishlist_id = WP.wishlist_id and
                P.product_id = WP.product_id");
                oci_execute($stid);

                while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
                    // echo //order table
                }

?>







                    <?php
                    $listOfOrders = array("lorem ipsum", "dolor sit", "amet consectetur", "adipisicing elit", "Animi, ab");
                    $listOfDates = array(
                        "December 23, 2020",
                        "January 24, 2022",
                        "February 25, 2023",
                        "March 26, 2024",
                        "April 27, 2025",
                    );
                    $listOfCollSlot = array(
                        "August 31, 2029",
                        "October 02, 2030",
                        "November 03, 2031",
                        "December 04, 2032",
                        "January 05, 2034"
                    );
                    $listOfQty = array(1, 6, 5, 3, 3, 4);
                    for ($i = 0; $i < count($listOfOrders); $i++) {
                    ?>
                        <tr>
                            <td><?php echo $listOfOrders[$i]; ?></td>
                            <td><?php echo $listOfDates[$i]; ?></td>
                            <td><?php echo $listOfQty[$i]; ?></td>
                            <td><?php echo $listOfCollSlot[$i]; ?></td>
                            <td>ordered</td>
                            <td><a href="http://">Edit</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="footer navcolor">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="../index.php">
                        <img id="footer" src="../images/logo.png" alt="" srcset="">
                    </a>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md my-auto justify-content-center" id="footer">
                    <ul id="footer">
                        <li><a href="http://">Browse By Category</a></li>
                        <li><a href="http://">Contact</a></li>
                        <li><a href="http://">Login</a></li>
                    </ul>
                </div>
                <div class="col-md-1"></div>

                <div class="col-md my-auto" id="footer">
                    <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta consectetur cum voluptatibus, optio sequi officia? Natus ex soluta maxime aliquid.</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="row" id="footer-icons">
                    <a href="http://"><img src="../images/facebook.svg" alt="" srcset=""></a>
                    <a href="http://"><img src="../images/instagram.svg" alt="" srcset=""></a>
                    <a href="http://"><img src="../images/paypal.svg" alt="" srcset=""></a>
                    <a href="http://"><img src="../images/envelope.svg" alt="" srcset=""></a>
                </div>
            </div>
        </div>
        <br>
    </div>

    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../scripts/javascript.js"></script>
    <script>

    </script>
</body>

</html>