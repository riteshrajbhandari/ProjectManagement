<?php
include('connection.php');

?>
<!DOCTYPE html>
<html>

<!-- <head>
    <title>Login Form Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="registration_form.css">
</head> -->

<head>
  <title>Register Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="login_style copy.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>

<!-- <body>
    <div class="container">
        <div class="myCard">
            <div class="row">
                <div class="col-md-6">
                    <div class="myLeftCtn">
                        <form class="myForm text-center" method="POST" action="register.php">
                            <header>Create new account</header>
                            <div class="form-group">
                                <input class="myInput" type="text" placeholder="First Name" id="firstname" name="firstname" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['firstname'];
                                                                                                                                    elseif (isset($_POST['clearRegistration'])) echo "";
                                                                                                                                    ?>" required>
                            </div>
                            <div class="form-group">
                                <input class="myInput" type="text" placeholder="Last Name" id="lastname" name="lastname" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['lastname'];
                                                                                                                                elseif (isset($_POST['clearRegistration'])) echo "";
                                                                                                                                ?>" required>
                            </div>
                            <div class="form-group">
                                <i class="fas fa-user"></i>
                                <input class="myInput" type="text" placeholder="Username" id="username" name="username" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['username'];
                                                                                                                                elseif (isset($_POST['clearRegistration'])) echo "";
                                                                                                                                ?>" required>

                                <span><?php
                                        $error = false;
                                        $errors = false;
                                        if (isset($_POST['submitRegistration'])) {
                                            $username = $_POST['username'];
                                            if (empty($username)) {
                                                echo '<br/>Please enter username';
                                                $errors = true;
                                            } elseif (strlen($username) < 6) {
                                                echo '<br/>Username must be at least 6 characters';
                                                $errors = true;
                                            } elseif (preg_match("/^(.*[0-9])/", $username)) {
                                                echo '<br/>Username cannot contain numbers';
                                                $errors = true;
                                            } else {
                                                $stid = oci_parse($connection, "SELECT username FROM users WHERE username = '$username'");
                                                oci_execute($stid);
                                                if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
                                                    // print_r($row['USERNAME']);
                                                    echo "This username is already in use. Please try a different username";
                                                    $errors = true;
                                                }
                                            }
                                        } ?></span>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-envelope"></i>
                                <input class="myInput" placeholder="Email" type="text" id="email" name="email" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['email'];
                                                                                                                        elseif (isset($_POST['clearRegistration'])) echo ""; ?>" required>

                                <span><?php
                                        if (isset($_POST['submitRegistration'])) {
                                            $email = $_POST['email'];
                                            if (empty($email)) {
                                                echo '<br/>Please enter email';
                                                $error = true;
                                            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                                echo '<br/>Invalid email';
                                                $errors = true;
                                            }
                                        } ?></span>
                            </div>
                            <div class="form-group">
                                <i class="fas fa-phone"></i>
                                <input class="myInput" placeholder="Phone number" type="tel" id="phonenumber" name="phonenumber" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['phonenumber']; ?>" required>
                            </div>
                            <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" type="password" id="password" name="password" placeholder="Password" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['password'];
                                                                                                                                    elseif (isset($_POST['clearRegistration'])) echo ""; ?>" required>

                                <span><?php
                                        if (isset($_POST['submitRegistration'])) {
                                            $password = $_POST['password'];
                                            if (empty($password)) {
                                                echo '<br/>Please enter password';
                                                $error = true;
                                            } elseif (!preg_match(('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\d]).+$/'), $password)) {
                                                echo '<br />Password must contain at least one of each:<ul>
                            <li>Uppercase letter</li>
                            <li>Lowercase letter</li>
                            <li>Number</li></ul>';
                                                $errors = true;
                                            }
                                        } ?></span>
                            </div>
                            <div class="form-group">
                                <input class="myInput" type="password" id="repeatpassword" name="repeatpassword" placeholder="Confirm Password">
                                <br><span>
                                    <?php if (isset($_POST['submitRegistration'])) {
                                        if (!($_POST['password'] == $_POST['repeatpassword'])) {echo "The passwords don't match";
                                        $errors = true;
                                        }
                                    }; ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input id="check_1" name="checkBox" type="checkbox" value="agree" <?php if (isset($_POST['submitRegistration'])) {
                                                                                                            if (isset($_POST['checkBox'])) {
                                                                                                        ?> checked=<?php echo 'true';
                                                                                                                } else {
                                                                                                                    echo 'false';
                                                                                                                }
                                                                                                            } ?>required><small> I read and agree to Terms & Conditions</small></input>
                                    <span><?php
                                            if (isset($_POST['submitRegistration'])) {
                                                if (!isset($_POST['checkBox'])) {
                                                    echo '<br/>Please agree to the conditions';
                                                    $error = true;
                                                }
                                            }
                                            ?></span>
                                    <div class="invalid-feedback">You must check the box.</div>
                                </label>
                            </div>

                            <input type="submit" class="butt" name="submitRegistration" value="CREATE ACCOUNT">

                            <?php


                            //         $query = "INSERT INTO users (username, email, password)
                            // VALUES ('$username', '$email', '$password')";

                            // echo $query;
                            // exit();
                            if (isset($_POST['submitRegistration'])) {
                                include('sanitization.php');
                                // $username = $_POST['username'];
                                // $email = $_POST['email'];
                                // $password = $_POST['password'];
                                if (!$error) {
                                    // $stid = oci_parse($connection, "INSERT INTO users (username, email, password)
                                    // VALUES ('$username', '$email', '$password')");
                                    // oci_execute($stid); // The row is committed and immediately visible to other users
                                    // header("Location: login.php");

                                    $username = clean_data($_POST['username']);
                                    $email = clean_data($_POST['email']);
                                    $password = hash('sha1', clean_data($_POST['password']), false);
                                    $date_today = date("d-M-y");
                                    $firstname = clean_data($_POST['firstname']);
                                    $lastname = clean_data($_POST['lastname']);
                                    $phone_no = clean_data($_POST['phonenumber']);

                                    if (!$errors) {
                                        $stid = oci_parse($connection, "INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL, PROFILE_PIC_URL, GENDER, PHONE_NUMBER)
                VALUES('$firstname', '$lastname', '$date_today', '$username', '$password', 'Customer', '$email', 'images/deli.jpg', 'M', $phone_no)");
                                        if (oci_execute($stid)) {
                                        };
                                        // echo "I am here";
                                        echo 'Account created. Go to <a href="login.php">Login</a>';
                                    }
                                }
                            }

                            ?>

                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="myRightCtn">
                        <div class="box">
                            <header>Hello World!</header>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam.</p>
                            <input type="button" class="butt_out" value="Learn More" />
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body> -->
<body>
  <div class="container">
    <div class="row p-0 ">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0 ">
        <div class="img-left-register d-none d-md-flex">
            <img class="w-100" src="./images/logo.png" alt="">
        </div>

        <div class="card-body ">
          <h4 class="title text-center ">
            Register to FreshMart
          </h4>
          <form class="form-box px-2" method="POST" action="register.php">
            <div class="form-input">
              <span><i class="fa fa-user"></i></span>
              <input type="text" name="firstname" placeholder="First Name" tabindex="10" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['firstname'];
              elseif (isset($_POST['clearRegistration'])) echo "";
              ?>" required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-user"></i></span>
              <input type="text" name="lastname" placeholder="Last Name" tabindex="10" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['lastname'];
              elseif (isset($_POST['clearRegistration'])) echo "";
              ?>" required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-user"></i></span>
              <input type="text" name="username" placeholder="Username" tabindex="10" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['username'];
              elseif (isset($_POST['clearRegistration'])) echo "";
              ?>" required>

              <span><?php
                $error = false;
                $errors = false;
                if (isset($_POST['submitRegistration'])) {
                    $username = $_POST['username'];
                    if (empty($username)) {
                        echo '<br/>Please enter username';
                        $errors = true;
                    } elseif (strlen($username) < 6) {
                        echo '<br/>Username must be at least 6 characters';
                        $errors = true;
                    } elseif (preg_match("/^(.*[0-9])/", $username)) {
                        echo '<br/>Username cannot contain numbers';
                        $errors = true;
                    } else {
                        $stid = oci_parse($connection, "SELECT username FROM users WHERE username = '$username'");
                        oci_execute($stid);
                        if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
                            // print_r($row['USERNAME']);
                            echo "This username is already in use. Please try a different username";
                            $errors = true;
                        }
                    }
                } ?></span>
            </div>
            <div class="form-input">
              <span><i class="fa fa-envelope-o"></i></span>
              <input type="email" name="email" placeholder="Email Address" tabindex="10" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['email'];
              elseif (isset($_POST['clearRegistration'])) echo ""; ?>" required>


<span><?php
if (isset($_POST['submitRegistration'])) {
$email = $_POST['email'];
if (empty($email)) {
echo '<br/>Please enter email';
$error = true;
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
echo '<br/>Invalid email';
$errors = true;
}
} ?></span>
            </div>
           
              <div class="form-input">
                <span><i class="fa fa-key"></i></span>
                <input type="password" name="password" placeholder="Password" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['password'];
                elseif (isset($_POST['clearRegistration'])) echo ""; ?>" required>

<span><?php
if (isset($_POST['submitRegistration'])) {
$password = $_POST['password'];
if (empty($password)) {
echo '<br/>Please enter password';
$error = true;
} elseif (!preg_match(('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\d]).+$/'), $password)) {
echo '<br />Password must contain at least one of each:<ul>
<li>Uppercase letter</li>
<li>Lowercase letter</li>
<li>Number</li></ul>';
$errors = true;
}
} ?></span>
              </div>
              <div class="form-input">
              <span><i class="fa fa-key"></i></span>
                <input  type="password"  name="repeatpassword" placeholder=" Confirm Password">
                <span>
                <?php if (isset($_POST['submitRegistration'])) {
                                        if (!($_POST['password'] == $_POST['repeatpassword'])) {echo "The passwords don't match";
                                        $errors = true;
                                        }
                                    }; ?>
                </span>
              </div>
              <div >
                  <div class="form-input">
                    <label for="date_of_birth">Date of birth</label>
                    <input type="date"  name="date_of_birth">
                  </div>
                  
                  <div class="row">
                      <div class="col-6">
                      <div class="form-input pb-2">
                    <label for="exampleFormControlSelect1">Gender</label>
                    <select class="form-input" id="exampleFormControlSelect1">
                      <option>Male</option>
                      <option>Female</option>
                      <option>Others</option>
                    </select>
                  </div>
                      </div>
                      <div class="col-6">
                      <div class="form-input pb-2">
                    <label for="exampleFormControlSelect1">User Type</label>
                    <select class="form-input" id="exampleFormControlSelect1">
                      <option>Customer</option>
                      <option>Trader</option>
                    </select>
                  </div>
                      </div>
                  </div>
                  

                  
             
                <input type="checkbox" name="checkBox" value="agree" <?php if (isset($_POST['submitRegistration'])) {
                  if (isset($_POST['checkBox'])) {
              ?> checked=<?php echo 'true';
                      } else {
                          echo 'false';
                      }
                  } ?>required><small> I read and agree to Terms & Conditions</small></input>
<span><?php
if (isset($_POST['submitRegistration'])) {
if (!isset($_POST['checkBox'])) {
echo '<br/>Please agree to the conditions';
$error = true;
}
}
?></span>
            </div>
           

            <div class="mb-2">
              <button type="submit" class="btn btn-block text-uppercase">
                Register
              </button>
            </div>
            <?php


            //         $query = "INSERT INTO users (username, email, password)
            // VALUES ('$username', '$email', '$password')";

            // echo $query;
            // exit();
            if (isset($_POST['submitRegistration'])) {
                include('sanitization.php');
                // $username = $_POST['username'];
                // $email = $_POST['email'];
                // $password = $_POST['password'];
                if (!$error) {
                    // $stid = oci_parse($connection, "INSERT INTO users (username, email, password)
                    // VALUES ('$username', '$email', '$password')");
                    // oci_execute($stid); // The row is committed and immediately visible to other users
                    // header("Location: login.php");

                    $username = clean_data($_POST['username']);
                    $email = clean_data($_POST['email']);
                    $password = hash('sha1', clean_data($_POST['password']), false);
                    $date_today = date("d-M-y");
                    $firstname = clean_data($_POST['firstname']);
                    $lastname = clean_data($_POST['lastname']);
                    $phone_no = clean_data($_POST['phonenumber']);

                    if (!$errors) {
                        $stid = oci_parse($connection, "INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL, PROFILE_PIC_URL, GENDER, PHONE_NUMBER)
VALUES('$firstname', '$lastname', '$date_today', '$username', '$password', 'Customer', '$email', 'images/deli.jpg', 'M', $phone_no)");
                        if (oci_execute($stid)) {
                        };
                        // echo "I am here";
                        echo 'Account created. Go to <a href="login.php">Login</a>';
                    }
                }
            }

            ?>
            

            <hr class="my-1">

            <div class="text-center mb-2">
              Already a Member 
              <a href="login.php" class="login-link">
                    login
              </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>