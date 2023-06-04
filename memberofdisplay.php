<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
<button class="btn btn-primary my-5">
    <a href="memberof.php" class="text-light">Add memberof relation</a>
</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Student ID</th>
      <th scope="col">Contest ID</th>
      <th scope="col">Team ID</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="select * from `memberof`";
    $result=mysqli_query($con,$sql);
    if($result){
        while( $row=mysqli_fetch_assoc($result)){
            $pk=$row['pk'];
            $sid=$row['sID'];
            $cid=$row['contestID'];
            $tid=$row['teamID'];
            
            
            echo '<tr>
            <th scope="row">'. $pk.'</th>
            <td>'.$sid.'</td>
            <td>'.$cid.'</td>
            <td>'.$tid.'</td>
            
          <td>
  <a href="memberofupdate.php?updatepk='.$pk.'" class="btn btn-primary">Update</a>
  <a href="memberofdelete.php?deletepk='.$pk.'" class="btn btn-danger">Delete</a>
</td>

          </tr>';
        }
        
    }
    ?>
   
  </tbody>
</table>
</div>
</body>
</html>