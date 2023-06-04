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
    <style>
      body {
	height: 100%;
}

      body {
	margin: 0;
	background: linear-gradient(45deg, #49a09d, #5f2c82);
	font-family: sans-serif;
	font-weight: 100;
}


        #students {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #students td, #students th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #students tr:nth-child(even){background-color: #f2f2f2;}

        #students tr:hover {background-color: #ddd;}

        #students th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #007bff;
          color: white;
        }
    </style>
</head>
<body>

<div class="container">
<button class="btn btn-primary my-5">
    <a href="student.php" class="text-light">Add Student</a>
</button>

<button class="btn btn-secondary my-5">
    <a href="home2.php" class="text-light">Go to Home Page</a>
</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Semester</th>
      <th scope="col">Selection_contest_1</th>
      <th scope="col">Selection_contest_2</th>
      <th scope="col">Selection_contest_3</th>
      <th scope="col">GroupID</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="select * from `student`";
    $result=mysqli_query($con,$sql);
    if($result){
        while( $row=mysqli_fetch_assoc($result)){
            $id=$row['SID'];
            $name=$row['SName'];
            $sem=$row['Semester'];
            $sc1=$row['SC_1'];
            $sc2=$row['SC_2'];
            $sc3=$row['SC_3'];
            $groupid=$row['GroupID'];
            
            echo '<tr>
            <th scope="row">'. $id.'</th>
            <td>'.$name.'</td>
            <td>'.$sem.'</td>
            <td>'.$sc1.'</td>
            <td>'.$sc2.'</td>
            <td>'.$sc3.'</td>
            <td>'.$groupid.'</td>
            
          <td>
  <a href="studentupdate.php?updateid='.$id.'" class="btn btn-primary">Update</a>
  <a href="studentdelete.php?deleteid='.$id.'" class="btn btn-danger">Delete</a>
  <a href="studentview.php?viewid='.$id.'" class="btn btn-danger">Contest Career</a>
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