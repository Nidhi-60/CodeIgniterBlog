<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model{
  public function __construct(){
  		$this->load->database();
  }

  public function get_comment($id){
   $this->db->join('user', 'user.userid = comments.userid'); 
   $this->db->where('blogid', $id);
   $query = $this->db->get('comments');
   return $query->result_array();

  }
 
  public function add_comment(){

     $comment = $this->input->post('txtcomment');
     $blogid = $this->input->post('txtblogid');
     $data = array(

       'comment' => $comment,
       'blogid' => $blogid,
       'userid' => $this->session->userdata('userid')
 
    );

     return $this->db->insert('comments', $data);

  }
}

?>