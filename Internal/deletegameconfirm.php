<?php
$gameID= $_GET['gameID'];
$confirm_sql = "SELECT * FROM results WHERE gameID = '$gameID'";
$confirm_qry = mysqli_query($dbconnect, $confirm_sql);

$confirm_aa = mysqli_fetch_assoc($confirm_qry);
$stacpoints = $confirm_aa['stacpoints'];
$opposition = $confirm_aa['opposition'];
$opppoints = $confirm_aa['opppoints'];
$gamedate =  $confirm_aa['gamedate'];
 ?>
<?php echo 'Are you sure you want to delete this Game?' ?>
<button class="btn btn-black" type="submit"><?php echo "<a class='' href='index.php?page=deletegame&gameID=$gameID'> YES </a>" ?></button>
<button class="btn btn-black" type="submit"><?php echo "<a class='' href='index.php?page=deletegameselect'> NO </a>" ?></button>
<div class="col-lg-4 col-md-6 col-sm-12">
  <div class="card">
    <h5 class="card-header"><?php echo $gamedate ?></h5>
    <div class="card-body">
      <p class="card-text"> <?php echo "<p class> St Andrews $stacpoints - $opposition $opppoints  </p>"?></p>
      
    </div>
  </div>
</div>
