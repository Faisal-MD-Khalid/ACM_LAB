<?php
include 'connection.php';
if(isset($_POST['submit'])){
    $sid=$_POST['s_id'];
    $cid=$_POST['c_id'];
    $tname=$_POST['t_name'];

    // Retrieve the TeamID based on the t_name input
    $team_query = "SELECT TeamID FROM `team` WHERE TeamName = '$tname'";
    $team_result = mysqli_query($con, $team_query);
    $team_row = mysqli_fetch_assoc($team_result);
    $tid = $team_row['TeamID'];

    $sql="INSERT INTO `memberof` (sID, contestID, teamID) 
          VALUES ('$sid', '$cid', '$tid')";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Data inserted successfully";
        header('location:memberofdisplay.php');
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
                <label>StudentID</label>
                <input type="number" class="form-control" placeholder="Enter  student id" name="s_id">
            </div>
            <div class="form-group">
                <label>Contest Id</label>
                <input type="number" class="form-control" placeholder="Enter contest id" name="c_id">
            </div>
            <div class="form-group">
                <label>Team Name</label>
                <input type="text" class="form-control" placeholder="Enter team name" name="t_name">
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

</body>

</html>