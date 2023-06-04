<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cname = $_POST['contestname'];
    $cdate = $_POST['contestdate'];
    $tname = $_POST['teamname'];
    $m1id = $_POST['member1id'];
    $m2id = $_POST['member2id'];
    $m3id = $_POST['member3id'];
    $rank = $_POST['rank'];

    $insert_iupc = "INSERT INTO `iupc` (ContestName, Date) VALUES ('$cname', '$cdate')";
    if (mysqli_query($con, $insert_iupc)) {
        $cid = mysqli_insert_id($con);

        $select_team = "SELECT TeamID FROM `team` WHERE TeamName = '$tname'";
        $result = mysqli_query($con, $select_team);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $tid = $row['TeamID'];
        } else {
            $insert_team = "INSERT INTO `team` (TeamName) VALUES ('$tname')";
            if (mysqli_query($con, $insert_team)) {
                $tid = mysqli_insert_id($con);
            } else {
                echo "Error: " . mysqli_error($con);
            }
        }

        $insert_memberof = "INSERT INTO `memberof` (sID, contestID, teamID) VALUES ($m1id, $cid, $tid), ($m2id, $cid, $tid), ($m3id, $cid, $tid)";
        if (mysqli_query($con, $insert_memberof)) {
            $insert_rank = "INSERT INTO `rank` (cRank, contestID, teamID) VALUES ($rank, $cid, $tid)";
            if (mysqli_query($con, $insert_rank)) {
                echo "Successful";
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
	<form method="POST" action="">
		Contest Name: <input type="text" name="contestname"><br>
		Contest Date: <input type="text" name="contestdate"><br>
		Team Name: <input type="text" name="teamname"><br>
		Member1ID: <input type="text" name="member1id"><br>
		Member2ID: <input type="text" name="member2id"><br>
		Member3ID: <input type="text" name="member3id"><br>
		Rank: <input type="text" name="rank"><br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
