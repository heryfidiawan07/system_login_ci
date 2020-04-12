<?php

class PermissionModel extends CI_Model {

	public function permission() {
		
		$this->db->select(['users.id', 'users.name as user_name', 'users.username', 'users.email', 'roles.name as role_name', 'roles.description as role_desc', 'menus.id as id_menu', 'menus.name as menu_name', 'menus.controller as menu_controller', 'parent_id', 'has_child', 'order_key']);
		$this->db->from('users');
		$this->db->join('user_role', 'user_role.user_id = users.id');
		$this->db->join('roles', 'roles.id = user_role.role_id');
		$this->db->join('role_menu', 'role_menu.role_id = roles.id');
		$this->db->join('menus', 'menus.id = role_menu.menu_id');
		$this->db->where(['users.email' => $this->session->userdata('email')]);
		$this->db->group_by('role_menu.menu_id');//authorize menu
		$this->db->order_by('menus.order_key');
		$permissions = $this->db->get()->result();
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
		foreach ($permissions as $permission) {
			$permission_menu[] = $permission->menu_controller;
		}

		$permission_menu[] = '';
		$permission_menu[] = 'dashboard';

		// Default Demo
		$permission_menu[] .= 'user';
		
		if ( in_array($this->uri->segment(1), $permission_menu) ) {
			return $permissions;
		}else {
			echo 'Opss... Permission denied !';die;
		}

	}
	
}