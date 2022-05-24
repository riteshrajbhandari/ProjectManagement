<?php
include('connection.php');

//for email verification

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';






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
    <div class="container">
        <div class="row py-2 ">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0 " style="box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px; border-radius:1em">
                <div class="img-left-register d-none d-md-flex">
                    <img class="w-100" src="./images/logo.png" alt="">
                </div>

                <div class="card-body py-1">
                    <h4 class="title text-center ">
                        Register to <span style="color:rgba(15, 255, 57, 1)">Fresh</span>Mart
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
                            <div class="form-input pb-0">
                                <label for="date_of_birth">Date of birth</label>
                                <input type="date" name="date_of_birth">
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

                            <div class="input_field pb-1">
                                <label for="image">Upload Image:<?php


                                                                // echo date('Y-m-d', strtotime($Date. ' + 10 days'));
                                                                ?> </label>
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <div id="imageUploadError"></div>
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
                                // $dob = date('d-M-y', strtotime($_POST['date_of_birth']));
                                $dob = date('Y-m-d', strtotime($_POST['date_of_birth']));
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
                                if ($check !== false) {
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
                                $image_name = 'images\\' . htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));

                                // if($dob>date('Y-m-d', strtotime())
                                // echo date('Y-m-d', strtotime( date('Y-m-d')-'18 years'));

                                // $date_today = date('Y-m-d');
                                $allowed_date =  date('Y-m-d', strtotime($date_today . ' - 18 years'));
                                if ($dob > $allowed_date) {
                                    $errors = true;
                                    echo "You need to be at least 18 years of age in order to register.";
                                } else $dob =  date('d-M-y', strtotime($dob));

                                $token = md5(uniqid(rand(), true));


                                if (!$errors) {
                                    $stid = oci_parse($connection, "INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL, PROFILE_PIC_URL, GENDER, DATE_OF_BIRTH, VERIFIED, TOKEN)
                                                                            VALUES('$firstname', '$lastname', '$date_today', '$username', '$password', '$user_type', '$email', '$image_name', '$gender', '$dob','0','$token')");
                                    if (oci_execute($stid)) {
                                        echo 'Account created. Please follow the link sent in your email to verify.'; //TODO:left to send email
                                    };

                                    //echo go click on the link in your mail 
                                    //verification link in their email, which they will click and the 
                                    //verification status will be updated in the users table and the 
                                    //user will be redirected back to login
                                }

                                //in login page once the user enters data check if it is verfied 
                                //(the boolean created earlier) if not verified, echo go click 
                                //on the link in your email to verify your account first





                                // $token = md5(uniqid(rand(), true));
if(!$errors){
                                $to = $email; 
                                $from = 'rritesh21@tbc.edu.np'; 
                                $fromName = 'Ritesh Rajbhandari'; 
                                 
                                $subject = "Fresh Mart Email Verification Link"; 
                                 
                                $htmlContent = ' 
                                <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <table style="border:1px solid grey;">
        <th style="padding:1em;background-color: #e3f2fd;">Verify your email address</th>
        <tr>
            <td style="background-color:#ffffff;padding:1em 2em;">

                Thanks for registering via your email '.$email.'! <br>Click on the button below to verify your email. <br><br>
                <a href="http://localhost:80/ProjectManagement/verify-email.php?token='.$token.'">
                    <button>
                        Verify
                    </button>
                </a>
                <br><br>
                Sincerely,<br>
                Fresh Mart
                <hr>
                <table>
                    <tr>
                        <td>
                            Fresh Mart | 1344 Cleckhuddersfax, United Kingdom
                            <img src="./images/logo(small).png" alt="" srcset="" style="height: 3em; padding-left:8em;">
                        </td>
                        <td>

                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
</body>

</html>';
                                    
                                // Set content-type header for sending HTML email 
                                $headers = "MIME-Version: 1.0" . "\r\n"; 
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
                                 
                                // Additional headers 
                                $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
                                // $headers .= 'Cc: welcome@example.com' . "\r\n"; 
                                // $headers .= 'Bcc: welcome2@example.com' . "\r\n"; 
                                 
                                // Send email 
                                if(mail($to, $subject, $htmlContent, $headers)){ 
                                    echo 'Email has sent successfully.'; 
                                }else{ 
                                   echo 'Email sending failed.'; 
                                }


}




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