<?php

$results_sql = "SELECT * FROM results";
$results_qry = mysqli_query($dbconnect, $results_sql);
$results_aa = mysqli_fetch_assoc($results_qry);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Scores</h1>
    <div class="resultsbox"
    <?php

  do {
    $date=$results_aa['gamedate'];
    $gamenumber= $results_aa['gameID'];
    $stacpoints = $results_aa['stacpoints'];
    $opposition = $results_aa['opposition'];
    $opppoints = $results_aa['opppoints'];

    ?>


  <div class="card">
  <h5 class="card-header"><?php echo "<p class='date'> $date</p>"?></h5>
  <div class="card-body">
  <?php  echo   "<h5 class='card-title'>  St Andrews $stacpoints - $opposition $opppoints</h5>";

   echo "<a href='index.php?page=boxscore&gameID=$gamenumber' class='btn btn-primary'>Box score</a>" ?>
  </div>
</div>

    </div>
    <?php
  } while ($results_aa = mysqli_fetch_assoc($results_qry));
      ?>

      <?php include('comments.php'); ?>
  </body>
</html>
