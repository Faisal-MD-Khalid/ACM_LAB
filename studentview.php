<?php
include('connection.php');

if (isset($_GET['viewid'])) {
  $sid = $_GET['viewid'];
  $cnt=0; $trank=0;
  $sql = "SELECT  c.ContestID CID, c.ContestName CName,c.Date CDate, t.TeamName TName, s.SName SName,r.cRank `Rank`  
          FROM memberof mo 
          JOIN `rank`  r ON mo.ContestTeam=r.pk 
          JOIN student s ON mo.sID=s.SID
          JOIN iupc c ON r.contestID=c.ContestID
          JOIN team t ON r.teamID=t.TeamID
          WHERE r.pk IN 
          (SELECT r.pk FROM memberof mo 
          JOIN `rank`  r ON mo.ContestTeam=r.pk 
          WHERE mo.sID=$sid) ";

  $result = $con->query($sql);
  if (!$result) {
    die("Query failed: " . $con->error);
  }
?>

<table>
<style>
        body {
          margin: 0;
          background: linear-gradient(45deg, #49a09d, #5f2c82);
          font-family: sans-serif;
          font-weight: 100;
        }
        
        table {
          width: 100%;
          border-collapse: collapse;
          margin-top: 30px;
          margin-bottom: 30px;
          background-color: white;
          color: #333;
          font-size: 16px;
          text-align: left;
        }

        th {
          background-color: #007bff;
          color: white;
          font-weight: bold;
        }

        th,
        td {
          padding: 10px;
          border: 1px solid #ccc;
        }

        tr:nth-child(even) {
          background-color: #f2f2f2;
        }

        tr:hover {
          background-color: #ddd;
        }

        @media screen and (max-width: 600px) {
          table {
            width: 100%;
          }
        }
      </style>
  <tr>
    <th>Contest Name</th>
    <th>Contest Date</th>
    <th>Team</th>
    <th>Member 1</th>
    <th>Member 2</th>
    <th>Member 3</th>
    <th>Rank</th>
    
  </tr>
  <?php
    $teams = array(); // Initialize $teams to an empty array
    while ($row = $result->fetch_assoc()) {
      $teams[$row['CID']][0] = $row['Rank'];
      $trank+=$row['Rank']; $cnt++;
      $teams[$row['CID']][1] = $row['CName'];
      $teams[$row['CID']][2] = $row['CDate'];
      $teams[$row['CID']][3] = $row['TName'];
      $teams[$row['CID']][] = $row['SName'];
    }
    if (empty($teams)) {
      echo "Not participated in any contest";
    } else {
      
       echo "His average rank is ".$trank/$cnt; 
      foreach ($teams as $key => $value) {
       
  ?>
  
  <tr>
    <td><?php echo $value[1]; ?></td>
    <td><?php echo $value[2]; ?></td>
    <td><?php echo $value[3]; ?></td>
    <td><?php echo $value[4]; ?></td>
    <td><?php echo $value[5]; ?></td>
    <td><?php echo $value[6]; ?></td>
    <td><?php echo $value[0]; ?></td>
      
    
    
   
  </tr>
  <?php
      }
    }
  ?>
</table>

<?php
} else {
  echo "Invalid view ID.";
}
?>
