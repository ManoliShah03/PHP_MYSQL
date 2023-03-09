<?php
$hostName = "localhost";
$userName = "admin";
$password = "admin";
$databaseName = "user";
$tbname = "post";
$id = $_POST["id"];
$PostTitle = $_POST["PostTitle"];
$PostDescription = $_POST["PostDescription"];
$conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO post (id, PostTitle, PostDescription)
VALUES ($id,'$PostTitle','$PostDescription')";

if ($conn->query($sql) === true) {
    echo " ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$db = $conn;
$columns = ['id', 'PostTitle', 'PostDescription'];
$fetchData = fetch_data($db, $tbname, $columns);
function fetch_data($db, $tbname, $columns)
{
    $columnName = implode(", ", $columns);
    $query = "SELECT " . $columnName . " FROM $tbname" . " ORDER BY id";
    $result = $db->query($query);
    if ($result == true) {
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $msg = $row;
        } else {
            $msg = "No Data Found";
        }
    } else {
        $msg = mysqli_error($db);
    }

    return $msg;
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>

    .col-sm-8 {
        margin: 3% 0% 0% 15%;
    }

    .form{
        font-size:30px;
        text-align:center;
        padding:10px 10px 10px 20px;
    }
    .btn{
        padding:0px 10px 0px 10px;
        display:flex;
        margin:0px 10px 0px 200px;
    }


    input[type=submit] {
        width: 35%;
      font-size: 20px;
      font-weight: bold;
        color: black;
        padding: 0px 0px;
 
        margin: 0% 0% 0% 2%;
        border-radius: 4px;
        cursor: pointer;
    }

</style>

<body>

    <div class="col-sm-8">
    <center>
    <h2>Post Table Records </h2></center>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Post Title</th>
                    <th>Post Description</th>
            </thead>
            <tbody>
                <?php
if (is_array($fetchData)) {
    foreach ($fetchData as $data) {
        ?>
                        <tr>
                            <td>
                                <?php echo $data['id']; ?>
                            </td>
                            <td>
                                <?php echo $data['PostTitle'] ?? ''; ?>
                            </td>
                            <td>
                                <?php echo $data['PostDescription'] ?? ''; ?>
                            </td>
                        </tr>
                        <?php

    }
}?>
            </tbody>
        </table>

    <div class="form">
    <form id="myform" method="post" action="" >
        <div class="btn">
    <input type="submit" value="Update Table" 
       onclick="document.forms['myform'].action='update.html'">
       <input type="submit" value="Delete Rows"
       onclick="document.forms['myform'].action='delete.html'">
</div>
    </form>
    </div>
    </div>
</body>

</html>