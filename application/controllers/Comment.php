<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
  class Comment extends CI_Controller{

     function add_comment(){

          if(!$this->session->userdata('loggedin'))
          {
        	redirect('Login/');
          }

        $this->form_validation->set_rules('txtcomment', 'Comment', 'required');

        $slug = $this->input->post('txtslug'); 
        if ($this->form_validation->run() == FALSE) {
        	redirect('blog/'.$slug);
        } else {
        	
        	$this->comment_model->add_comment();
        	redirect('blog/'.$slug); 
        }

     }

  }


?>