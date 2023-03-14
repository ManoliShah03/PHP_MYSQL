<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, "login");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//creating database if exist
$createdb = "CREATE DATABASE IF NOT EXISTS $dbname";

if ($conn->query($createdb) === true) {
    // echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$createtb = "CREATE TABLE IF NOT EXISTS Post (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_title VARCHAR(100),
    post_description TEXT)";

if ($conn->query($createtb) === true) {
    // echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
