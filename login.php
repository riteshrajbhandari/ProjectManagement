<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="POST" action="">
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
    </form>
    <?php if (isset($_POST['subLogin'])) {

        $username = $_POST['txtusername'];
        $password = $_POST['txtpassword'];

        $stid = oci_parse($connection, "SELECT username, first_name FROM users WHERE username = '$username' and password = '$password'");
        oci_execute($stid);

        if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
            $_SESSION['user'] = $row['FIRST_NAME'];
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