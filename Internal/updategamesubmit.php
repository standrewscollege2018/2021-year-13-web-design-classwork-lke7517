<?php
 $i=1;
$gameID= $_GET['gameID'];

$delete_sql= "DELETE FROM playerpoints WHERE gameID = '$gameID'";
$delete_qry= mysqli_query($dbconnect, $delete_sql);

do {
  if (isset($_POST[$i])) {

  $points = $_POST[$i];
  $enterpoints_sql = "INSERT INTO playerpoints (gameID, playerID, points) VALUES ('$gameID', '$i', '$points')";

  $enterpoints_qry = mysqli_query($dbconnect, $enterpoints_sql);
  }
  $i=$i+1;
} while ($i <= 10);

header("Location: index.php");
