<?php
include 'connection.php';
$id=$_GET['updateid'];
$sql="select * from `student` where SID=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['SName'];
$sem=$row['Semester'];
$sc1=$row['SC_1'];
$sc2=$row['SC_2'];
$sc3=$row['SC_3'];
$groupid=$row['GroupID'];
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $sem=$_POST['sem'];
    $sc1=$_POST['sc_1'];
    $sc2=$_POST['sc_2'];
    $sc3=$_POST['sc_3'];
    $groupid=$_POST['groupid'];

    $sql="update `student` set SID=$id,SName='$name',Semester=$sem,
    SC_1=$sc1,SC_2=$sc2,SC_3=$sc3,GroupID=$groupid where SID=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Data updated successfully";
        header('location:studentdisplay.php');
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
                <label>ID</label>
                <input type="number" class="form-control" placeholder="Enter your id" name="id"
                value=<?php echo $id;?>> 
                
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name"
                value=<?php echo $name;?>>
            </div>
            <div class="form-group">
                <label>Semester</label>
                <input type="number" class="form-control" placeholder="Enter your semester" name="sem"
                value=<?php echo $sem;?>>
            </div>
            <div class="form-group">
                <label>Selection_Contest_1</label>
                <input type="number" class="form-control" placeholder="Enter your highest solve in selection contest 1" 
                name="sc_1" value=<?php echo $sc1;?>>
            </div>
            <div class="form-group">
                <label>Selection_Contest_2</label>
                <input type="number" class="form-control" placeholder="Enter your highest solve in selection contest 2" 
                name="sc_2" value=<?php echo $sc2;?>>
            </div>
            <div class="form-group">
                <label>Selection_Contest_3</label>
                <input type="number" class="form-control" placeholder="Enter your highest solve in selection contest 3"
                 name="sc_3" value=<?php echo $sc3;?>>
            </div>
            <div class="form-group">
                <label>GroupID</label>
                <input type="number" class="form-control"  name="groupid"
                value=<?php echo $groupid;?>>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>

</body>

</html>