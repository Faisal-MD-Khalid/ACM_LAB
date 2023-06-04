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
    <a href="criteria.php" class="text-light">Add Criteria</a>
</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Weight</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="select * from `criteria`";
    $result=mysqli_query($con,$sql);
    if($result){
        while( $row=mysqli_fetch_assoc($result)){
            $id=$row['CriteriaID'];
            $name=$row['CriteriaName'];
            $weight=$row['Weight'];
            
            
            echo '<tr>
            <th scope="row">'. $id.'</th>
            <td>'.$name.'</td>
            <td>'.$weight.'</td>
            
            
          <td>
  <a href="criteriaupdate.php?updateid='.$id.'" class="btn btn-primary">Update</a>
  <a href="criteriadelete.php?deleteid='.$id.'" class="btn btn-danger">Delete</a>
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