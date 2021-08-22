<?php
$totalpoints_sql = "SELECT player.firstname, player.lastname, playerpoints.points, SUM(playerpoints.points) AS totalpoints FROM playerpoints JOIN player on playerpoints.playerID = player.playerID GROUP BY playerpoints.playerID ORDER BY SUM(playerpoints.points) DESC, SUBSTR( player.lastname, 1, 2 )";
$totalpoints_qry = mysqli_query($dbconnect, $totalpoints_sql);
$totalpoints_aa = mysqli_fetch_assoc($totalpoints_qry);


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p class="headerscore">Total Points Leaders</p>

    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">Rank</th>
          <th scope="col">Firstname</th>
          <th scope="col">Lastname</th>
          <th scope="col">Points</th>
        </tr>
      </thead>
      <tbody>

    <?php
    $counter=1;
    do {

      ?>

        <tr>
          <th scope='row'><?php echo $counter ?></th>
          <td> <?php echo $totalpoints_aa['firstname']?></td>
          <td><?php echo $totalpoints_aa['lastname']?></td>
          <td><?php echo $totalpoints_aa['totalpoints']?></td>
        </tr>
      <?php
       $counter= $counter+1;
    } while ($totalpoints_aa = mysqli_fetch_assoc($totalpoints_qry));
    ?>
    </tbody>
    </table>


 <?php include('comments.php') ?>
  </body>
</html>
