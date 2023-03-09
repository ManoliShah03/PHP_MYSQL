<?php
$conn = mysqli_connect("localhost", "admin", "admin");
$dbname = "user";
$tbname = "post";
$id = $_POST["id"];
$PostTitle = $_POST["PostTitle"];
$PostDescription = $_POST["PostDescription"];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {

// Create database
    $sql = "CREATE DATABASE user";
// if ($conn->query($sql) === TRUE) {
    //   echo "Database created successfully";
    // } else {
    //   echo "Error creating database: " . $conn->error;
    // }
}

$conn = mysqli_connect("localhost", "admin", "admin", $dbname);
//Create Table
$createtable = "CREATE TABLE post (
    id INT(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    PostTitle VARCHAR(100) NOT NULL,
    PostDescription VARCHAR(200) NOT NULL
)";

// if (mysqli_query($conn, $createtable)) {
//     echo "<p>Table created </p>";
// } else {
//     echo "<p>Error creating table: " . mysqli_error($conn)."</p>";
// }

//Inserting Data
$sql = "INSERT INTO post (id, PostTitle, PostDescription)
VALUES ($id,'$PostTitle','$PostDescription')";

if ($conn->query($sql) === true) {
    echo " ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <div class="form">
    <form id="myform" method="post" action="">
<input type="submit" value="Show Table"
       onclick="document.forms['myform'].action='show.php'">
<input type="submit" value="Update Table"
       onclick="document.forms['myform'].action='update.html'">
       <input type="submit" value="Delete Rows"
       onclick="document.forms['myform'].action='delete.html'">
</form>
    </div>

</body>

</html>