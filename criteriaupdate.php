<?php
include 'connection.php';
$id=$_GET['updateid'];
$sql="select * from `criteria` where CriteriaID=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['CriteriaName'];
$weight=$row['Weight'];

if(isset($_POST['submit'])){
   // $id=$_POST['id'];
   $id=$_GET['updateid'];
    $name=$_POST['name'];
    $weight=$_POST['weight'];
    

    $sql="update `criteria` set CriteriaName='$name',Weight=$weight
     where CriteriaID=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Data updated successfully";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <form method="post">
           <!-- <div class="form-group">
                <label>ID</label>
                <input type="number" class="form-control" placeholder="Enter the contest id" name="id"
                value=<?php echo $id;?>> 
                
            </div>-->
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter the criteria name" name="name"
                value=<?php echo $name;?>>
            </div>
            <div class="form-group">
                <label>Weight</label>
                <input type="number" class="form-control" placeholder="Enter criteria weight" name="weight"
                value=<?php echo $weight;?>>
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>

</body>

</html>