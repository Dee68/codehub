<?php defined('BASEPATH') OR exit("No direct access allowed to script");
/**
 *
 */
class Page_model extends My_model
{

  function __construct()
  {
    parent::__construct();
    $this->pkey = 'id';
    $this->table = 'page';
  }

  public function getpage_menu()
  {

    $array = ['in_menu'=>1,'is_published'=>1,'is_featured'=>1];
    $this->db->order_by('grade','asc');
     $this->db->where($array);
     $query = $this->db->get($this->table);
    return $query->result();

  }

  public function getby_slug($slug)
  {

    $array = ['slug'=>$slug,'is_published'=>1];
    $this->db->where($array);
    $this->db->limit(1);
    $query = $this->db->get($this->table);
     if($query->num_rows() == 1){
       return $query->row();
     }else {
       return false;
     }


  }
  public function featured()
  {
      $this->db->where('is_featured',1);
      $this->db->order_by('grade','asc');
      return $this->db->get($this->table)->result();
  }
}
