<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./datecheck.php" method="post">
        <input type="date" name="date" id="date">
        <input type="submit" value="submit" name="submit">
    </form>
    <?php
    include('connection.php');
    $orgDate = $_POST['date'];
    echo $orgDate;
    echo '<br>';
    $newDate = date("d-M-y", strtotime($orgDate));
    echo "New date format is: " . $newDate . " (d-M-y)";
    if (isset($_POST['submit'])) {
        $stid = oci_parse($connection, "INSERT INTO review (review_date,RATING,FK1_PRODUCT_ID, FK2_USER_ID) VALUES('$newDate', 1.5, 1, 101)");
        oci_execute($stid);
    }
    ?>

    <?php
    $stid = oci_parse($connection,"SELECT review_date");
    oci_execute($stid);
    while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
        echo $row[''];
    }
    ?>
</body>

</html>