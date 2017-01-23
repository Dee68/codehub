<?php defined('BASEPATH') OR exit("No direct access allowed to script");
 /**
  *
  */
 class Role extends Admin_Controller
 {

   function __construct()
   {
     parent::__construct();
     if (!($this->session->userdata('logged_in')&& $this->session->userdata('role_id') == 3)) {
     redirect('admin/error','refresh');

    }
   }

   public function index()
   {

     $data['username'] = $this->session->userdata('username');
     $this->load->model('role_model');
     $this->load->model('user_model');
     $data['single'] = $this->user_model->getsingle($this->session->userdata('user_id'));
     $data['roles'] = $this->role_model->getall();
     $data['title'] = "CMS Admin | Roles";
     $this->template->layout('admin','default','role/index',$data);
   }

   public function add()
   {
     if ($this->session->userdata('logged_in')) {
    	$data['username'] = $this->session->userdata('username');
     }
     $this->load->model('role_model');
     $this->load->model('activity_model');
     $this->load->model('user_model');
     $data['single'] = $this->user_model->getsingle($this->session->userdata('user_id'));
     $this->form_validation->set_rules('name','Role Name','trim|required');
     $this->form_validation->set_rules('description','Description','trim|required');
     $data['title'] = 'CMS Admin Add Roles';
     if ($this->form_validation->run() == FALSE) {
       //remain on same page and show errors
        $this->template->layout('admin','default','role/add',$data);
     }else {
       //get input values from form and insert to database
       $data = [
         'role_name'=>$this->input->post('name'),
         'description'=>$this->input->post('description')
       ];
       $this->role_model->save($data);
       $field = [
         'resource_id'=>  $this->db->insert_id(),
         'type'=>'role',
         'action'=>'added',
         'message'=>'A new role('.$data["role_name"].') was created '
       ];
       $this->activity_model->save($field);
       $this->session->set_flashdata('success','Role successfully added ');
       redirect('admin/role','refresh');
     }

   }

   public function edit($id)
   {
     if ($this->session->userdata('logged_in')) {
    	$data['username'] = $this->session->userdata('username');
     }
     $this->load->model('role_model');
     $this->load->model('activity_model');
     $this->load->model('user_model');

     $this->form_validation->set_rules('name','Role Name','trim|required');
     $this->form_validation->set_rules('description','Description','trim|required');
     $data['title'] = 'CMS Admin Add Roles';
     $data['item'] = $this->role_model->getsingle($id);
      $data['single'] = $this->user_model->getsingle($this->session->userdata('user_id'));
     if ($this->form_validation->run() == FALSE) {
       //remain on same page and show errors
        $this->template->layout('admin','default','role/edit',$data);
     }else {
       //get input values from form and insert to database
       $data = [
         'role_name'=>$this->input->post('name'),
         'description'=>$this->input->post('description')
       ];
       $this->role_model->update($id,$data);
       $field = [
         'resource_id'=>  $this->db->insert_id(),
         'type'=>'role',
         'action'=>'added',
         'message'=>'The role('.$data["role_name"].') was updated '
       ];
       $this->activity_model->save($field);
       redirect('admin/role','refresh');
     }

   }

   public function delete($id)
   {
     if ($this->session->userdata('logged_in')) {
    	$data['username'] = $this->session->userdata('username');
     }
     $this->load->model('role_model');
     $this->load->model('activity_model');
     $data['name'] = $this->role_model->getsingle($id)->role_name;
     $field = ['resource_id'=>  $this->db->insert_id(),
     'type'=>'role',
     'action'=>'deleted','message'=>'The page('.$data["name"].') was deleted '];
     $result = $this->role_model->delete($id);
     if ($result) {
       $this->activity_model->save($field);
       $this->session->set_flashdata('error','Role successfully deleted');
       redirect('admin/role','refresh');
     }
   }
 }
