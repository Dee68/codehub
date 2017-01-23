<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Admin_Controller {
	function __construct()
	{
		parent::__construct();
		if (!($this->session->userdata('logged_in')&& $this->session->userdata('role_id') >= 1)) {
		redirect('admin/error','refresh');
	 }
	}



/*	public function add()
	{
		$data['username'] = $this->session->userdata('username');
		$data['title'] = 'CMS Category';
		$this->load->model('category_model');
		$this->load->model('activity_model');
		$this->load->model('user_model');
		$data['single'] = $this->user_model->getsingle($this->session->userdata('user_id'));
		$this->form_validation->set_rules('name','Category Name','trim|required|callback_alpha_space');
		if ($this->form_validation->run() == FALSE) {
			//show errors and remain on page
			$this->template->layout('admin','default','category/add',$data);
		}else {
			//get data from field and insert into database
			$data = ['name'=>$this->input->post('name')];
			$this->category_model->save($data);
			$field = ['resource_id'=>  $this->db->insert_id(),'type'=>'category','action'=>'added','message'=>'A new category('.$data["name"].') was created '];
                $this->activity_model->save($field);
                $this->session->set_flashdata('success','Category successfully added');
								redirect('admin/category','refresh');
		}

	}*/


	public function create($id)
	{
		$data['username'] = $this->session->userdata('username');
		$data['title'] = 'CMS Profile | create';
		 $this->load->model('profile_model');
		 $this->load->model('activity_model');
		 $this->load->model('user_model');
     $data['single'] = $this->user_model->getsingle($this->session->userdata('user_id'));
		 $id = $this->profile_model->getprofileId($this->session->userdata('user_id'));
		 $data['item'] = $this->profile_model->getsingle($id);
		 //check if profile already exists
		 if (!empty($this->profile_model->getsingle($id)->first_name && $this->profile_model->getsingle($id)->last_name)) {
			 //send info about existing profile
			 $this->session->set_flashdata('info','you already have a profile, update profile');
			 $this->template->layout('admin','default','profile/create',$data);
		 }
		 $this->form_validation->set_rules('first','First Name','trim|required');
		 $this->form_validation->set_rules('last','Last Name','trim|required');
		 $this->form_validation->set_rules('email','Email','required|valid_email');
		 $this->form_validation->set_rules('birthdate','Birthdate','required');
 	if ($this->form_validation->run() == FALSE) {
 			//show errors and remain on page
			//$data['error'] =$this->upload->display_errors('<p style="color:red">','</p>');
 			$this->template->layout('admin','default','profile/create',$data);
 		}else {


			if (!empty($_FILES['image']['name'])) {
				$config['upload_path'] = 'uploads/images/';
	  	   $config['allowed_types'] = 'gif|jpg|jpeg|png';
	  		 $config['max_width'] = 1024;
	  		 $config['max_height'] =768 ;
	  		 $config['max_size'] = 2048000;
				 $config['file_name'] = $_FILES['image']['name'];
	 		 $this->load->library('upload',$config);
			 if ($this->upload->do_upload('image')) {
			 	$uploadata = $this->upload->data();
				$picture = $uploadata['file_name'];
			}else {
				$picture = '';
			}
		 }else {
		 	$picture = '';
		 }
 			//get data from fields and insert into database
 			$data = ['first_name'=>$this->input->post('first'),
		          'last_name'=>$this->input->post('last'),
						 'email'=>$this->input->post('email'),
					   'birthdate'=>$this->input->post('birthdate'),
					   'user_id'=>$this->session->userdata('user_id'),
					   'image'=>$picture];
 			$insert = $this->profile_model->save($data);
			if ($insert) {
				$field = ['resource_id'=>  $this->db->insert_id(),'type'=>'profile','action'=>'created','message'=>'A new profile('.$data["last_name"].') was created '];
	                $this->activity_model->save($field);
				$this->session->set_flashdata('success','Image successfully uploaded');
				redirect('admin','refresh');
			}else {
				$this->session->set_flashdata('error','Error uploading image');
			}


 		}

	}
	//
	public function update($id)
	{
		$data['username'] = $this->session->userdata('username');
		$data['title'] = 'CMS Profile | Update';
		 $this->load->model('profile_model');
		 $this->load->model('activity_model');
		 $this->load->model('user_model');
		 $data['single'] = $this->user_model->getsingle($this->session->userdata('user_id'));
		 $id = $this->profile_model->getprofileId($this->session->userdata('user_id'));
		 $data['item'] = $this->profile_model->getsingle($id);
		 $this->form_validation->set_rules('first','First Name','trim|required');
		 $this->form_validation->set_rules('last','Last Name','trim|required');
		 $this->form_validation->set_rules('email','Email','required|valid_email');
		 $this->form_validation->set_rules('birthdate','Birthdate','required');
	if ($this->form_validation->run() == FALSE) {
			//show errors and remain on page
			$this->template->layout('admin','default','profile/update',$data);
		}else {
			if (!empty($_FILES['image']['name'])) {
				$config['upload_path'] = 'uploads/images/';
				 $config['allowed_types'] = 'gif|jpg|jpeg|png';
				 $config['max_width'] = 1024;
				 $config['max_height'] =768 ;
				 $config['max_size'] = 2048000;
				 $config['file_name'] = $_FILES['image']['name'];
			 $this->load->library('upload',$config);
			 if ($this->upload->do_upload('image')) {
				$uploadata = $this->upload->data();
				$picture = $uploadata['file_name'];
			}else {
				$picture = '';
			}
		 }else {
			$picture = '';
		 }
			//get data from fields and insert into database
			$data = ['first_name'=>$this->input->post('first'),
							'last_name'=>$this->input->post('last'),
						 'email'=>$this->input->post('email'),
						 'birthdate'=>$this->input->post('birthdate'),
						 'user_id'=>$this->session->userdata('user_id'),
						 'image'=>$picture
					 ];
					 $id = $this->profile_model->getprofileId($this->session->userdata('user_id'));
			  $this->profile_model->update($id,$data);
				$field = ['resource_id'=>  $this->db->insert_id(),
				'type'=>'profile','action'=>'created',
				'message'=>'A new profile('.$data["last_name"].') was created '];
									$this->activity_model->save($field);
				$this->session->set_flashdata('success','Image successfully uploaded');
				redirect('admin','refresh');



		}
	}

}
