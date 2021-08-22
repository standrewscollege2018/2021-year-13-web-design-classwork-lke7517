<?php
$gameID= $_GET['gameID'];
$boxscore_sql = "SELECT player.firstname, player.lastname, playerpoints.points, player.playerID FROM playerpoints JOIN player on playerpoints.playerID = player.playerID WHERE playerpoints.gameID = $gameID";
$boxscore_qry = mysqli_query($dbconnect, $boxscore_sql);
$boxscore_aa = mysqli_fetch_assoc($boxscore_qry);

?>
<h1>Box Score - </h1>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#Jersey Number</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Points</th>
    </tr>
  </thead>
  <tbody>

<?php
do {
  ?>

    <tr>
      <th scope='row'><?php echo $boxscore_aa['playerID'] ?></th>
      <td> <?php echo $boxscore_aa['firstname']?></td>
      <td><?php echo $boxscore_aa['lastname']?></td>
      <td><?php echo $boxscore_aa['points']?></td>
    </tr>
  <?php

} while ($boxscore_aa = mysqli_fetch_assoc($boxscore_qry));
?>
</tbody>
</table>
