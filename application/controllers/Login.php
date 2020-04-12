<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $auth;

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');

		$this->load->model('AuthModel');
		$this->auth = $this->AuthModel->auth();
	}	

	public function index() {
		$data['auth']  = $this->auth;
		$data['title'] = 'Login';
		$this->load->view('auth/login', $data);
	}

	public function store() {
		$this->form_validation->set_rules(
			'email', 'email', 'trim|required|valid_email'
		);
		$this->form_validation->set_rules(
			'password', 'password', 'trim|required'
		);
		if ($this->form_validation->run() == FALSE) {
			$data['auth']  = $this->auth;
			$data['title'] = 'Login';
			$this->load->view('auth/login', $data);
		}else{
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			$user     = $this->db->get_where('users', ['email' => $email])->row();
			if ($user) {
				if (password_verify($password, $user->password)) {
					$data = [
						// 'email' => password_hash($user->email, PASSWORD_DEFAULT),
						'email' => $user->email,
					];
					$this->session->set_userdata($data);
					redirect('/');
				}else{
					$this->session->set_flashdata(
						'message', '<div class="alert alert-danger">Wrong password !</div>'
					);
					redirect('/login');
				}
			}else{
				$this->session->set_flashdata(
					'message', '<div class="alert alert-danger">Email is not registered !</div>'
				);
				redirect('/login');
			}
		}
	}

}