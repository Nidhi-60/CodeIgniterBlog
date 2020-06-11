<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $title; ?>
	</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

     <!-- jQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/app.css">
</head>
<body>
  	<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
          	<li class="nav-item">
            		<a class="nav-link" href="<?php echo base_url()?>">Home</a>
          	</li>
          	<li class="nav-item">
            		<a class="nav-link" href="<?php echo base_url()?>category/">View Category</a>
          	</li>
        	  </ul>
        	  <ul class="navbar-nav ml-auto" style="margin-left:750px;">
              <?php if($this->session->userdata('loggedin')): ?>
            	  	<li class="nav-item">
                		<a class="nav-link" href="<?php echo base_url()?>add_blog/" >Create Blog</a>
              	</li>
              	<li class="nav-item">
                		<a class="nav-link" href="<?php echo base_url()?>add_category/">Create Category</a>
              	</li>
                 <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>Logout">Logout</a>
                </li>
           
                <li class="nav-item">
                    <a class="nav-link disabled text-dark"><?php echo $this->session->userdata('username'); ?></a>
                </li>

             <?php endif; ?>
             <?php if(!$this->session->userdata('loggedin')): ?>
            	  	<li class="nav-item">
                		<a class="nav-link" href="<?php echo base_url()?>Registration">Register</a>
              	</li>
              	<li class="nav-item">
                		<a class="nav-link" href="<?php echo base_url()?>Login">Login</a>
              	</li>
          <?php endif; ?>
        	  </ul>
          </div>
  	</nav>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
      <div class="input-group">
      <div class="input-group-prepend ml-auto">
        <span class="input-group-text bg-warning">
          <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
          search
        </span>
      </div>
      <input type="text" name="txtsearch" id="searchbox" autocomplete="off">
    </div>
    </nav>

    <div id="result"></div>
  
  <div class="container">


   <div class="mt-3">
      <?php if($this->session->flashdata('valid_login')): ?>
         <div class="alert alert-info"  id="msg"><?php echo $this->session->flashdata('valid_login'); ?></div>
      <?php endif; ?> 
   </div>

   <div class="mt-3">
      <?php if($this->session->flashdata('invalid_login')): ?>
         <div class="alert alert-danger"  id="msg"><?php echo $this->session->flashdata('invalid_login'); ?></div>
      <?php endif; ?> 
   </div>

   <div class="mt-3">
      <?php if($this->session->flashdata('valid_Registration')): ?>
         <div class="alert alert-info"  id="msg"><?php echo $this->session->flashdata('valid_Registration'); ?></div>
      <?php endif; ?> 
   </div>

   <div class="mt-3">
      <?php if($this->session->flashdata('logout')): ?>
         <div class="alert alert-info" id="msg"><?php echo $this->session->flashdata('logout'); ?></div>
      <?php endif; ?> 
   </div>

