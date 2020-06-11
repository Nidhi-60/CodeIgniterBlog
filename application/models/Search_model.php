<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Search_model extends CI_Model{
     public function __construct(){
       	 $this->load->database();
       }

  
     public function search_data($str){
        
        $this->db->like('title', $str);
        $query = $this->db->get('blog'); 
        return $query->result_array();

     }

}


?>