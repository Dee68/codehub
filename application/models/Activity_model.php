<?php  defined('BASEPATH') OR exit("No direct access to script allowed");
 /**
  *
  */
 class Activity_model extends My_model
 {

   function __construct()
   {
     parent::__construct();
     $this->pkey = 'id';
     $this->table = 'activity';
   }
 }
