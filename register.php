<?php
include('connection.php');

//for email verification

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';




function sendemail_verify($username, $email, $verify_token)
{
    $mail = new PHPMailer(true);
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'user@example.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;

    $mail->setFrom("sajidmiya285@gmail.com", $username);
    $mail->addAddress($email);

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Email verification from the Fresh Mart";

    $email_template = "
        <h2>You are registered with Fresh Mart</h2>
        <h5>Verify your email address to login</h5>
        <br><br>
        <a href='http://localhost/ProjectManagement/register.php/verify-email.php/token=$verify_token'>Click Me</a>";

    $email->Body = $email_template;
    $mail->send();
    echo 'Message has been sent';
}


// if (isset($_POST["submitRegistration"])) {
//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $verify_token = md5(rand());



//     $stid = oci_parse($connection, "SELECT email FROM users WHERE email = '$email'");
//     oci_execute($stid);
//     if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
//         $_SESSION['status'] = "Email already Exists";
//         header("Location:register.php");
//     } else {
//         $stid = oci_parse($connection, "INSERT INTO users(username,email,password,verify_token)  VALUES ($username,$email,$password,$verify_token)");
//         if (oci_execute($stid)) {

//         };
//     }






//     $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
//     $check_email_query_run = oci_parse($connection, $check_email_query);
//     if (mysqli_num_rows($check_email_query_run) > 0) {
//         $_SESSION['status'] = "Email already Exists";
//         header("Location:register.php");
//     } else {







//         $query = "INSERT INTO users(username,email,password,verify_token)  VALUES ($username,$email,$password,$verify_token)";
//         $query_run = mysqli_query($connection, $query);
//     }









//     if ($query_run) {
//         sendemail_verify("$username", "$email", "$verify_token");
//         $_SESSION['status'] = "Registration Successful. Please verify email address";
//         header("Location:register.php");
//     } else {
//         $_SESSION['status'] = "Registration Failed";
//         header("Location:register.php");
//     }
// }


?>
<!DOCTYPE html>
<html>


<head>
    <title>Register Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="login_style copy.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>


<body>
    <div class="container-fluid">
        <div class="row p-0 ">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0 ">
                <div class="img-left-register d-none d-md-flex">
                    <img class="w-100" src="./images/logo.png" alt="">
                </div>

                <div class="card-body ">
                    <h4 class="title text-center ">
                        Register to FreshMart
                    </h4>
                    <form class="form-box px-2" method="POST" action="register.php" enctype="multipart/form-data">
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

                        </div>

                        <?php
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
                                    echo 'This username is already in use. Please try a different username';
                                    $errors = true;
                                }
                            }
                        } ?>

                        <div class="form-input">
                            <span><i class="fa fa-envelope-o"></i></span>
                            <input type="email" name="email" placeholder="Email Address" tabindex="10" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['email'];
                                                                                                                elseif (isset($_POST['clearRegistration'])) echo ""; ?>" required>
                        </div>
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

                        <div class="form-input">
                            <span><i class="fa fa-key"></i></span>
                            <input type="password" name="password" placeholder="Password" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['password'];
                                                                                                    elseif (isset($_POST['clearRegistration'])) echo ""; ?>" required>
                        </div>

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

                        <div class="form-input">
                            <span><i class="fa fa-key"></i></span>
                            <input type="password" name="repeatpassword" placeholder=" Confirm Password">
                            <span>
                                <?php if (isset($_POST['submitRegistration'])) {
                                    if (!($_POST['password'] == $_POST['repeatpassword'])) {
                                        echo '<div class="form-input p-5">
                                        <span>The passwords don\'t match</span>
                                        </div>';
                                        $errors = true;
                                    }
                                }; ?>
                            </span>
                        </div>
                        <?php if (isset($_POST['submitRegistration'])) {
                            if (!($_POST['password'] == $_POST['repeatpassword'])) {
                                echo '<div class="form-input p-5">
                                        <span>The passwords don\'t match</span>
                                        </div>';
                                $errors = true;
                            }
                        }; ?>
                        <div>
                            <div class="form-input">
                                <label for="date_of_birth">Date of birth</label>
                                <input type="date" name="date_of_birth">
                            </div>
                            <div class="input_field">
                                <label for="image">Upload Image: </label>
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <div id="imageUploadError"></div>
                            </div>
                            <?php
                            
                            ?>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-input pb-2">
                                        <label for="exampleFormControlSelect1">Gender</label>
                                        <select class="form-input" id="exampleFormControlSelect1" name="gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input pb-2">
                                        <label for="exampleFormControlSelect1">User Type</label>
                                        <select class="form-input" id="exampleFormControlSelect1" name="user_type">
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
                                                                                        } ?>required><small> I read and agree to Terms & Conditions</small>
                            </input>
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
                            <button type="submit" class="btn btn-block text-uppercase" name="submitRegistration">
                                Register
                            </button>
                        </div>

                        <?php


                        if (isset($_POST['submitRegistration'])) {
                            include('sanitization.php');

                            if (!$error) {


                                $username = clean_data($_POST['username']);
                                $email = clean_data($_POST['email']);
                                $password = hash('sha1', clean_data($_POST['password']), false);
                                $date_today = date("d-M-y");
                                $firstname = clean_data($_POST['firstname']);
                                $lastname = clean_data($_POST['lastname']);
                                $user_type = $_POST['user_type'];
                                if ($_POST['gender'] == 'Male') {
                                    $gender = 'M';
                                } elseif ($_POST['gender'] == 'Female') {
                                    $gender = 'F';
                                } else $gender = 'O';
                                // $phone_no = clean_data($_POST['phonenumber']);


                                $target_dir = "images/";
                            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                            if($check !== false) {
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
                              $image_name = 'images\\'.htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));




                                if (!$errors) {
                                    $stid = oci_parse($connection, "INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL, PROFILE_PIC_URL, GENDER)
VALUES('$firstname', '$lastname', '$date_today', '$username', '$password', '$user_type', '$email', '$image_name', '$gender')");
                                    if (oci_execute($stid)) {
                                    };

                                    echo 'Account created.';
                                    //echo go click on the link in your mail 
                                    //verification link in their email, which they will click and the 
                                    //verification status will be updated in the users table and the 
                                    //user will be redirected back to login
                                }

                                //in login page once the user enters data check if it is verfied 
                                //(the boolean created earlier) if not verified, echo go click 
                                //on the link in your email to verify your account first




                                //     $verify_token = md5(rand());

                                //     $stid = oci_parse($connection, "SELECT email FROM users WHERE email = '$email'");
                                //     oci_execute($stid);
                                //     if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
                                //         // $_SESSION['status'] = "Email already Exists";
                                //         // header("Location:register.php");
                                //         echo "Email already Exists";
                                //     } else {
                                //         $stid = oci_parse($connection, "INSERT INTO users(username,email,password,verify_token)  VALUES ($username,$email,$password,$verify_token)");
                                //         if (oci_execute($stid)) {

                                //         };
                                //     }






                                //     $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
                                //     $check_email_query_run = oci_parse($connection, $check_email_query);
                                //     if (mysqli_num_rows($check_email_query_run) > 0) {
                                //         $_SESSION['status'] = "Email already Exists";
                                //         header("Location:register.php");
                                //     } else {







                                //         $query = "INSERT INTO users(username,email,password,verify_token)  VALUES ($username,$email,$password,$verify_token)";
                                //         $query_run = mysqli_query($connection, $query);
                                //     }









                                //     if ($query_run) {
                                //         sendemail_verify("$username", "$email", "$verify_token");
                                //         $_SESSION['status'] = "Registration Successful. Please verify email address";
                                //         header("Location:register.php");
                                //     } else {
                                //         $_SESSION['status'] = "Registration Failed";
                                //         header("Location:register.php");
                                //     }
                                // }










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
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>