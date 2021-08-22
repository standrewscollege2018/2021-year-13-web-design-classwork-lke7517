<?php
$results_sql = "SELECT * FROM results";
$results_qry = mysqli_query($dbconnect, $results_sql);
$results_aa = mysqli_fetch_assoc($results_qry);
?>
<p class="heading">Choose game to delete</p>
<div class="container">
      <div class="row">
    <?php
    do {
      $gamedate = $results_aa['gamedate'];
      $opposition = $results_aa['opposition'];
      $stacpoints = $results_aa['stacpoints'];
      $opppoints = $results_aa['opppoints'];
      $gameID= $results_aa['gameID'];

        ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <h5 class="card-header"><?php echo $gamedate ?></h5>
            <div class="card-body">
              <p class="card-text"> <?php echo "<p class> St Andrews $stacpoints - $opposition $opppoints  </p>"?></p>
              <a href="index.php?page=deletegameconfirm&gameID=<?php echo $gameID ; ?>" class="btn btn-primary">Delete game</a>
            </div>
          </div>
        </div>

      <?php

    } while ($results_aa = mysqli_fetch_assoc($results_qry));
