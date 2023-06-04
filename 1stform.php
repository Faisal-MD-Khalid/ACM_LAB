<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cname = $_POST['contestname'];
    $cdate = $_POST['contestdate'];

    $insert_iupc = "INSERT INTO `iupc` (ContestName, Date) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $insert_iupc);
    mysqli_stmt_bind_param($stmt, "ss", $cname, $cdate);
    if (mysqli_stmt_execute($stmt)) {
        $cid = mysqli_insert_id($con);
        mysqli_stmt_close($stmt);
        mysqli_close($con);
        header("Location: teams.php?cid=$cid");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
</head>
<body>
    
<button class="btn btn-secondary my-5">
    <a href="home2.php" class="text-light">Go to Home Page</a>
</button>
    <form method="POST" action="">
        Contest Name: <input type="text" name="contestname"><br>
        Contest Date: <input type="text" name="contestdate"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
