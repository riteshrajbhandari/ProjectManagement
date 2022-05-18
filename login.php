<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!-- <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head> -->

<head>
  <title>Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="login_style copy.css ">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>

<body>
  <div class="container py-5 my-5">

    <div class="row ">

      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
        <div class="img-left d-none d-md-flex">
          <img class="w-100" src="./images/logo.png" alt="">
        </div>

        <div class="card-body">
          <h4 class="title text-center mt-4 py-5">
            Login to FreshMart
          </h4>
          <form class="form-box px-3" method="POST" action="./login.php">
            <div class="form-input">
              <span><i class="fa fa-user"></i></span>
              <input type="username" name="txtusername" placeholder="Username" tabindex="10" required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input type="password" name="txtpassword" placeholder="Password" required>
            </div>
            <!-- <div class="text-right">
          <a href="#" class="forget-link">Forget Password?</a>
        </div> -->



            <div class="mb-3">
              <button type="submit" name="subLogin" class="btn btn-block text-uppercase">
                Login
              </button>
            </div>




            <hr class="my-4">

            <div class="text-center mb-2">
              Don't have an account?
              <a href="register.php" class="register-link">
                Register here
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- <form method="POST" action="./login.php">
        <fieldset>
            <legend>
                Login
            </legend>
            <label for="username">Username: </label>
            <input type="text" name="txtusername" />
            <label for="password">Password: </label>
            <input type="password" name="txtpassword" />
            <input type="submit" name="subLogin" value="submit" />
        </fieldset>
    </form> -->
  <?php if (isset($_POST['subLogin'])) {

    $username = $_POST['txtusername'];
    $password = hash('sha1', $_POST['txtpassword'], false);
    // echo $password.'<br>';
    // $password = $_POST['txtpassword'];

    $stid = oci_parse($connection, "SELECT user_id, username, first_name, password, USER_TYPE FROM users WHERE username = '$username' and password = '$password'");
    oci_execute($stid);

    if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
      $_SESSION['user'] = $row['FIRST_NAME'];
      $_SESSION['user_id'] = $row['USER_ID'];
      $_SESSION['user_type'] = $row['USER_TYPE'];

      if ($row['USER_TYPE'] == 'Trader') {
        header("Location: ./trader/trader_index.php");
      } else
        header("Location: index.php");
      // foreach ($row as $item) {
      //     echo $row[0];
      //     TODO: how to get just the first_name
      //     $_SESSION['user']=$item;
      //     header("Location: index.php");
      //     echo ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
      // }
    } else
      echo 'username and password combination incorrect. New user? <a href="register.php">Register now</a>';
  }
  ?>


</body>

</html>