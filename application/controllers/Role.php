<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

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

		$this->load->model('RoleModel');
	}

	public function index() {
		$data['auth'] 		 = $this->auth;
		$data['title'] 		 = 'ROLE MANAGEMENT';
		$data['permissions'] = $this->permissions;
		$data['menus']       = $this->db->get('menus')->result();
		$data['actions']     = $this->db->get('actions')->result();
		$this->load->view('role/index', $data);
	}

	public function datatables() {
		$id = $this->input->get('id');
        $where  = FALSE;
        if ($id) {
            $where = ['id' => $id];
        }

        $roles = $this->RoleModel->make_datatables($where);
        $data  = [];
        $i     = $_POST['start']+1;
        foreach ($roles as $role) {
            $sub    = [];
            $sub[]  = $i++;
            $sub[]  = $role->name;
            $sub[]  = $role->description;
            $sub[]  = '<button type="button" class="btn btn-primary btn-sm btn_edit" id="'.$role->id.'" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-edit"></i></button>';
            $sub[]  ='<button type="button" class="btn btn-danger btn-sm btn_delete" id="'.$role->id.'" data-name="'.$role->name.'"><i class="fas fa-trash"></i></button>';
            $data[] = $sub;
        }

        $output = [
            'draw'              => intval($_POST['draw']),
            'recordsTotal'      => $this->RoleModel->get_all_data(),
            'recordsFiltered'   => $this->RoleModel->get_filtered_data($where),
            'data'              => $data
        ];
        // header('Content-Type: application/json');
        echo json_encode($output);
	}

	public function store() {
		if (!$this->actions) {
			$data = ['error' => 'Opss... Permission denied action !'];
		}else {
	        $this->form_validation->set_rules('name','name','required|is_unique[roles.name]', [
					'is_unique' => 'This name has already registered !'
				]
			);
	        $this->form_validation->set_rules('description','description','required');
	        if ($this->form_validation->run() == FALSE) {
	            $data = ['error' => validation_errors()];
	        }else {
	        	$menus_id = $this->input->post('menus', true);
	        	if (! $menus_id) {
	        		$data = ['error' => 'Opss... Minimum 1 menu must be required ! !'];
	        	}else {
		        	$role_data = [
							'name' => htmlspecialchars($this->input->post('name', true)),
							'description' => htmlspecialchars($this->input->post('description', true)),
						];
					if ($this->RoleModel->create($role_data)) {
						$role_id = $this->db->insert_id();
						$actions = [];
			        	foreach ($menus_id as $menu_id) {
			        		$this->db->insert('role_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);
			        		$actions[] = $this->input->post($menu_id.'_actions', true);
			        	}
			        	for ($i=0; $i < count($menus_id) ; $i++) { 
			        		for ($a=0; $a < count($actions[$i]); $a++) { 
			        			$this->db->insert('role_menu_action', ['role_id' => $role_id, 'menu_id' => $menus_id[$i], 'action_id' => $actions[$i][$a]]);
			        		}
			        	}
					}
					$data = ['success' => 'Role successfully created'];
	        	}
	        }
		}
        echo json_encode($data);
	}

	public function get_role($id) {
		$role = $this->RoleModel->where(['id' => $id])->row();
		if (! $role) {
			$data = ['error' => 'Data not found !'];
		}else {
			$role = $this->RoleModel->where(['id' => $id])->row();
			$role_menu = $this->db->get_where('role_menu',['role_id' => $role->id])->result();
			$role_menu_action = $this->db->get_where('role_menu_action',['role_id' => $role->id])->result();
			$data = ['role' => $role, 'role_menu' => $role_menu, 'role_menu_action' => $role_menu_action];
		}
		echo json_encode($data);
	}

	function unique($field, $data, $id) {
        $result = $this->RoleModel->unique_validation($field, $data, $id);
        if($result == 0)
            $response = true;
        else {
            $response = false;
        }
        return $response;
    }    

	public function update($id) {
		if (!$this->actions) {
			$data = ['error' => 'Opss... Permission denied action !'];
		}else {
			$role = $this->RoleModel->where(['id' => $id])->row();
			if (!$role) {
				$data = ['error' => 'Data not found !'];
			}else {
				$this->form_validation->set_rules('name_edit','name','required');
		        $this->form_validation->set_rules('description_edit','description','required');
		        if ($this->form_validation->run() == FALSE) {
		            $data = ['error' => validation_errors()];
		        }else {
		        	if ($this->unique('name', $this->input->post('name_edit'), $role->id) == FALSE) {
						$data = ['error' => 'Sorry, This name already registered / has been created !'];
		        	} else {
						$menus_id = $this->input->post('menus_edit', true);
			        	if (! $menus_id) {
			        		$data = ['error' => 'Opss... Minimum 1 menu must be required ! !'];
			        	}else {
				        	$role_data = [
									'name' => htmlspecialchars($this->input->post('name_edit', true)),
									'description' => htmlspecialchars($this->input->post('description_edit', true)),
								];
							if ($this->RoleModel->update($role->id, $role_data)) {
								if ($this->db->delete('role_menu', ['role_id' => $role->id]) && $this->db->delete('role_menu_action', ['role_id' => $role->id])) {
									$actions = [];
						        	foreach ($menus_id as $menu_id) {
						        		$this->db->insert('role_menu', ['role_id' => $role->id, 'menu_id' => $menu_id]);
						        		$actions[] = $this->input->post($menu_id.'_actions_edit', true);
						        	}
						        	for ($i=0; $i < count($menus_id) ; $i++) { 
						        		for ($a=0; $a < count($actions[$i]); $a++) { 
						        			$this->db->insert('role_menu_action', ['role_id' => $role->id, 'menu_id' => $menus_id[$i], 'action_id' => $actions[$i][$a]]);
						        		}
						        	}
								}else {
									$data = ['error' => 'Opss... Validation error ! !'];
								}
							}
							$data = ['success' => 'Role successfully edited'];
			        	}
		        	}
		        }
			}
		}
		echo json_encode($data);
	}

	public function destroy($id) {
		if (!$this->actions) {
			$data = ['error' => 'Opss... Permission denied action !'];
		}else {
			$role = $this->RoleModel->where(['id' => $id])->row();
			if (! $role) {
				$data = ['error' => 'Data not found !'];
			}else {
				if ($this->RoleModel->destroy(['id' => $id])) {
					if ($this->db->delete('role_menu', ['role_id' => $role->id])) {
						$this->db->delete('role_menu_action', ['role_id' => $role->id]);
					}
				}
				$data = ['success' => 'Role successfully deleted'];
			}
		}
		echo json_encode($data);
	}	

}