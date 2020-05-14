<?php

class PermissionModel extends CI_Model {

	public function permission($except = FALSE) {
		
		$this->db->select(['users.id', 'users.name as user_name', 'users.username', 'users.email', 'roles.name as role_name', 'roles.description as role_desc', 'menus.id as id_menu', 'menus.name as menu_name', 'menus.controller as menu_controller', 'parent_id', 'order_key', 'parents.id as id_parent', 'parents.name as parent_name']);
		$this->db->from('users');
		$this->db->join('user_role', 'user_role.user_id = users.id');
		$this->db->join('roles', 'roles.id = user_role.role_id');
		$this->db->join('role_menu', 'role_menu.role_id = roles.id');
		$this->db->join('menus', 'menus.id = role_menu.menu_id');
		$this->db->join('parents', 'parents.id = menus.parent_id');
		$this->db->where(['users.email' => $this->session->userdata('email')]);
		// $this->db->group_by('sub');//authorize menu
		$this->db->order_by('menus.order_key');
		$permissions = $this->db->get()->result();
		// echo json_encode($permissions);die;
		// return $permissions;
		
		// Get Role Permission Menu

		// Example Value
		// [
		//     {
		//         "id": "User ID",
		//         "user_name": "Name User",
		//         "username": "Username User",
		//         "email": "email User",
		//         "role_name": "Role Name",
		//         "role_desc": "Description Role",
		//         "menu_name": "Menu Name",
		//         "menu_controller": "Controller Name"
		//     }
		// ]

		$permission_menu = [];

		$permission_menu[] = '';
		$permission_menu[] = 'dashboard';

		foreach ($permissions as $permission) {
			$permission_menu[] = $permission->menu_controller;
		}

		if ($except) {
			foreach ($except as $xpt) {
				$permission_menu[] = $xpt;
			}
		}

		if ( in_array($this->uri->segment(1), $permission_menu) ) {
			return $permissions;
		}else {
			echo 'Opss... Permission denied !';die;
		}

	}
	
}