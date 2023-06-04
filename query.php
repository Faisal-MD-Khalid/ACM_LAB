<?php

include 'connection.php';

$sql = "UPDATE student SET GroupID=NULL";

// Execute the SQL query and check for errors
if ($con->query($sql) === TRUE) {
    echo "All GroupID values set to NULL successfully";
} else {
    echo "Error updating GroupID values: " . $con->error;
}


// Get total number of students
$result = $con->query("SELECT COUNT(*) as count FROM student");
$count = $result->fetch_assoc()['count'];

// Calculate number of teams
$rem=$count%3;
$num_teams =( $count-$rem) / 3;

// Initialize array to hold teams
$teams = [];

// Loop through all teams
for ($i = 0; $i < $num_teams; $i++) {

  // Query to select distinct students not in any previous team
  $query = "
  SELECT s1.SName SName_1,s1.SID SID_1,
  s2.SName SName_2,s2.SID SID_2,
  s3.SName SName_3,s3.SID SID_3,
  s1.SC_1 + s2.SC_2 + s3.SC_3 score

 FROM student s1
 JOIN student s2
 JOIN student s3
 WHERE s1.SID!=s2.SID AND s1.SID!=s3.SID AND s2.SID!=s3.SID
 AND s1.GroupID IS NULL
 AND s2.GroupID IS NULL
 AND s3.GroupID IS NULL
  ";

  // Order by descending score
  $query .= "ORDER BY s1.SC_1 + s2.SC_2 + s3.SC_3 DESC LIMIT 1";

  // Execute query
  $result = $con->query($query);

  // Add team to array
  $teams[$i] = $result->fetch_assoc();

  // Update GroupID for each student in team
  $con->query("UPDATE student SET GroupID = $i+1 WHERE SID IN ({$teams[$i]['SID_1']}, {$teams[$i]['SID_2']}, {$teams[$i]['SID_3']})");
}

if($rem==2){
  $query = "
  SELECT s1.SName SName_1,s1.SID SID_1,
  s2.SName SName_2,s2.SID SID_2,
  s1.SC_1 + s2.SC_2  score

 FROM student s1
 JOIN student s2
 
 WHERE s1.SID!=s2.SID 
 AND s1.GroupID IS NULL
 AND s2.GroupID IS NULL
 
  ";

  // Order by descending score
  //$query .= "ORDER BY s1.SC_1 + s2.SC_2 + s3.SC_3 DESC LIMIT 1";

  // Execute query
  $result = $con->query($query);

  // Add team to array
  $teams[$num_teams] = $result->fetch_assoc();

  // Update GroupID for each student in team
  $con->query("UPDATE student SET GroupID = $num_teams+1 WHERE SID IN ({$teams[$num_teams]['SID_1']}, {$teams[$num_teams]['SID_2']})");
}

if($rem==1){
  $query = "
  SELECT s1.SName SName_1,s1.SID SID_1,
  s1.SC_1  score

 FROM student s1
 
 WHERE s1.GroupID IS NULL

 
  ";

  // Order by descending score
  //$query .= "ORDER BY s1.SC_1 + s2.SC_2 + s3.SC_3 DESC LIMIT 1";

  // Execute query
  $result = $con->query($query);

  // Add team to array
  $teams[$num_teams] = $result->fetch_assoc();

  // Update GroupID for each student in team
  $con->query("UPDATE student SET GroupID = $num_teams+1 WHERE SID IN ({$teams[$num_teams]['SID_1']})");
}



// Display teams
echo "<table>";
echo "<tr><th>Team</th><th>Member 1</th><th>Member 2</th><th>Member 3</th><th>Score</th></tr>";

for ($i = 0; $i < $num_teams; $i++) {
  echo "<tr>";
  echo "<td>" . ($i + 1) . "</td>";
  echo "<td>" . $teams[$i]['SName_1'] . "</td>";
  echo "<td>" . $teams[$i]['SName_2'] . "</td>";
  echo "<td>" . $teams[$i]['SName_3'] . "</td>";
  echo "<td>" . ($teams[$i]['score'] ) . "</td>";
  echo "</tr>";
}
if($rem==2){
  echo "<tr>";
  echo "<td>" . ($num_teams) . "</td>";
  echo "<td>" . $teams[$num_teams]['SName_1'] . "</td>";
  echo "<td>" . $teams[$num_teams]['SName_2'] . "</td>";
  echo "<td>" . " " . "</td>";
  echo "<td>" . ($teams[$num_teams]['score'] ) . "</td>";
  echo "</tr>";
}
if($rem==1){
  echo "<tr>";
  echo "<td>" . ($num_teams) . "</td>";
  echo "<td>" . $teams[$num_teams]['SName_1'] . "</td>";
  echo "<td>" . " " . "</td>";
  echo "<td>" . " " . "</td>";
  echo "<td>" . ($teams[$num_teams]['score'] ) . "</td>";
  echo "</tr>";
}

echo "</table>";

$con->close();
?>  