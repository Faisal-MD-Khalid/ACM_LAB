<?php
include 'connection.php';
$pk=$_GET['updatepk'];
$sql="select * from `rating` where pk=$pk";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$rating=$row['rating'];
$critera=$row['criteria'];
$sid=$row['sID'];

if(isset($_POST['submit'])){
   // $id=$_POST['id'];
   $pk=$_GET['updatepk'];
   $rating=$_POST['rating'];
   $criteria=$_POST['criteria'];
   $sid=$_POST['sid'];
    

    $sql="update `rating` set rating=$rating, criteria=$criteria,sID=$sid
     where pk=$pk";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Data updated successfully";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <form method="post">
        <div class="form-group">
                <label>Rating</label>
                <input type="number" class="form-control" placeholder="Enter the rating of the student " name="rating"
                value=<?php echo $rating;?>>
            </div>
            <div class="form-group">
                <label>Online Judge</label>
                <input type="number" class="form-control" placeholder="Enter the judge id" name="criteria"
                value=<?php echo $critera;?>>
            </div>
            <div class="form-group">
                <label>Student ID</label>
                <input type="number" class="form-control" placeholder="Enter the student id" name="sid"
                value=<?php echo $sid;?>>
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>

</body>

</html>