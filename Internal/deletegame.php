<?php
$gameID= $_GET['gameID'];
$delete_sql= "DELETE FROM results WHERE gameID = '$gameID'";
$delete_qry= mysqli_query($dbconnect, $delete_sql);

$deletepoints_sql= "DELETE FROM playerpoints WHERE gameID= '$gameID'";
$deletepoints_qry= mysqli_query($dbconnect, $deletepoints_sql);

header('Location: index.php');
 ?>
