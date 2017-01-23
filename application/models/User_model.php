<?php defined('BASEPATH') OR exit("No direct access aloowed to script");
 /**
  *
  */
 class User_model extends My_model
 {

   function __construct()
   {
     parent::__construct();
     $this->table = 'user';
     $this->pkey = 'id';
   }
   //join user an role tables
   public function dojoin()
   {
     $this->db->select($this->table.'.id'.','.'username'.','.'useremail'.','.'role_name');
     $this->db->from($this->table);
     $this->db->join('role', 'role'.'.id='.$this->table.'.role_id');
     return $this->db->get()->result();

   }
   //gets a user data from database from his/her  email
   public function alloweduser($email = NULL)
   {
     $this->db->where('useremail',$email);
     return $this->db->get($this->table)->row();
   }
   //checks validity of input data correspondence to database
   public function check_user($email = NULL,$password = NULL)
   {
     $this->load->library('bcrypt');
     $email = $this->input->post('useremail',TRUE);
     $password = $this->input->post('password',TRUE);
     $result = $this->alloweduser($email);
     if ($this->bcrypt->check_password($password, $result->password)) {
       return TRUE;
     }else {
       return FALSE;
     }

   }
   
   public function getusername($id) 
   {
       $this->db->where($this->pkey,$id);
       return $this->db->get($this->table)->row()->username;
   }
 }
