<?php
$page= $_GET['currentpage'];
$personname = $_POST['name'];
$commentcontent = $_POST['comment'];
;
$entercomment_sql = "INSERT INTO comment (page, name, content) VALUES ('$page', '$personname', '$commentcontent')";

$entercomment_qry = mysqli_query($dbconnect, $entercomment_sql);
echo $entercomment_sql;
  header('Location: index.php?page=playerstats')
 ?>
