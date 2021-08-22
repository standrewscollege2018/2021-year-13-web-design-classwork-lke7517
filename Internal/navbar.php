
    <nav class="navbar navbar-expand-lg navbar-light navbarcolour">
        <a href="index.php">  <img src= "sportsreport.png" width= "150" class='' ></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php
            session_start();
             if (isset($_SESSION['admin'])) { ?>
            <li class="nav-item px-5">
              <a class="navbartext"  href='index.php?page=logout'>Logout</a>
            </li>
            <li class="nav-item px-5">
              <a class="navbartext" aria-current="page" href="index.php?page=playerstats">Player stats</a>
            </li>
            <li class="nav-item px-5">
            <a class="navbartext " aria-current="page" href="index.php?page=scores">Scores</a>
            </li>

           <li class="nav-item px-5">
           <a class="navbartext " aria-current="page" href="index.php?page=addgamelog">Add game</a>
           </li>
           <li class="nav-item px-5">
           <a class="navbartext " aria-current="page" href="index.php?page=deletegameselect">Delete game</a>
         </li>
         <li class="nav-item px-5">
         <a class="navbartext " aria-current="page" href="index.php?page=updategameselect">Edit game</a>
       </li>

     <?php }
           else { ?>
           <li class="nav-item px-5">
             <a class="navbartext"  href='index.php?page=login'>Login</a>
           </li>
           <li class="nav-item px-5">
             <a class="navbartext" aria-current="page" href="index.php?page=playerstats">Player stats</a>
           </li>
           <li class="nav-item px-5">
           <a class="navbartext " aria-current="page" href="index.php?page=scores">Scores</a>
           </li>
           <?php
          }


           ?>




            </li>

          </ul>

        </div>
      </div>
    </nav>
