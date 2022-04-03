<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Custom CSS-->
    <link rel="stylesheet" href="styles\style.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Bootstrap
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse w-100 flex-md-column" id="navbarCollapse">
                <form class="form-inline ml-auto">
                    <div class="input-group">
                        <input type="text" class="form-control border-dark" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">Search</button>
                        </div>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link py-1" href="#">Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-1" href="#">Welcome, 
                                    <?php
                                    //get username from db
                                    echo " USER";
                                    ?></a>
                            </li>
                        </ul>
                    </div>

                </form>
                <ul class="navbar-nav ml-auto small mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link py-1" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-1" href="#">Offers</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link py-1 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Browse by Category</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $no_of_categories = 5/* retrieve from db */;
                            for ($i = 0; $i < $no_of_categories; $i++)
                                echo '<li><a class="dropdown-item" href="#">'.
                                'Action '.$i.
                                '</a></li>';
                            ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link py-1" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-1" href="#">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-1" href="#">Sell on FreshMart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Bootstrap
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <?php
    echo 'Hello World!';
    for ($i = 0; $i < 10; $i++) {
        echo "<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime recusandae quo, sequi hic tempore eligendi similique veniam sunt aliquam debitis dolorem, quaerat maiores est nisi. Qui non labore laborum velit inventore delectus est, dignissimos, sapiente architecto nihil temporibus veritatis facilis culpa commodi, et ab impedit quos hic ea. Amet, tempore!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime recusandae quo, sequi hic tempore eligendi similique veniam sunt aliquam debitis dolorem, quaerat maiores est nisi. Qui non labore laborum velit inventore delectus est, dignissimos, sapiente architecto nihil temporibus veritatis facilis culpa commodi, et ab impedit quos hic ea. Amet, tempore!</p><br>";
    }
    ?>
    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--Custom JS-->
    <script src="scripts\javascript.js"></script>
</body>

</html>