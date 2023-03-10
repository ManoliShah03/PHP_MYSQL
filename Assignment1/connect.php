<?php
$dbname = "login";
$conn = mysqli_connect("localhost", "admin", "admin");
if (!$conn) {
    die("connection failed" . mysqli_connect_error());
} else {
    $username = $_POST["username"];
    $password = $_POST["password"];

   
    $createdb = "CREATE DATABASE IF NOT EXISTS login ";
    $conn->select_db($dbname);
    $createtable = "CREATE TABLE logininfo (
        username VARCHAR(30) NOT NULL,
        password1 VARCHAR(30) NOT NULL
        )" ;


    $inserttable = "INSERT INTO logininfo (username, password1)
    VALUES ('admin', 'admin')";

    // if (mysqli_query($conn, $createdb)){
    //     echo "Database created ";
    // }
    //     else{
    //         echo "Database not created";
    //     }

    // if (mysqli_query($conn, $createtable)){
    //     echo "Table created ";
    // }
    //     else{
    //         echo "Table not created";
    //     }


    // if (mysqli_query($conn, $inserttable)){
    //     echo "Data inserted";
    // }
    //     else{
    //         echo "Data not inserted";
    //     }


    

    $sql = "SELECT `username`,`password1` FROM logininfo ";
    $result = mysqli_query($conn, $sql);
    echo "<div>";
    $pass = false;
    $user = False;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["username"] == $username) {
                $user = true;
                if ($row["password1"] == $password) {
                    $pass = true;

                    break;
                }
            }
        }
    }
    if ($user) {
        if ($pass) {
            header("Location: form.html", true, 301);
        } else {
          
            echo "<p>Invalid Password</p> ";
        }
    } else {
        echo "<p>Invalid Username</p> ";
    }
    echo "</div>";
}


mysqli_close($conn);
