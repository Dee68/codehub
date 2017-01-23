<?php defined('BASEPATH') OR exit("No direct access allowed to script");
 /**
  *
  */
 class Template
 {
   private $ci;
   function __construct()
   {
     $this->ci = & get_instance();
   }
   /*@param $loc - location of folder
   *@param $tmpl_name - template name
   *@param $view - view file to render
   *@param $data - array of data to include in view file.
   *@return loads view
   */
   public function layout($loc,$tmpl_name,$view,$data = NULL)
   {
     if ($loc == 'admin' && $tmpl_name == 'default') {
       $tmpl_name = 'admin';
     }
     if ($loc == 'public' && $tmpl_name == 'default') {
       $tmpl_name = 'public';
     }
     $data['content'] = $loc.'/'.$view;
     $this->ci->load->view('/templates/'.$tmpl_name,$data);

   }
 }
