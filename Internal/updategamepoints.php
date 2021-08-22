<?php
$gameID= $_GET['gameID'];
$opposition= $_POST['opposition'];
$stacpoints= $_POST['stacpoints'];
$opppoints=  $_POST['opppoints'];
$gamedate= $_POST['gamedate'];
echo $gameID;
$addscore_sql = "UPDATE results SET stacpoints = '$stacpoints', opposition = '$opposition', opppoints = '$opppoints', gamedate = '$gamedate' WHERE gameID = '$gameID'";
$addscore_qry = mysqli_query($dbconnect, $addscore_sql);


$points_sql = "SELECT player.firstname, player.lastname, playerpoints.points, player.playerID FROM playerpoints JOIN player on playerpoints.playerID = player.playerID WHERE playerpoints.gameID = $gameID";
$points_qry = mysqli_query($dbconnect, $points_sql);
$points_aa = mysqli_fetch_assoc($points_qry);

$gamenumber_sql = "SELECT gameID FROM results ORDER BY gameID DESC LIMIT 1" ;
$gamenumber_qry = mysqli_query($dbconnect, $gamenumber_sql);
$gamenumber_aa = mysqli_fetch_assoc($gamenumber_qry);
$gameID= $gamenumber_aa['gameID'];

?>

<div class="container">
  <div class="row">
<div class="col">
  <table class="table">
    <thead class="thead-light">
      <tr>
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

        <td> <?php echo $points_aa['firstname']?></td>
        <td><?php echo $points_aa['lastname']?></td>
        <td><?php echo $points_aa['points']?></td>
      </tr>
    <?php

  } while ($points_aa = mysqli_fetch_assoc($points_qry));
  ?>
  </tbody>
  </table>
</div>

<div class="col">



<?php echo "<form class='' action='index.php?page=updategamesubmit&gameID=$gameID' method='post'>" ?>
  <p>Enter Points Scored for each player</p>
  <?php
foreach ($_POST['playerID'] as $playerID) {


 $players_sql = "SELECT * FROM player WHERE playerID = $playerID ";
 $players_qry = mysqli_query($dbconnect, $players_sql);
 $players_aa = mysqli_fetch_assoc($players_qry);

  $firstname = $players_aa['firstname'];
  $lastname = $players_aa['lastname'];
  ?>
  <div class="col-md-4 mb-3">
    <label for="oppteam"><?php echo $firstname, $lastname ?></label>
    <input type="text" class="form-control" id="playerpoints" name="<?php echo $playerID; ?>" placeholder="Points Scored" required>
  </div>
  <?php

}
?>
</div>
</div>
</div>
<button class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Enter</button>
</form>
