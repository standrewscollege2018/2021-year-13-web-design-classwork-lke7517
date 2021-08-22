<?php

$opposition= $_POST['opposition'];
$stacpoints= $_POST['stacpoints'];
$opppoints=  $_POST['opppoints'];
$gamedate= $_POST['gamedate'];
$addscore_sql = "INSERT INTO results (opposition, stacpoints, opppoints, gamedate) VALUES ('$opposition', '$stacpoints', '$opppoints', '$gamedate')";
$addscore_qry = mysqli_query($dbconnect, $addscore_sql);

$gamenumber_sql = "SELECT gameID FROM results ORDER BY gameID DESC LIMIT 1" ;
$gamenumber_qry = mysqli_query($dbconnect, $gamenumber_sql);
$gamenumber_aa = mysqli_fetch_assoc($gamenumber_qry);
$gameID= $gamenumber_aa['gameID'];
?>
<?php echo "<form class='' action='index.php?page=enterpoints&gameID=$gameID' method='post'>" ?>
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
<button class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Enter</button>
</form>
