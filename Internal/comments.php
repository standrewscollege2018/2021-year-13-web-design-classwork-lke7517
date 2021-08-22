<?php
$fetchcomment_sql = "SELECT * FROM comment WHERE page='$page'";
$fetchcomment_qry =  mysqli_query($dbconnect, $fetchcomment_sql);
$fetchcomment_aa = mysqli_fetch_assoc($fetchcomment_qry);


 ?>
 <div class="panel panel-default">
     <p class="subheader" > Comments </p>
   <?php
   do {
     $name= $fetchcomment_aa['name'];
     $comment= $fetchcomment_aa['content'];
      ?>
      <div class="card">
  <h5 class="card-header"> <p class=""><?php echo $comment ?></p> </h5>
  <div class="card-body">

    <p class="card-text"><?php echo $comment ?></p>

  </div>
</div>
   <?php
   } while ($fetchcomment_aa = mysqli_fetch_assoc($fetchcomment_qry));

    ?>
  </div>
<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Leave a Comment...
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Submit a comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="index.php?page=entercomment&currentpage=<?php echo $page;?>" method="post">
        <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Comment</label>
        <textarea name="comment" class="form-control" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary" >Submit</button>
    </form>
    </div>
  </div>
</div>




</div>
