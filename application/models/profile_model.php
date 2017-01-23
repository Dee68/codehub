<?php defined('BASEPATH') OR exit("No direct access aloowed to script");
 /**
  *
  */
 class Profile_model extends My_model
 {

   function __construct()
   {
     parent::__construct();
     $this->table = 'profile';
     $this->pkey = 'id';
   }
 public function getprofileId($id)
 {
   $this->db->where('user_id',$id);
   return $this->db->get($this->table)->row()->id;
 }
 }
