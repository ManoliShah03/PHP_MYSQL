
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
$updatetitle = $_POST["updatetitle"];
$updatedes = $_POST["updatedes"];
$id=$_POST["id"];
if($updatetitle!=null){
    $title_sql = "UPDATE post SET PostTitle='$updatetitle' WHERE id='$id'";
    $conn->query($title_sql);
}
if($updatedes!=null){
    $des_sql = "UPDATE post SET PostDescription='$updatedes' WHERE id='$id'";
    $conn->query($des_sql);
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
        margin: 8% 0% 0% 15%;
    }

    input[type=submit] {
        width: 50%;
      font-size: 20px;
      font-weight: bold;
        color: black;
        padding: 14px 20px;
        margin: 8px 0;
       
        border-radius: 4px;
        cursor: pointer;
    }

</style>

<body>

    <div class="col-sm-8">
    <center>
    <h2>Updated Table Records </h2></center>
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
                } 
                ?>
            </tbody>
        </table>

    </div>
    <center>
    <div class="form">
    <form id="myform" method="post" action="">
       <input type="submit" value="Delete Rows"
       onclick="document.forms['myform'].action='delete.html'">
</form>
    </div>
            </center>
</body>

</html>