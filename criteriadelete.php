<?php
include 'connection.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    

    $sql="delete from `criteria` where CriteriaID=$id"; 
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Data inserted successfully";
        header('location:criteriadisplay.php');
    }else {
        die(mysqli_error($con));
    }
}
?>