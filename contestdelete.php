<?php
include 'connection.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    

    $sql="delete from `iupc` where ContestID=$id"; 
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Data inserted successfully";
        header('location:contestdisplay.php');
    }else {
        die(mysqli_error($con));
    }
}
?>