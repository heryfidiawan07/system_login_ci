<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public $auth;
	public $permissions;
	public $actions;

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');

		$this->load->model('AuthModel');
		$this->load->model('PermissionModel');
		$this->load->model('ActionModel');

		$this->auth 	   = $this->AuthModel->auth();
		$this->permissions = $this->PermissionModel->permission();
		$this->actions     = $this->ActionModel->action();

		$this->load->model('UserModel');
	}

	public function store() {
		$this->form_validation->set_rules('name','name','required');
        $this->form_validation->set_rules('username','username','required|is_unique[users.username]', [
				'is_unique' => 'This username has already registered !'
			]
		);
        $this->form_validation->set_rules('email','email','required|is_unique[users.email]', [
				'is_unique' => 'This email has already registered !'
			]
		);
        $this->form_validation->set_rules('password','password','required|min_length[6]', [
        		'min_length' => 'Min 6 character !'
	        ]
	    );
        if ($this->form_validation->run() == FALSE) {
            $data = ['error' => validation_errors()];
        }else {
			$this->UserModel->create([
					'name' 	   => htmlspecialchars($this->input->post('name', true)),
					'username' => htmlspecialchars($this->input->post('username', true)),
					'email'    => htmlspecialchars($this->input->post('email', true)),
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				]);
			$data = ['success' => 'User successfully added'];
        }
        echo json_encode($data);
	}

	public function get_user($username) {
		$user = $this->UserModel->where(['username' => $username])->row();
		if (! $user) {
			$data = ['error' => 'Data not found !'];
		}else {
			$data = $user;
		}
		echo json_encode($data);
	}

	function unique($field, $data, $id) {
        $result = $this->UserModel->unique_validation($field, $data, $id);
        if($result == 0)
            $response = true;
        else {
            $response = false;
        }
        return $response;
    }    

	public function update($username) {
		$user = $this->UserModel->where(['username' => $username])->row();
		if (!$user) {
			$data = ['error' => 'Data not found !'];
		}else {
			$this->form_validation->set_rules('name_edit','name','required');
	        $this->form_validation->set_rules('username_edit','username','required');
	        $this->form_validation->set_rules('email_edit','email','required');
	        $this->form_validation->set_rules('password_edit','password','required|min_length[6]', [
	        		'min_length' => 'Min 6 character !'
		        ]
		    );
	        if ($this->form_validation->run() == FALSE) {
	            $data = ['error' => validation_errors()];
	        }else {
	        	if ($this->unique('username', $this->input->post('username_edit'), $user->id) == FALSE) {
					$data = ['error' => 'Sorry, This username already registered / has been created !'];
				}else if ($this->unique('email', $this->input->post('email_edit'), $user->id) == FALSE) {
					$data = ['error' => 'Sorry, This email already registered / has been created !'];
	        	}
	        	else {
					$this->UserModel->update($user->id, [
							'name' 	   => htmlspecialchars($this->input->post('name_edit', true)),
							'username' => htmlspecialchars($this->input->post('username_edit', true)),
							'email'    => htmlspecialchars($this->input->post('email_edit', true)),
							'password' => password_hash($this->input->post('password_edit'), PASSWORD_DEFAULT),
						]);
					$data = ['success' => 'User successfully edited'];
	        	}
	        }
		}
		echo json_encode($data);
	}

	public function destroy($username) {
		$user = $this->UserModel->where(['username' => $username])->row();
		if (! $user) {
			$data = ['error' => 'Data not found !'];
		}else {
			$this->UserModel->destroy(['username' => $username]);
			$data = ['success' => 'User successfully deleted'];
		}
		echo json_encode($data);
	}

}