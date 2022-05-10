<!DOCTYPE html>
<html>
<head>
    <title>Login Form Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="registration_form.css">
</head>
<body> 
    <div class="container">
        <div class="myCard">
            <div class="row">
                <div class="col-md-6">
                    <div class="myLeftCtn"> 
                        <form class="myForm text-center method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?></form> ">
                            <header>Create new account</header>
                            <div class="form-group">
                                <i class="fas fa-user"></i>
                                <input class="myInput" type="text" placeholder="Username" id="username" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['username'];
                                elseif (isset($_POST['clearRegistration'])) echo "";
                                ?>" required> 

<span><?php
                    $error = false;
                    if (isset($_POST['submitRegistration'])) {
                        $username = $_POST['username'];
                        if (empty($username)) {
                            echo '<br/>Please enter username';
                            $error = true;
                        } elseif (strlen($username) < 6) {
                            echo '<br/>Username must be at least 6 characters';
                            $error = true;
                        } elseif (preg_match("/^(.*[0-9])/", $username)) {
                            echo '<br/>Username cannot contain numbers';
                            $error = true;
                        }
                    } ?></span>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-envelope"></i>
                                <input class="myInput" placeholder="Email" type="text" id="email" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['email'];
                                elseif (isset($_POST['clearRegistration'])) echo ""; ?>" required> 

                    <span><?php
                                        if (isset($_POST['submitRegistration'])) {
                                            $email = $_POST['email'];
                                            if (empty($email)) {
                                                echo '<br/>Please enter email';
                                                $error = true;
                                            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                                echo '<br/>Invalid email';
                                                $error = true;
                                            }
                    } ?></span>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" type="password" id="password" placeholder="Password" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['password'];
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
                            $error = true;
                        }
                    } ?></span>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input id="check_1" name="checkBox"  type="checkbox" value="agree" <?php if (isset($_POST['submitRegistration'])) {
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

                            <input type="submit" class="butt" value="CREATE ACCOUNT">
                            
                            <?php


//         $query = "INSERT INTO users (username, email, password)
// VALUES ('$username', '$email', '$password')";

// echo $query;
// exit();
if (isset($_POST['submitRegistration'])) {
    // $username = $_POST['username'];
    // $email = $_POST['email'];
    // $password = $_POST['password'];
    if (!$error) {
        $stid = oci_parse($connection, "INSERT INTO users (username, email, password)
        VALUES ('$username', '$email', '$password')");
        oci_execute($stid); // The row is committed and immediately visible to other users
        header("Location: login.php");
    }
}

?>

                        </form>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="myRightCtn">
                            <div class="box"><header>Hello World!</header>
                            
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                                sed do eiusmod tempor incididunt ut labore et dolore magna 
                                aliqua. Ut enim ad minim veniam.</p>
                                <input type="button" class="butt_out" value="Learn More"/>
                            </div>
                                
                    </div>
                </div>
            </div>
        </div>
</div>
      
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</body>
</html>

