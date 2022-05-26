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

<body style="background-color: #eee;">
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
                    <form class="navbar-nav justify-content-center d-flex nav-search" action="./search.php" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    </form>
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
        <ul class="nav flex-column col-2 settings-links-col" style="background-color:cadetblue;">
            <li class="nav-item py-3">
                <a class="nav-link text-white lead" href="#" id="traderProfile">Dashboard</a>
            </li>
            <li class="nav-item py-3">
                <a class="nav-link text-white lead" href="trader_index.php" id="traderProfile">Add/Delete Shop</a>
            </li>
            <li class="nav-item py-3">
                <a class="nav-link  text-white lead active" aria-current="page" href="./addproduct.php" id="myorders">Add Product</a>
            </li>
            <li class="nav-item py-3">
                <a class="nav-link text-white lead" href="./update.php" id="update">Update/delete</a>
            </li>
        </ul>
        <div class="col settings-body ">
            <ul class="nav nav-pills d-flex settings-tabs text-light">
                <li class="nav-item ">
                    <a class="nav-link text-white lead" href="#" id="traderProfile">Dashboard</a>
                </li>
                <li class="nav-item text-white lead">
                    <a class="nav-link " href="#" id="myprofile">Add/Delete Shop</a>
                </li>
                <li class="nav-item text-white lead">
                    <a class="nav-link active" aria-current="page" href="./addproduct.php" id="myorders">Add Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white lead" href="./update.php" id="contactinfo">Update/delete</a>
                </li>
            </ul>

            <!-- shop details -->
            <div class="container p-5">

                <div class="card col-lg-3" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                    <div class="card-header">
                        <a href="#">
                            <img src="../images/butchers-knife-17307-1.jpg" alt="">
                        </a>
                    </div>
                </div>



                <div class=" row justify-content-md-center p-5 m-5 border">
                    <div class="col-md-auto text-center ">
                        <div class="card " style="width: 200px; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">


                            <head>Shop name</head>
                        </div>





                    </div>
                    <div class="col-md-auto text-center">
                        <div class="card" style="width: 200px; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">


                            <head>shop name</head>
                        </div>

                    </div>

                </div>
            </div>





            <!--Bootstrap JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="../scripts/javascript.js"></script>
            <script>

            </script>
</body>



</html>