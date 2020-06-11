<div class="row mt-3 justify-content-center">
   <h4>Category Of Blogs</h4>
</div>
<div class="row mt-3 justify-content-center">
     <ul class="list-group">
     	<?php foreach($category as $c):?>
     	<li class="list-group-item mb-3"><a href="<?php echo base_url();?>category/<?php echo $c['categoryid']?>" class="alert-link"><?php echo $c['name'] ?></a>&nbsp;&nbsp;
            <?php if($this->session->userdata('loggedin')): ?>
            <?php if($c['userid'] == $this->session->userdata('userid')): ?>
                <a href="<?php echo base_url() ?>delete_category/<?php echo $c['categoryid'];?>" class="btn btn-outline-danger">Delete</a>
            <?php endif; ?>
        <?php endif; ?>
     	</li>
        <?php endforeach;?>
     </ul>
</div>