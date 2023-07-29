<?php

    // Database information to connect with
    $serverName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName     = "gym_db";

    // Connect to db
    $conn = mysqli_connect($serverName, $dbUsername,$dbPassword, $dbName);

    if(!$conn){
        die("Connection failed");
    }

    //Check if data are send
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql ="SELECT admin_id, password FROM admins WHERE username = ? ";
        
        $run = $conn->prepare($sql );
        $run->bind_param("s", $username);
        $run->execute();
        $results = $run->get_result();

        // If its eq with 1 that means we have 1 result
        if($results->num_rows == 1){
            
            // we save fetching results in admin as associative array
            $admin = $results->fetch_assoc();
            if($admin['password'] === $password){
                echo "Password tacan";
            }else{
                echo "Password nije tacan";
            }

        }else{
            echo 'Admin ne postoji';
        }
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