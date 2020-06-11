<?php 
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Blog_model extends CI_Model{
       public function __construct(){
       	 $this->load->database();
       }

       public function get_blog(){
          $this->db->order_by('blog.blogid', 'desc');
       	  $this->db->join('category', 'category.categoryid = blog.categoryid');
       	  $this->db->join('user', 'user.userid = blog.userid');
       	  $query =  $this->db->get('blog');
       	  return $query->result_array();
       }

       public function blog_by_slug($slug){
       	  $this->db->join('category', 'category.categoryid = blog.categoryid');
       	  $this->db->join('user', 'user.userid = blog.userid');
       	  $this->db->where('slug', $slug);
       	  $query = $this->db->get('blog');
       	  return $query->row_array();
       }

       public function add_blog($title, $body, $user_id, $image, $category_id){
         
         $slug = url_title($title);

         $data = array(
            'title' => $title,
            'body' => $body,
            'slug' => $slug,
            'categoryid' => $category_id,
            'blogimage' => $image,
            'userid' => $user_id
         );

         return $this->db->insert('blog', $data);
       }

      public function edit_blog($slug, $image){

         $newslug = url_title($this->input->post('txttitle'));

         $data = array(
           
             'title' => $this->input->post('txttitle'),
             'body' => $this->input->post('txtbody'),
             'slug' => $newslug,
             'categoryid' => $this->input->post('txtselect'),
             'userid' => $this->session->userdata('userid'),
             'blogimage' => $image

         );

         $this->db->where('slug', $slug);
        return $this->db->update('blog', $data);
      }

      public function delete_blog($id){

         $this->db->where('blogid', $id);
         return $this->db->delete('blog');

      }

      public function blog_by_category($id){
        $this->db->join('category', 'category.categoryid = blog.categoryid');
          $this->db->join('user', 'user.userid = blog.userid');
        $this->db->where('blog.categoryid', $id);
        $query = $this->db->get('blog');
        return $query->result_array();

      }

   }
?>