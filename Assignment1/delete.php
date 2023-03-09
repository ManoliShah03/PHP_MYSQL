<?php
$hostName = "localhost";
$userName = "admin";
$password = "admin";
$databaseName = "user";
$tbname = "post";
$conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST["id"];
$delete_sql = "DELETE FROM `post` WHERE id='$id'";
$conn->query($delete_sql);

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
        margin: 8% 0% 0% 15%;
    }
    .center{
        font-weight:bold;
        font-size:20px;
    }
</style>
<body>

    <div class="col-sm-8">
        <center>
    <h2>Deleted Table Records </h2></center>
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
                } ?>
            </tbody>
        </table>
      <center class="center">  <a href="index.php">Back To Home</a></center>
    </div>

</body>

</html>