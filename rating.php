<?php
include 'connection.php';
if(isset($_POST['submit'])){
    $criteria=$_POST['criteria'];
    $rating=$_POST['rating'];
    $sid=$_POST['s_id'];
    

    $sql="insert into `rating` (rating,criteria,sID) 
    values(' $rating','$criteria','$sid')";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Data inserted successfully";
        header('location:ratingdisplay.php');
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
            <div class="form-group">
                <label>SID</label>
                <input type="number" class="form-control" placeholder="Enter the student ID" name="s_id">
            </div>
            <div class="form-group">
                <label>Criteria</label>
                <input type="number" class="form-control" placeholder="Enter name of criteria" name="criteria">
            </div>
            <div class="form-group">
                <label>Rating</label>
                <input type="number" class="form-control" placeholder="Enter the rating" name="rating">
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

</body>

</html>