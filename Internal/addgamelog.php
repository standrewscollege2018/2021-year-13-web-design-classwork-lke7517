<!DOCTYPE html>
<?php
$players_sql = "SELECT * FROM player";
$players_qry = mysqli_query($dbconnect, $players_sql);
$players_aa = mysqli_fetch_assoc($players_qry);

 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Add Game Log</h1>




<form class="" action="index.php?page=entergame" method="post">
  <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="oppteam">Opposition Team</label>
            <input type="text" class="form-control" id="opposition" name="opposition" placeholder="Opposition Team" required>
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



        </div>
  <h1>Select who played the game</h1>
<?php do {
?> <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="playerID[]" id="<?php echo $players_aa['playerID']; ?>" value="<?php echo $players_aa['playerID']; ?>">
  <label class="custom-control-label" for="<?php echo $players_aa['playerID']; ?>"><?php echo $players_aa['firstname'], $players_aa['lastname']; ?></label>
</div>
<?php
} while ($players_aa = mysqli_fetch_assoc($players_qry)); ?>
<button class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Enter</button>
</form>
  </body>
</html>
