<h4 align="center" class="mt-3">Edit Blog</h4>
<?php if(validation_errors()): ?>
<div class="alert alert-warning"><?php echo validation_errors(); ?></div>
<?php endif; ?>
<div class="row justify-content-center mt-3">
<form class="form-group" method="post" action="<?php echo base_url();?>edit/<?php echo $blog['slug']?>">

    <div>
      <label>Title : </label>
      <input type="text" name="txttitle" class="form-control" value="<?php echo $blog['title']?>"> 
    </div>
    <div>
      <label>Body: </label>
      <textarea id="txtarea" class="form-control" name="txtbody"><?php echo $blog['body'] ?></textarea> 
    </div>
    <div>
       <label>choose Category: </label>
       <select name="txtselect" class="form-control">
         <?php foreach($category as $c):?>
         <option value="<?php echo $c['categoryid']; ?>"><?php echo $c['name'] ?></option>
       <?php endforeach;?>
       </select> 
    </div>
    <div>
      <label>Select Image: </label>
      <input type="file" name="userfile" class="form-control"> 
    </div>
    <div>
    	<input type="submit" name="btnregister" class="btn btn-outline-dark mt-3" value="Edit Blog">
    </div>

</form>
</div>

