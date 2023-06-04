<?php
include 'connection.php';
$pk=$_GET['updatepk'];
$sql="select * from `memberof` where pk=$pk";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$sid=$row['sID'];
$cid=$row['contestID'];
$tid=$row['teamID'];

if(isset($_POST['submit'])){
   // $id=$_POST['id'];
   $pk=$_GET['updatepk'];
   $sid=$_POST['sid'];
   $cid=$_POST['cid'];
   $tid=$_POST['tid'];
    

    $sql="update `memberof` set sID=$sid,contestID=$cid,teamID=$tid
     where pk=$pk";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Data updated successfully";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Student ID</label>
                <input type="number" class="form-control" placeholder="Enter the student id" name="sid"
                value=<?php echo $sid;?>> 
                
            </div>
            <div class="form-group">
                <label>Contest ID</label>
                <input type="number" class="form-control" placeholder="Enter the contest id" name="cid"
                value=<?php echo $cid;?>>
            </div>
            <div class="form-group">
                <label>Team ID</label>
                <input type="number" class="form-control" placeholder="Enter the team id" name="tid"
                value=<?php echo $tid;?>>
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>

</body>

</html>