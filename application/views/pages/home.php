<div class="row">
	<h4>Latest Blogs</h4>
</div>
<hr>
	   <?php foreach($blog as $b):?>
        <div class="row mt-3 blog-box mb-3">
          <div class="col-md-4">
 	      <img src="<?php echo base_url() ?>assets/image/posts/<?php echo $b['blogimage']?>" class="img-box">
        </div>
        <div class="col-md-8">
            <h4><a href="<?php echo base_url() ?>blog/<?php echo $b['slug']?>" class="nav-link"><?php echo $b['title'] ?></a></h4> 
            <small>Created_at : <?php echo $b['created_at']?></small><br>
            <small>Category : <?php echo $b['name']; ?></small>
            <small class="ml-3">By: <?php echo $b['username']; ?></small>
            <p><?php echo word_limiter($b['body'], 6)?></p>
            <a href="<?php echo base_url() ?>blog/<?php echo $b['slug']?>" class="btn btn-outline-dark">Read More..</a>
	    </div>
        </div>
<?php endforeach; ?>
