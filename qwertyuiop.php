<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include('connection.php');

    // $username = $_POST['txtusername'];
    $username = "riteshrajbh";
    // $password = $_POST['txtpassword'];
    $password = "HelloWorld";
    $stid = oci_parse($connection, "SELECT username FROM users WHERE username = '$username' and password = '$password'");
    oci_execute($stid);

    echo "<table border='1'>\n";
    if ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
        foreach ($row as $item) {
            echo ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
        }
    }
    ?>
</body>

</html>