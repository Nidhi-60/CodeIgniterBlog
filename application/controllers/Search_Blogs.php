<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Search_Blogs extends CI_Controller{
 
     function search_data($str){

          $data['blog'] = $this->search_model->search_data($str);
     
           print_r(json_encode($data));

         // return json_encode($data['blog']); 

         // $this->load->view('pages/Extra.php', $data);

       
      }
       

  }
 ?>
  