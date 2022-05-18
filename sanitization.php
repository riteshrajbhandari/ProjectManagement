<?php
$error = false;
function clean_data($data)
{
    $data = htmlentities($data);
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}
$clean_username = clean_data($_POST['username']);
$clean_email = clean_data($_POST['email']);
$clean_password = clean_data(($_POST['password']));
?>