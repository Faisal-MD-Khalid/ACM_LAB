<?php
include 'connection.php';
if(isset($_POST['submit'])){
    $tid=$_POST['t_id'];
    $cid=$_POST['c_id'];
    $crank=$_POST['c_rank'];
    

    $sql="insert into `rank` (cRank,teamID,contestID) 
    values('$crank',' $tid','$cid')";
    $result=mysqli_query($con,$sql);
    if($result){
       // echo "Data inserted successfully";
       header('location:rankdisplay.php');
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
                <label>TeamID</label>
                <input type="number" class="form-control" placeholder="Enter  team id" name="t_id">
            </div>
            <div class="form-group">
                <label>Contest Id</label>
                <input type="number" class="form-control" placeholder="Enter contest id" name="c_id">
            </div>
            <div class="form-group">
                <label>Contest Rank</label>
                <input type="number" class="form-control" placeholder="Enter contest rank" name="c_rank">
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

</body>

</html>