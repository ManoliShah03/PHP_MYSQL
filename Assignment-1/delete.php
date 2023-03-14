<?php

include 'connect1.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `Post` where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:show.php');
        // echo "Deleted successfully";
    }else{
        die(mysqli_error($conn));
    }
}

?>