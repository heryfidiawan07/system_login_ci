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
		$this->permissions = $this->PermissionModel->permission($except = ['']);
		$this->actions     = $this->ActionModel->action($except = ['']);

		$this->load->model('UserModel');
	}

	public function index() {
		$data['auth'] 		 = $this->auth;
		$data['title'] 		 = 'USER MANAGEMENT';
		$data['permissions'] = $this->permissions;
		$data['roles']       = $this->db->get('roles')->result();
		$this->load->view('user/index', $data);
	}

	public function datatables() {
		$this->load->model('UserModel');
		$id = $this->input->get('id');
        $where  = FALSE;
        if ($id) {
            $where = ['id' => $id];
        }

        $users = $this->UserModel->make_datatables($where);
        $data  = [];
        $i     = $_POST['start']+1;
        foreach ($users as $user) {
            $sub    = [];
            $sub[]  = $i++;
            $sub[]  = $user->name;
            $sub[]  = $user->username;
            $sub[]  = $user->email;
            $sub[]  = '<button type="button" class="btn btn-primary btn-sm btn_edit" id="'.$user->username.'" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-edit"></i></button>';
            $sub[]  ='<button type="button" class="btn btn-danger btn-sm btn_delete" id="'.$user->username.'"><i class="fas fa-trash"></i></button>';
            $data[] = $sub;
        }

        $output = [
            'draw'              => intval($_POST['draw']),
            'recordsTotal'      => $this->UserModel->get_all_data(),
            'recordsFiltered'   => $this->UserModel->get_filtered_data($where),
            'data'              => $data
        ];
        // header('Content-Type: application/json');
        echo json_encode($output);
	}

	public function store() {
		if (!$this->actions) {
			$data = ['error' => 'Opss... Permission denied action !'];
		}else {
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
	        	$roles = $this->input->post('roles', true);
	        	if (! $roles) {
	        		$data = ['error' => 'Role must be required !'];
	        	}else {
	        		$user_data = [
							'name' 	   => htmlspecialchars($this->input->post('name', true)),
							'username' => htmlspecialchars($this->input->post('username', true)),
							'email'    => htmlspecialchars($this->input->post('email', true)),
							'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
						];
					if ($this->UserModel->create($user_data)) {
						$user_id = $this->db->insert_id();
						foreach ($roles as $role_id) {
		        			$this->db->insert('user_role', ['user_id' => $user_id, 'role_id' => $role_id]);
		        		}
					}
					$data = ['success' => 'User successfully added'];
	        	}
	        }
		}
        echo json_encode($data);
	}

	public function get_user($username) {
		$user = $this->UserModel->where(['username' => $username])->row();
		if (! $user) {
			$data = ['error' => 'Data not found !'];
		}else {
			$user_role = $this->db->get_where('user_role',['user_id' => $user->id])->result();
			$data = ['user' => $user, 'user_role' => $user_role];
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
		if (!$this->actions) {
			$data = ['error' => 'Opss... Permission denied action !'];
		}else {
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
		        	}else {
		        		$roles = $this->input->post('roles_edit', true);
		        		if (! $roles) {
			        		$data = ['error' => 'Role must be required !'];
			        	}else {
			        		$user_data = [
									'name' 	   => htmlspecialchars($this->input->post('name_edit', true)),
									'username' => htmlspecialchars($this->input->post('username_edit', true)),
									'email'    => htmlspecialchars($this->input->post('email_edit', true)),
									'password' => password_hash($this->input->post('password_edit'), PASSWORD_DEFAULT),
								];
			        		if ($this->UserModel->update($user->id, $user_data)) {
			        			if ($this->db->delete('user_role', ['user_id' => $user->id])) {
									foreach ($roles as $role_id) {
					        			$this->db->insert('user_role', ['user_id' => $user->id, 'role_id' => $role_id]);
					        		}
			        			}else {
									$data = ['error' => 'Opss... Validation error ! !'];
								}
							}
							$data = ['success' => 'User successfully edited'];
			        	}
		        	}
		        }
			}
		}
		echo json_encode($data);
	}

	public function destroy($username) {
		if (!$this->actions) {
			$data = ['error' => 'Opss... Permission denied action !'];
		}else {
			$user = $this->UserModel->where(['username' => $username])->row();
			if (! $user) {
				$data = ['error' => 'Data not found !'];
			}else {
				$this->UserModel->destroy(['username' => $username]);
				$data = ['success' => 'User successfully deleted'];
			}
		}
		echo json_encode($data);
	}

}