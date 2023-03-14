<?php
include 'connect1.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
  <center>      <button class="btn btn-primary my-5"><a href="insert.html" class="text-light">Add User</a>
</button></center>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Post Title</th>
      <th scope="col">Post Description</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

<?php
$sql="Select * from `Post`";
$result=mysqli_query($conn,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $post_title=$row['post_title'];
        $post_description=$row['post_description'];
        echo '
        <tr>
        <th scope="row">' .$id.'</th>
        <td>'.$post_title.'</td>
        <td>'.$post_description.'</td>
        <td>
    <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
    <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
  </tbody>
</td>
        </tr>';
    }
}
?>

</table>
    </div>
</body>
</html>