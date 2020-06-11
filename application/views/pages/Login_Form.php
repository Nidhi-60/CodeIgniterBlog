<h4 align="center" class="mt-3">User Login</h4>
<?php if(validation_errors()): ?>
<div class="alert alert-warning"><?php echo validation_errors(); ?></div>
<?php endif; ?>
<div class="row justify-content-center mt-3">
<form class="form-group" method="post" action="<?php echo base_url();?>Login/">

    <div>
      <label>Username</label>
      <input type="text" name="txtusername" class="form-control"> 
    </div>
    <div>
      <label>password</label>
      <input type="Password" name="txtpassword" class="form-control"> 
    </div>
    <div>
    	<input type="submit" name="btnregister" class="btn btn-outline-dark mt-3" value="Login">
    </div>

</form>
</div>

