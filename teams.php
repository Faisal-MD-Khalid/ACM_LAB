<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cid = $_POST['cid'];
    $tname = $_POST['teamname'];
    $m1id = $_POST['member1id'];
    $m2id = $_POST['member2id'];
    $m3id = $_POST['member3id'];
    $rank = $_POST['rank'];

    $select_team = "SELECT TeamID FROM `team` WHERE TeamName = ?";
    $stmt = mysqli_prepare($con, $select_team);
    mysqli_stmt_bind_param($stmt, "s", $tname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $tid = $row['TeamID'];
        mysqli_stmt_close($stmt);
    } else {
        $insert_team = "INSERT INTO `team` (TeamName) VALUES (?)";
        $stmt = mysqli_prepare($con, $insert_team);
        mysqli_stmt_bind_param($stmt, "s", $tname);
        if (mysqli_stmt_execute($stmt)) {
            $tid = mysqli_insert_id($con);
           // $tid = $insert_team;
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($con);
            exit();
        }
    }

    
    $insert_rank = "INSERT INTO `rank` (cRank, contestID, teamID) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $insert_rank);
    mysqli_stmt_bind_param($stmt, "iii", $rank, $cid, $tid);
   

    if (mysqli_stmt_execute($stmt)) {
        $insert_rank_id = mysqli_insert_id($con); 
        $insert_memberof = "INSERT INTO `memberof` (sID, ContestTeam) VALUES (?, ?), (?, ?), (?, ?)";
        $stmt = mysqli_prepare($con, $insert_memberof);
        mysqli_stmt_bind_param($stmt, "iiiiii", $m1id, $insert_rank_id, $m2id,$insert_rank_id, $m3id, $insert_rank_id);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            echo "Success: Data inserted into the database.";
        } else {
            echo "Error: " . mysqli_error($con);
           // echo $insert_rank;
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teams Form</title>
</head>
<body>
    
<button class="btn btn-secondary my-5">
    <a href="home2.php" class="text-light">Go to Home Page</a>
</button>
    <form method="POST" action="">
        <input type="hidden" name="cid" value="<?php echo $_GET['cid']; ?>">
        Team Name: <input type="text" name="teamname"><br>
        Member 1 ID: <input type="number" name="member1id"><br>
        Member 2 ID: <input type="number" name="member2id"><br>
        Member 3 ID: <input type="number" name="member3id"><br>
        Rank: <input type="number" name="rank"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
