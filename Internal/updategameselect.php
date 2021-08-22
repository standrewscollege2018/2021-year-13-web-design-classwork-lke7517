<?php
$gameselect_sql = "SELECT * FROM results";
$gameselect_qry = mysqli_query($dbconnect, $gameselect_sql);
$gameselect_aa = mysqli_fetch_assoc($gameselect_qry);
?>
<p class="heading">Choose game to edit</p>
<div class="container">
      <div class="row">
    <?php
    do {
      $gamedate = $gameselect_aa['gamedate'];
      $opposition = $gameselect_aa['opposition'];
      $stacpoints = $gameselect_aa['stacpoints'];
      $opppoints = $gameselect_aa['opppoints'];
      $gameID= $gameselect_aa['gameID'];

        ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <h5 class="card-header"><?php echo $gamedate ?></h5>
            <div class="card-body">
              <p class="card-text"> <?php echo "<p class> St Andrews $stacpoints - $opposition $opppoints  </p>"?></p>
              <a href="index.php?page=updategameenter&gameID=<?php echo $gameID ; ?>" class="btn btn-primary">Edit game</a>
            </div>
          </div>
        </div>

      <?php

    } while ($gameselect_aa = mysqli_fetch_assoc($gameselect_qry));
