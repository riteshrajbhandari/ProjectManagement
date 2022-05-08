<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <legend>
                Enter User Details
            </legend>
            <label for="username">Username: </label><br />
            <input type="text" id="username" name="username" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['username'];
                                                                    elseif (isset($_POST['clearRegistration'])) echo "";
                                                                    ?>" />
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
            <br />
            <label for="email">Email: </label><br />
            <input type="text" id="email" name="email" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['email'];
                                                                elseif (isset($_POST['clearRegistration'])) echo ""; ?>" />
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
            <br />
            <label for="password">Password: </label><br />
            <input type="password" id="password" name="password" value="<?php if (isset($_POST['submitRegistration'])) echo $_POST['password'];
                                                                        elseif (isset($_POST['clearRegistration'])) echo ""; ?>" />
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
            <br /><br />
            <input type="checkbox" name="checkBox" value="agree" <?php if (isset($_POST['submitRegistration'])) {
                                                                        if (isset($_POST['checkBox'])) {
                                                                    ?> checked=<?php echo 'true';
                                                                            } else {
                                                                                echo 'false';
                                                                            }
                                                                        } ?>>I agree to the Terms and Conditions
            <span><?php
                    if (isset($_POST['submitRegistration'])) {
                        if (!isset($_POST['checkBox'])) {
                            echo '<br/>Please agree to the conditions';
                            $error = true;
                        }
                    }
                    ?></span>
            <br />

            <input type="submit" value="Submit" name="submitRegistration" />
            <input type="submit" value="Clear" name="clearRegistration" />
        </fieldset>
    </form>
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
</body>

</html>