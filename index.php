<?php

    // Database information to connect with
    $serverName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName     = "gym_db";

    // Connect to db
    $conn = mysqli_connect($serverName, $dbUsername,$dbPassword, $dbName);

    if($conn){
        echo "konektovali smo se";
    }

    //Check if data are send
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <form action="" method="POST">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="login">
    </form>
</body>
</html>