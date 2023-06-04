<?php
include 'connection.php';
if(isset($_GET['deletepk'])){
    $pk=$_GET['deletepk'];
    

    $sql="delete from `rating` where pk=$pk"; 
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Data inserted successfully";
        header('location:ratingdisplay.php');
    }else {
        die(mysqli_error($con));
    }
}
?>