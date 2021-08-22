<?php
$players_sql = "SELECT * FROM player";
$players_qry = mysqli_query($dbconnect, $players_sql);
$players_aa = mysqli_fetch_assoc($players_qry);

$gameID = $_GET['gameID'];
$currentdata_sql = "SELECT * FROM results WHERE gameID = $gameID";
$currentdata_qry = mysqli_query($dbconnect, $currentdata_sql);
$currentdata_aa = mysqli_fetch_assoc($currentdata_qry);


$currentplayers_sql = "SELECT player.firstname, player.lastname, player.playerID FROM playerpoints JOIN player on playerpoints.playerID = player.playerID WHERE playerpoints.gameID = $gameID";
$currentplayers_qry = mysqli_query($dbconnect, $currentplayers_sql);
$currentplayers_aa = mysqli_fetch_assoc($currentplayers_qry);
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>




<div class="container">
<div class="row">
  <div class="col">
    <h3>Current stats</h3>

<?php
$stacpoints= $currentdata_aa['stacpoints'];
$opposition= $currentdata_aa['opposition'];
$opppoints= $currentdata_aa['opppoints'];
$date = $currentdata_aa['gamedate'];


echo "<p>Opposition = $opposition  <p>";
echo "<p>Stac Points = $stacpoints  <p>";
echo "<p>Opposition points = $opppoints  <p>";
echo "<p>Date = $date  <p>";
?>
<div class="container">

<h3>Players in the database for this game</h3>
<?php
do {
  $currentfirstname= $currentplayers_aa['firstname'];
  $currentlastname= $currentplayers_aa['lastname'];

  echo "<div class='row'>$currentfirstname $currentlastname</div>";

} while ($currentplayers_aa = mysqli_fetch_assoc($currentplayers_qry));

?>
 </div>
  </div>
  <div class="col">



<?php
do {
  // code...
} while ($currentplayers_aa = mysqli_fetch_assoc($currentplayers_qry));
?>
<h3>Update Game Stats</h3>
<form class="" action="index.php?page=updategamepoints&gameID=<?php echo $gameID ?>" method="post">
  <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="oppteam">Opposition Team</label>
            <input type="text" class="form-control" id="opposition" name="opposition" placeholder="Opposition team" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="stacpoints">Stac Points</label>
            <input type="number" class="form-control" id="stacpoints" name="stacpoints" placeholder="StAC Points" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="opppoints">Opposition Points</label>
              <input type="number" class="form-control" id="opppoints" name="opppoints" placeholder="Opposition Points" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="date">Date</label>
              <input type="varchar" class="form-control" id="date" name="gamedate" placeholder="Date" required>
          </div>
        </div>




  <h3>Select who played the game</h3>
<?php do {
?> <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="playerID[]" id="<?php echo $players_aa['playerID']; ?>" value="<?php echo $players_aa['playerID']; ?>">
  <label class="custom-control-label" for="<?php echo $players_aa['playerID']; ?>"><?php echo $players_aa['firstname'], " ", $players_aa['lastname']; ?></label>
</div>
<?php
} while ($players_aa = mysqli_fetch_assoc($players_qry)); ?>
<button class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Enter</button>
</form>
</div>
</div>
</div>
</div>
  </body>
</html>
