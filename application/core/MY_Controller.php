<?php defined('BASEPATH') OR exit("No direct script access allowed");
 /**
  *
  */
 class MY_Contrller extends CI_Controller
 {

   function __construct()
   {
     parent::__construct();
   }
 }
 /**
  *
  */
 class Public_Controller extends MY_Contrller
 {

   function __construct()
   {
     parent::__construct();
     $this->blogpost = 'Blog Post Title';
     $this->load->library('menu');
     $this->pages = $this->menu->getpages();


   }
 }
 /**
  *
  */
 class Admin_Controller extends MY_Contrller
 {

   function __construct()
   {
     parent::__construct();
   }
 }
