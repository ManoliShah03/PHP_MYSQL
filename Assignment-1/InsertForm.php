<?php include 'connect1.php';

// Connect to database

if (isset($_POST['submit'])) {
    // Get form data
    // $id = $_POST["id"];
    $PostTitle = $_POST["PostTitle"];
    $PostDescription = $_POST["PostDescription"];

    $sql = "INSERT INTO Post (post_title, post_description) VALUES ('$PostTitle', '$PostDescription')";

    if ( $conn->query($sql) === true) {
        header("Location: show.php ");
        exit;
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}

