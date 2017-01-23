<?php defined('BASEPATH') OR exit("No direct access allowed to script");
/**
 *
 */
class Category_model extends My_model
{

  function __construct()
  {
    parent::__construct();
    $this->pkey = 'id';
    $this->table = 'category';
  }
}
