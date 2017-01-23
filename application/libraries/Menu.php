<?php defined('BASEPATH') OR exit("No script direct access allowed");
 /**
  *
  */
 class Menu
 {
  private $CI;
   public function __construct()
   {
     $this->CI =& get_instance();
     $this->CI->config->item('base_url');
   }
   public function getpages()
   {
     $this->CI->load->model('page_model');
     $pages = $this->CI->page_model->getpage_menu();
     return $pages;
   }
 }
