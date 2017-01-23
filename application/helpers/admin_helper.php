<?php if(!defined('BASEPATH')) exit("No script access allowed");
//returns username from a givei Id
     function getusername($id)
    {
        $CI = & get_instance();
        $CI->load->database();
        $CI->db->where('id',$id);
        $query = $CI->db->get('user');
        if ($query->num_rows()> 0){
            return $query->row()->username;
        }  else {
            return false;
        }
    }
    //returns a userId from the page table
    function getpageauth($id)
   {
       $CI = & get_instance();
       $CI->load->database();
       $CI->db->where('id',$id);
       $query = $CI->db->get('page');
       if ($query->num_rows()> 0){
           return $query->row()->user_id;
       }  else {
           return false;
       }
   }
