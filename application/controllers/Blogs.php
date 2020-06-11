<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Blogs extends CI_Controller{
  
     function index(){
     	$data['title'] = 'Home';

     	$data['blog'] = $this->blog_model->get_blog(); 

     	$this->load->view('includes/header', $data);
     	$this->load->view('pages/home', $data);
     	$this->load->view('includes/footer');	
     }

     function blog_by_slug($slug){
         $data['title'] = $slug;

     	 $data['blog'] = $this->blog_model->blog_by_slug($slug);

         $data['com'] = $this->comment_model->get_comment($data['blog']['blogid']); 
    

     	 $this->load->view('includes/header', $data);
     	 $this->load->view('pages/Blog_by_slug', $data);
     	 $this->load->view('includes/footer');
     }

     function add_blog(){
     	$data['title'] = 'create Blog';
        $data['category'] = $this->category_model->view_category();

        if($this->session->userdata('loggedin'))
        {
        	$user_id = $this->session->userdata('userid');
        }
        else{
        	redirect('Login/');
        }

        $this->form_validation->set_rules('txttitle', 'Blog Title', 'required');
        $this->form_validation->set_rules('txtbody', 'Blog Body', 'required');

        if ($this->form_validation->run() == FALSE) {
        	$this->load->view('includes/header', $data);
     		$this->load->view('pages/Blog_Form', $data);
     		$this->load->view('includes/footer');
        } else {
        	
            $title = $this->input->post('txttitle');
            $body = $this->input->post('txtbody'); 
            $category_id = $this->input->post('txtselect');

            $config['upload_path'] = './assets/image/posts';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '2048';
            $config['max_height'] = '2000';
            $config['max_width'] = '2000';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload()){
            	$errors=array('error'=>$this->upload->display_errors()); 
                $image='noimage.png';
            } 
            else{
            	$data=array('upload_data' => $this->upload->data());
                $image=$_FILES['userfile']['name'];
            }

            $this->blog_model->add_blog($title, $body, $user_id, $image, $category_id);
            redirect('');
        }     	
     }

    function edit_blog($slug){
        $data['title'] = 'Edit Blog';
        $data['blog'] = $this->blog_model->blog_by_slug($slug);
        $data['category'] = $this->category_model->view_category();

         if($this->session->userdata('loggedin'))
        {
        	$user_id = $this->session->userdata('userid');
        }
        else{
        	redirect('Login/');
        }


        $this->form_validation->set_rules('txttitle', 'Blog Title', 'required');
        $this->form_validation->set_rules('txtbody', 'Blog Body', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header', $data);
     		$this->load->view('pages/Edit_Form', $data);
     		$this->load->view('includes/footer');  
        } else {

        	$config['upload_path'] = './assets/image/posts';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '2048';
            $config['max_height'] = '2000';
            $config['max_width'] = '2000';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload()){
            	$errors=array('error'=>$this->upload->display_errors()); 
                $image='noimage.png';
            } 
            else{
            	$data=array('upload_data' => $this->upload->data());
                $image=$_FILES['userfile']['name'];
            }

            $this->blog_model->edit_blog($slug,$image);
            redirect('');

        }
    }

    function delete_blog($id){
    	$this->blog_model->delete_blog($id);
    	redirect('');
    }

    function blog_by_category($id){
         $data['title'] = 'Blog By Category';
     
         $data['blog'] = $this->blog_model->blog_by_category($id);

         $this->load->view('includes/header', $data);
         $this->load->view('pages/Blog_by_category', $data);
         $this->load->view('includes/footer'); 

    }

     function delete_category($id){
        $this->category_model->delete_category($id);
        redirect('category');
     }

  
 }

?>