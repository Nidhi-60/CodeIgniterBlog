<h4 align="center" class="mt-3">Add Category</h4>
<?php if(validation_errors()): ?>
<div class="alert alert-warning" id="msg"><?php echo validation_errors(); ?></div>
<?php endif; ?>
<div class="row justify-content-center mt-3">
<form class="form-group" method="post" action="<?php echo base_url();?>add_category/">

    <div>
      <label>Name</label>
      <input type="text" name="txtcategory" class="form-control"> 
    </div>
    <div>
    	<input type="submit" name="btnregister" class="btn btn-outline-dark mt-3" value="Add Category">
    </div>

</form>
</div>

