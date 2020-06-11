<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {	

   function add_category(){
   	  $data['title'] = 'Add Category';
       if($this->session->userdata('loggedin'))
            {
              $user_id = $this->session->userdata('userid');  
            }
            else{
              redirect('Login/');
            }

       $this->form_validation->set_rules('txtcategory', 'Category Name', 'required');

      
       if ($this->form_validation->run() == FALSE) {
       		$this->load->view('includes/header', $data);
     		$this->load->view('pages/Category_Form');
     		$this->load->view('includes/footer');
       } else {
          	$categoryname = $this->input->post('txtcategory');
 
       	   $this->category_model->add_category($categoryname, $user_id);
       	   redirect('category');
       }	
   }

   function view_category(){
        $data['title'] = 'Category';

        $data['category'] = $this->category_model->view_category(); 
    	  $this->load->view('includes/header', $data);
   		  $this->load->view('pages/Display_category', $data);
   		  $this->load->view('includes/footer');

   }   

 }
?>