<?php

class RoleModel extends CI_Model {

	public function role() {

		$this->db->select(['users.id', 'name', 'users.username', 'users.email', 'permissions.role_id', 'permissions.menu_id', 'permissions.action']);
		$this->db->from('users');
		$this->db->join('user_role', 'user_role.user_id = users.id');
		$this->db->join('permissions', 'permissions.role_id = user_role.role_id');
		// $this->db->join('menus', 'menus.id = permissions.menu_id');
		// $this->db->join('roles', 'roles.id = user_role.role_id');
		$this->db->where(['users.email' => $this->session->userdata('email')]);
		$roles = $this->db->get()->result();

		$menus = $this->db->get('menus')->result();

		$role_menu = [];
		for ($i=0; $i < count($roles); $i++) { 
			if ($menus[$i]->id == $roles[$i]->menu_id) {
				$role_menu[] = $menus[$i]->slug;
			}
		}

		$role_menu[] = 'dashboard';
		
		if ( in_array($this->uri->segment(1), $role_menu) ) {
			return $role_menu;
		}else {
			echo 'Opss... Permission denied !';die;
		}

	}
	
}