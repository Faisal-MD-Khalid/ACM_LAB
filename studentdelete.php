<?php
include 'connection.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    

    $sql="delete from `student` where SID=$id"; 
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Data inserted successfully";
        header('location:studentdisplay.php');
    }else {
        die(mysqli_error($con));
    }
}
?>