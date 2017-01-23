<?php defined('BASEPATH') OR exit("No direct access to script allowed");
/**
 *
 */
class My_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->pkey = "";
    $this->table = "";
  }
  //get number of rows in database
  public function getcount()
  {
    return $this->db->count_all($this->table);
  }
  //get data from database table
  public function getall()
  {
    $query = $this->db->get($this->table);
    return $query->result();
  }
  //gets a row from the table
  public function getsingle($id)
  {
    $this->db->where($this->pkey,$id);
    $query = $this->db->get($this->table);
    return $query->row();
  }
  //insert data into table
  public function save($data)
  {
    $this->db->insert($this->table,$data);
    return $this->db->affected_rows();
  }
  //updates a row in the database table
  public function update($input,$data=NULL)
  {
    $this->db->where($this->pkey,$input);
    $this->db->update($this->table,$data);
  }
  //delete a row from a table in the database
  public function delete($id)
  {
    $this->db->where($this->pkey,$id);
    $this->db->delete($this->table);
    return $this->db->affected_rows();
  }
  /*gets a limited set of rows with a given offset from a table
  *enables pagination
  */
  public function getpaginated($limit = NULL,$offset = NULL)
  {
    $table = $this->table;
    return $this->db->get($table,$limit,$offset)->result();
  }
}
