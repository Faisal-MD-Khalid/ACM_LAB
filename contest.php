<?php
include 'connection.php';
if(isset($_POST['submit'])){
   // $id=$_POST['c_id'];
    $name=$_POST['c_name'];
    $date=$_POST['c_date'];
    

    $sql="insert into `iupc` (ContestName,Date) 
    values('$name','$date')";
    $result=mysqli_query($con,$sql);
    if($result){
       // echo "Data inserted successfully";
       header('location:contestdisplay.php');
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
                <label>ContestID</label>
                <input type="number" class="form-control" placeholder="Enter  contest id" name="c_id">
            </div>-->
            <div class="form-group">
                <label>Contest Name</label>
                <input type="text" class="form-control" placeholder="Enter contest name" name="c_name">
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="text" class="form-control" placeholder="Enter contest date" name="c_date">
            </div>
            

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

</body>

</html>