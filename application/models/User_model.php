<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
	public function __construct(){
	 $this->load->database();
	}

	public function check_user($username){
		$this->db->where('username', $username);
		$query = $this->db->get('user');
		if($query){
			return false;
		}
		else{
			return true;
		}
	}

	public function logged_user($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('user');
		return $query->row_array();
	}

	public function check_email($email){
		$this->db->where('email', $email);
		$query = $this->db->get('user');
		if($query){
			return false;
		}
		else{
			return true;
		}
	}

	public function add_user(){
		$data = array(
           'username' => $this->input->post('txtusername'),
           'email' => $this->input->post('txtemail'),
           'password'=>$this->input->post('txtpassword') 
   
		);

		return $this->db->insert('user', $data);
	}
}  

?>