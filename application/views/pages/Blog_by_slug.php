
<div class="row justify-content-center">
	<h3><?php echo $blog['title']?></h3>
</div>
<hr>
<div class="row mt-3">
	<div class="col-md-4">
		<img src="<?php echo base_url() ?>assets/image/posts/<?php echo $blog['blogimage']?>" class="img-box">
	</div>
	<div class="col-md-8">
		<small>created_at : <?php echo $blog['created_at']?></small>
		<small class="ml-5">by: <?php echo $blog['username'] ?></small>
		<p class="mt-3" style="font-size:20px;"><?php echo $blog['body']?></p>

        <?php if($this->session->userdata('userid') == $blog['userid']): ?>
            <a href="<?php echo base_url() ?>edit/<?php echo $blog['slug']?>" class="btn btn-outline-info">Edit</a>
            <a href="<?php echo base_url() ?>delete/<?php echo $blog['blogid']?>" class="btn btn-outline-danger">Delete</a>
        <?php endif; ?>
  
	</div>
</div>

<hr>
<div class="row mt-3 mb-3">
	<h4>Comments: </h4>
</div>
<hr>
<div class="row">

    <?php if(!$com): ?>
        <h5>No Comments</h5>
    <?php else: ?>
    	
    	<?php foreach($com as $c): ?>
    		<div class="blog-box">
    			<p><?php echo $c['comment'] ?></p>
    			<small>by : <?php echo $c['username']?></small>
    		</div>
           
           
    <?php endforeach;?>

    <?php endif; ?>

</div>

<hr>
<div class="row">
	<h5>Add Comment: </h5>
</div>
<div class="row">
	<form method="post" action="<?php echo base_url() ?>add_comment/">
		<input type="hidden" name="txtblogid" value="<?php echo $blog['blogid']; ?>">
		<input type="hidden" name="txtslug" value="<?php echo $blog['slug']; ?>">
		<textarea id="txtarea" name="txtcomment"></textarea>
	    <input type="submit" name="btnadd" value="Add Comment" class="btn btn-outline-dark mt-5 mb-5">
	</form>
</div>
