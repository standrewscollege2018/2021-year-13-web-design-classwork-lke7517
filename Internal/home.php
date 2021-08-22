<?php
include('dbconnect.php');

 $lastresult_sql = "SELECT * FROM results ORDER BY gameID DESC LIMIT 3";
 $lastresult_qry = mysqli_query($dbconnect, $lastresult_sql);
 $lastresult_aa = mysqli_fetch_assoc($lastresult_qry);

 $recentgame=$lastresult_aa['gameID'];

 $totalpoints_sql = "SELECT player.firstname, player.lastname, playerpoints.points, SUM(playerpoints.points) AS totalpoints FROM playerpoints JOIN player on playerpoints.playerID = player.playerID GROUP BY playerpoints.playerID ORDER BY SUM(playerpoints.points) DESC LIMIT 3";
 $totalpoints_qry = mysqli_query($dbconnect, $totalpoints_sql);
 $totalpoints_aa = mysqli_fetch_assoc($totalpoints_qry);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p class="heading">Welcome to Sports Report</p>
    <div class="row">
      <div class="col">
        <div class="card bg-dark text-white">
          <img src="basketballgame.jpeg" class="card-img" alt="...">
          <div class="card-img-overlay">
            <h5 class="card-title"></h5>


          </div>
        </div>
      </div>
      <div class="col">
        <p class="headerscore">Total Points Leaders</p>

        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">Rank</th>
              <th scope="col">Firstname</th>
              <th scope="col">Lastname</th>
              <th scope="col">Points</th>
            </tr>
          </thead>
          <tbody>

        <?php
        $counter=1;
        do {

          ?>

            <tr>
              <th scope='row'><?php echo $counter ?></th>
              <td> <?php echo $totalpoints_aa['firstname']?></td>
              <td><?php echo $totalpoints_aa['lastname']?></td>
              <td><?php echo $totalpoints_aa['totalpoints']?></td>
            </tr>
          <?php
           $counter= $counter+1;
        } while ($totalpoints_aa = mysqli_fetch_assoc($totalpoints_qry));
        ?>
        </tbody>
        </table>



     <div class="col">
       <div class="row">

        
       <?php
       do {
         $gamedate = $lastresult_aa['gamedate'];
         $opposition = $lastresult_aa['opposition'];
         $stacpoints = $lastresult_aa['stacpoints'];
         $opppoints = $lastresult_aa['opppoints'];
         $gameID= $lastresult_aa['gameID'];

           ?>
           <div class=" col-md-6 col-sm-12">
             <div class="card h-100">
               <h5 class="card-header"><?php echo $gamedate ?></h5>
               <div class="card-body">
                 <p class="card-text"> <?php echo "<p class> St Andrews $stacpoints - $opposition $opppoints  </p>"?></p>
                 <a href="index.php?page=boxscore&gameID=<?php echo $gameID ; ?>" class="btn btn-primary">View box score</a>
               </div>
             </div>
           </div>

         <?php

       } while ($lastresult_aa = mysqli_fetch_assoc($lastresult_qry));

   ?>
      </div>


     </div>

     <div class="col">

     </div>
  </div>
  </body>
</html>
