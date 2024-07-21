<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <style>
    </style>
</head>

<body>
    <?php
    //to connect db and instert data to db
    $name = $_POST['name'];
    $pword = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "dbhcoe";

    //create connection
    $conn = mysqli_connect($servername, $username, $password, $db);
    //check connection
    if (isset($conn)) {
        echo 'database connection is successful';
    } else {
        echo 'database connection unsuccessful';
    }
    $sql = "INSERT INTO `form` (`Name`,`Password`,`Email`,`Gender`,`Country`)VALUES ('$name','$pword','$email','$gender','$country');";
    if (isset($result)) {
        echo 'Data inserted successfully';
    } else {
        echo 'Data insertion failed';
    }


    ?>
</body>