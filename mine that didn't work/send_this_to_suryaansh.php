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


?><htmlstuff>
    <registerstuff></registerstuff>
    <?php


    //data inserted  into user table                                  
    echo 'Account created.';
    //echo go click on the link in your mail 
    //verification link in their email, which they will click and the 
    //verification status will be updated in the users table and the 
    //user will be redirected back to login


    //in login page once the user enters data check if it is verfied 
    //(the boolean created earlier) if not verified, echo go click 
    //on the link in your email to verify your account first




    $verify_token = md5(rand());

    $stid = oci_parse($connection, "SELECT email FROM users WHERE email = '$email'");
    oci_execute($stid);
    if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
        // $_SESSION['status'] = "Email already Exists";
        // header("Location:register.php");
        echo "Email already Exists";
    } else {
        $stid = oci_parse($connection, "INSERT INTO users(username,email,password,verify_token)  VALUES ($username,$email,$password,$verify_token)");
        if (oci_execute($stid)) {
        };
    }


    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run = oci_parse($connection, $check_email_query);
    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['status'] = "Email already Exists";
        header("Location:register.php");
    } else {

        $query = "INSERT INTO users(username,email,password,verify_token)  VALUES ($username,$email,$password,$verify_token)";
        $query_run = mysqli_query($connection, $query);
    }





    if ($query_run) {
        sendemail_verify("$username", "$email", "$verify_token");
        $_SESSION['status'] = "Registration Successful. Please verify email address";
        header("Location:register.php");
    } else {
        $_SESSION['status'] = "Registration Failed";
        header("Location:register.php");
    }
    ?>
</htmlstuff>