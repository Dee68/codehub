<?php defined('BASEPATH') OR exit("No direct access allowed to script");
 /**
  *
  */
 class Error extends Admin_Controller
 {

   function __construct()
   {
     parent::__construct();

   }

   public function index()
   {
     $this->load->model('user_model');
     $data['single'] = $this->user_model->getsingle($this->session->userdata('user_id'));
     $data['username'] = $this->session->userdata('username');
     $data['title'] = '403 access forbidden';
   $this->template->layout('admin','error','errors/index',$data);
   }




 }
