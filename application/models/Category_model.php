<?php 
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Category_model extends CI_Model{
       public function __construct(){
       	 $this->load->database();
       }

       public function add_category($categoryname, $user_id){
        
          $data = array(
             'name' => $categoryname,
             'userid' => $user_id
          );

          return $this->db->insert('category', $data);
      
       }

       public function view_category(){
       	  $query = $this->db->get('category');
       	  return $query->result_array();
       }

       public function delete_category($id){
          $this->db->where('categoryid', $id);
          $this->db->delete('category');
          $this->db->where('categoryid', $id);
          $this->db->delete('blog');
       }
   }

?>