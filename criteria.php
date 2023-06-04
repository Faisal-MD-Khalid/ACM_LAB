<?php
include 'connection.php';
if(isset($_POST['submit'])){
   // $criteria=$_POST['criteria'];
    $weight=$_POST['weight'];
    $criterianame=$_POST['criteria_name'];
    

    $sql="insert into `criteria` (Weight,CriteriaName) 
    values('$weight','$criterianame')";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Data inserted successfully";
        header('location:criteriadisplay.php');
    }else {
        die(mysqli_error($con));
    }
}
?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" <title>Hello, world!</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <!--<div class="form-group">
                <label>Criteria</label>
                <input type="number" class="form-control" placeholder="Enter the criteria" name="criteria">
            </div>-->
            <div class="form-group">
                <label>Weight</label>
                <input type="number" class="form-control" placeholder="Enter weight of criteria" name="weight">
            </div>
            <div class="form-group">
                <label>Criteria Name</label>
                <input type="text" class="form-control" placeholder="Enter the online judge name" name="criteria_name">
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

</body>

</html>