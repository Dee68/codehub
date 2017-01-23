<?php defined('BASEPATH') OR exit("No direct access allowed to script");
 /**
  *
  */
 class Role_model extends My_model
 {

   function __construct()
   {
     parent::__construct();
     $this->pkey = 'id';
     $this->table = 'role';
   }
 }
