<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {


	public function index()
	{
		if (!($this->session->userdata('logged_in')&& $this->session->userdata('role_id') == 3)) {
		 redirect('admin/user/login');
	 }
		$this->load->model('user_model');
		$this->load->model('role_model');
		$data['single'] = $this->user_model->getsingle($this->session->userdata('user_id'));
		$data['username'] = $this->session->userdata('username');
		$data['users'] = $this->user_model->dojoin();
	  $data['title'] = 'CMS Admin Users';
	 $this->template->layout('admin','default','user/index',$data);
	}

	public function edit($id)
	{
		$this->load->model('user_model');
		$this->load->model('activity_model');
		$this->load->model('role_model');
		$this->load->library('bcrypt');//enables hashing of password
		$data['title'] = 'CMS Admin | user Edit';
			$data['single'] = $this->user_model->getsingle($this->session->userdata('user_id'));
		$data['item'] = $this->user_model->getsingle($id);
		$data['username'] = $this->session->userdata('username');
		//check for valid input data
		$this->form_validation->set_rules('username','User Name','trim|required');
		$this->form_validation->set_rules('useremail','User Email','trim|required|valid_email');
		$this->form_validation->set_rules('username','User Name','required|greater_than[0]');
		$this->form_validation->set_rules('username','User Name','required');
		if ($this->form_validation->run() == FALSE) {
			//display errors
			$options = [];
			$options[0] = 'select role';
			$role_options = $this->role_model->getall();
			foreach ($role_options as $role) {
				$options[$role->id] = $role->role_name;
			}
			$data['options'] = $options;
			$this->template->layout('admin','default','user/edit',$data);
		}else {
			//collect input data and insert into database
			$password = $this->input->post('password');
			$data = [
				'username'=>$this->input->post('username'),
				'useremail'=>$this->input->post('useremail'),
				'role_id'=>$this->input->post('role'),
				'password'=>$this->bcrypt->hash_password($password)
			];
			$this->user_model->update($id,$data);
			$field = ['resource_id'=>  $this->db->insert_id(),'type'=>'user','action'=>'updated','message'=>'User('.$data["username"].') data was updated '];
                $this->activity_model->save($field);
								redirect('admin/user','refresh');

		}
		//**

	}
	public function delete($id)
	{
		$this->load->model('user_model');
	  $this->load->model('activity_model');
		$data['name'] = $this->user_model->getsingle($id)->username;
		$field = ['resource_id'=>  $this->db->insert_id(),
		'type'=>'user',
		'action'=>'deleted','message'=>'A user('.$data["name"].') was deleted '];
		$result = $this->user_model->delete($id);
		if ($result) {
			$this->activity_model->save($field);
			$this->session->set_flashdata('error','User successfully deleted');
			redirect('admin/user','refresh');
		}
	}

	public function login()
	{
		$this->load->model('user_model');
		$this->load->model('activity_model');
		$this->load->library('bcrypt');
		$data['title'] = 'CMS ADMIN LOGIN';
		//validate login form
		$this->form_validation->set_rules('useremail','UserEmail','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');
		if ($this->form_validation->run() == FALSE) {
			//show errors
			$this->template->layout('admin','login','login',$data);
		}else {
			$email = $this->input->post('useremail');
  		$password = $this->input->post('password');
			$user_data = $this->user_model->alloweduser($email);
  		$result = $this->user_model->check_user($email,$password);
			if ($result) {
				//create usersession data
				$user = [
					'username'=>$user_data->username,
					'logged_in'=> 1,
					'useremail'=>$user_data->useremail,
					'role_id'=>$user_data->role_id,
          'user_id'=>$user_data->id
				];
				$logged = $this->session->set_userdata($user);
				redirect('admin','refresh');
			}else {
				//create error
				$this->session->set_flashdata('error','Invalid login');
				redirect('admin/user/login','refresh');
			}

		}

	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('useremail');
		$this->session->sess_destroy();
		redirect('admin/login','refresh');
	}


}
