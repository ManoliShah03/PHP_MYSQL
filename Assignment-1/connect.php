<?php

$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "login";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $createdb = "CREATE DATABASE IF NOT EXISTS login";

    $conn->query($createdb);

    $sql = 'use login';

    $conn->query($sql) or die('not selected databases!!');

    $createtable = "CREATE TABLE IF NOT EXISTS logininfo (
        username VARCHAR(30) NOT NULL,
        password1 VARCHAR(30) NOT NULL
        )";

    $conn->query($createtable);

    $sql = "SELECT username, password1 FROM logininfo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo " ";} else {

        $inserttable = "INSERT INTO logininfo (username, password1)
    VALUES ('admin', 'admin')";
        $conn->query($inserttable);
    }

    $sql = "SELECT `username`,`password1` FROM logininfo ";
    $result = mysqli_query($conn, $sql);
    echo "<div>";
    $pass = false;
    $user = false;
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
            header("Location: show.php", true, 301);
        } else {

            echo "<p>Invalid Password</p> ";
        }
    } else {
        echo "<p>Invalid Username</p> ";
    }
    echo "</div>";
}

mysqli_close($conn);
