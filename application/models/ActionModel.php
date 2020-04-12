<?php

class ActionModel extends CI_Model {

	public function action() {

		$this->db->select(['users.id', 'users.name as user_name', 'users.username', 'users.email', 'menus.name as menu_name', 'menus.controller as menu_controller', 'role_menu_action.action_id', 'actions.name as action_name', 'role_menu_action.description as action_desc']);
		$this->db->from('users');
		$this->db->join('user_role', 'user_role.user_id = users.id');
		$this->db->join('roles', 'roles.id = user_role.role_id');
		$this->db->join('role_menu', 'role_menu.role_id = roles.id');
		$this->db->join('menus', 'menus.id = role_menu.menu_id');
		$this->db->join('role_menu_action', 'role_menu_action.menu_id = role_menu.menu_id');
		$this->db->join('actions', 'actions.id = role_menu_action.action_id');
		$this->db->where(['users.email' => $this->session->userdata('email')]);
		$this->db->group_by('role_menu_action.action_id');//authorize role
		$actions = $this->db->get()->result();
		// return $actions;
		// Get Role Permission Menu

		// Example Value
		// [
		//     {
		//			"id": "User ID",
		// 			"user_name": "Name User",
		// 			"username": "Username User",
		// 			"email": "email User",
		//          "menu_name": "Menu Name",
		//          "menu_controller": "Controller Name",
		//          "action_id": "Action ID",
		//          "action_name": "function_name",
		//          "action_desc": "Description Action"
		//  	}
		// ]

		$action_menu = [];
		foreach ($actions as $action) {
			$action_menu[] = $action->action_name;
		}

		// Default Demo
		$action_menu[] = 'dashboard_2';
		$action_menu[] = 'top_navigation';
		$action_menu[] = 'datatable';
		$action_menu[] = 'home';

		if ($this->uri->segment(2) == false || $this->uri->segment(2) == 'index') {
			return false;
		}else {
			if ( in_array($this->uri->segment(2), $action_menu) ) {
				return $actions;
			}else {
				echo 'Opss... Permission denied !';die;
			}
			// Fill in the name column in the action table must be the same as function_name
		}

	}
	
}