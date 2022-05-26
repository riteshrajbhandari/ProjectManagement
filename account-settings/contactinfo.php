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

<body style="background-color: #eee;">
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
                    <form class="navbar-nav justify-content-center d-flex nav-search" action="../search.php" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    </form>
                    <ul class="navbar-nav w-100 navbar-links" style="flex-wrap:wrap">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Browse By Category
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="../browse-by-category.php?category=Butchers">Butchers</a></li>
                                <li><a class="dropdown-item" href="../browse-by-category.php?category=Greengrocer">Greengrocer</a></li>
                                <li><a class="dropdown-item" href="../browse-by-category.php?category=Fishmonger">Fishmonger</a></li>
                                <li><a class="dropdown-item" href="../browse-by-category.php?category=Bakery">Bakery</a></li>
                                <li><a class="dropdown-item" href="../browse-by-category.php?category=Delicatessen">Delicatessen</a></li>
                            </ul>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link" href="../contact-us.php">Contact</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link" href="../cart.php"> <img src="../images/bag-heart.svg" alt="">
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
                                    echo '<li><a class="dropdown-item" href="./customersettings.php">Account Settings</a></li>';
                                    echo '<li><a class="dropdown-item" href="../logout.php">Logout</a></li>';
                                } else {
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
    <style>
        .nav-item .nav-link:hover {
            background-color: darkblue;

        }
    </style>
    <div class="row">
        <ul class="nav flex-column col-2 settings-links-col " style="background-color:cadetblue;">
            <li class="nav-item py-3">
                <a class="nav-link text-white lead" href="./customersettings.php" id="myprofile">My Profile</a>
            </li>
            <li class="nav-item py-3">
                <a class="nav-link text-white lead" href="./myorders.php" id="myorders">My Orders</a>
            </li>
            <li class="nav-item py-3">
                <a class="nav-link text-white lead" href="./contactinfo.php" id="contactinfo">Contact Information</a>
            </li>
            <li class="nav-item py-3">
                <a class="nav-link text-white lead active" aria-current="page" href="./changepass.php" id="changepass">Change Password</a>
            </li>
            <li class="nav-item py-3">
                <a class="nav-link text-white lead" href="./paymentinfo.php" id="paymentinfo">Payment Information</a>
            </li>
            <li class="nav-item py-3">
                <a class="nav-link text-white lead" href="./wishlist.php" id="wishlist">My Wishlist</a>
            </li>
        </ul>
        <div class="col settings-body">
            <ul class="nav nav-pills d-flex settings-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="./customersettings.php" id="myprofile">My Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./myorders.php" id="myorders">My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" id="contactinfo">Contact Information</a>
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

            <style>

            </style>
            <div class="row">
                <div class="col-lg-2">

                </div>
                <div class="col-lg-4">
                    <div class="contactinfo my-5 py-5 rounded" id="settings-body" style=" background-color:white;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                        <h1>Contact Information</h1><br>
                        <?php if (isset($_SESSION['user'])) {

                            $user_id = $_SESSION['user_id'];


                            $stid = oci_parse($connection, "SELECT * FROM users WHERE user_id = '$user_id'");
                            oci_execute($stid);

                            if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
                                $email = $row['EMAIL'];
                                // $gender = $row['GENDER'];
                                $dob = $row['DATE_OF_BIRTH'];
                            }
                        } else echo "session empty";
                        ?>
                        <form action="contactinfo.php" method="post">
                            <div class="row pb-5">
                                <div class="col-2 ">
                                    Email
                                </div>
                                <div class="col-8 pb-3">
                                    <input type="email" name="email" id="email" value="<?php echo $email; ?>" style="width: 300px;">
                                </div>
                            </div>
                            <div class="row pb-5 ">

                                <button type="submit" name="update-contact">Update</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['update-contact'])) {
                            $newemail = $_POST['email'];
                            $newgender = $_POST['gender'];

                            $stid1 = oci_parse($connection, "UPDATE users SET email='$newemail', gender='$newgender' WHERE user_id = '$user_id'");
                            if (oci_execute($stid1)) echo 'Record updated';
                        }
                        ?>
                    </div>
                </div>
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
                        <li><a href="../browse-by-category.php">Browse By Category</a></li>
                        <li><a href="../contact-us.php">Contact</a></li>
                        <li><a href="../login.php">Login</a></li>
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