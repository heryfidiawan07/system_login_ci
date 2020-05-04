<?php

class AuthModel extends CI_Model {

	public function auth() {
		
		$auth_column = ['id', 'name', 'username', 'email'];
		$this->db->select($auth_column);
        $auth = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();

		$except = ['login', 'register', 'forgot_password'];

		if ($auth) {
			if ( in_array($this->uri->segment(1), $except) ) {
				return redirect('/');
			}
			return $auth;
		}

		if ( in_array($this->uri->segment(1), $except) ) {
			return false;
		}else {
			return redirect('login');
		}

	}
	
}