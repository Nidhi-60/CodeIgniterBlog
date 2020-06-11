<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
  
  class User extends CI_Controller{
  
     function User_Registration(){
     	$data['title'] = 'Registration';

        $this->form_validation->set_rules('txtusername', 'Username', 'required|min_length[3]|callback_check_user');
        $this->form_validation->set_rules('txtemail', 'User Email', 'required|callback_check_email');
        $this->form_validation->set_rules('txtpassword', 'Password', 'required');

        $username = $this->input->post('txtusername');
        $email = $this->input->post('txtemail');

        if ($this->form_validation->run() == FALSE) {
           	$this->load->view('includes/header', $data);
     		$this->load->view('pages/Registration_Form');
     		$this->load->view('includes/footer');	
        } else {
        	$this->user_model->add_user();
        	$this->session->set_flashdata('valid_Registration', 'Successfully Registered..');
        	redirect('Blogs');
        }	
     }

     function User_Login(){
     	$data['title'] = 'Login';

     	$this->form_validation->set_rules('txtusername', 'Username', 'required|min_length[3]');
        $this->form_validation->set_rules('txtpassword', 'User Password', 'required');

        $username = $this->input->post('txtusername');
        $password = $this->input->post('txtpassword');

        if ($this->form_validation->run() == FALSE) {
        	$this->load->view('includes/header', $data);
     		$this->load->view('pages/Login_Form');
     		$this->load->view('includes/footer');
        } else {
        	$user = $this->user_model->logged_user($username, $password);
        	if($user){
        		$user = array(
                  'userid'=>$user['userid'],
                  'username'=>$user['username'],
                  'loggedin'=> true
        		);
        		$this->session->set_userdata($user);
        		$this->session->set_flashdata('valid_login', 'Successfully Login');
        		redirect('Blogs');
        	}
        	else{
        	$this->session->set_flashdata('invalid_login', 'Try again..!! You are not valid user');
        	redirect('Login/');
        	}
        }
     }


    public function User_Logout(){
    	$this->session->unset_userdata('userid');
    	$this->session->unset_userdata('username');
    	$this->session->unset_userdata('loggedin');
    	$this->session->set_flashdata('logout', 'Successfully Logout.');
    	redirect('Login/');
    }

      function check_user($username){
           $username_check = $this->user_model->check_user($username);
           if($username_check){
           	return false;
           }
           else{
           	return true;
           }
        }

        function check_email($email){
           $email_check = $this->user_model->check_email($email);
           if($email_check){
           	return false;
           }
           else{
           	return true;
           }
        }
  }


 ?>