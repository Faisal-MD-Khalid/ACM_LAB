<?php
include('connection.php');

if (isset($_GET['viewid'])) {
  $cid = $_GET['viewid'];
  $sql = "SELECT t.TeamName TName, s.SName SID, r.cRank `Rank` FROM memberof mo 
          JOIN `rank` r ON mo.ContestTeam=r.pk 
          JOIN student s ON mo.sID=s.SID
          JOIN iupc c ON r.contestID=c.ContestID
          JOIN team t ON r.teamID=t.TeamID
          WHERE r.contestID=$cid";

  $result = $con->query($sql);
  if (!$result) {
    die("Query failed: " . $con->error);
  }
?>
<?php if ($result->num_rows > 0): ?>
  <html>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Operation</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
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
    </head>
    <body>
      <div class="container">
        <table>
          <thead>
            <tr>
              <th>Team</th>
              <th>Member 1</th>
              <th>Member 2</th>
              <th>Member 3</th>
              <th>Rank</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $teams = array();
              while ($row = $result->fetch_assoc()) {
                $teams[$row['TName']][0] = $row['Rank'];
                $teams[$row['TName']][] = $row['SID'];
              }
              foreach ($teams as $key => $value) {
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value[1]; ?></td>
              <td><?php echo $value[2]; ?></td>
              <td><?php echo $value[3]; ?></td>
              <td><?php echo $value[0]; ?></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </body>
  </html>
<?php else: ?>
 
  <p>No teams participated in this contest.</p>
<?php endif; ?>

<?php
} else {
  echo "Invalid view ID.";
}
?>
