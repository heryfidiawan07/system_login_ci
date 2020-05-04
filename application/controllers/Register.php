<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	
	public $auth;

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');

		$this->load->model('AuthModel');
		$this->auth = $this->AuthModel->auth();
	}

	public function index() {
		$data['auth']  = $this->auth;
		$data['title'] = 'Register';
		$this->load->view('auth/register', $data);
	}

	public function store() {
		$this->form_validation->set_rules(
			'name', 'name', 'trim|required|min_length[3]|max_length[25]'
		);
		$this->form_validation->set_rules(
			'username', 'username', 'trim|required|min_length[3]|max_length[25]|is_unique[users.username]', [
				'is_unique' => 'This username has already registered !'
			]
		);
		$this->form_validation->set_rules(
			'email', 'email', 'trim|required|valid_email|is_unique[users.email]|min_length[3]|max_length[25]', [
				'is_unique' => 'This email has already registered !'
			]
		);
		$this->form_validation->set_rules(
			'password', 'password', 'trim|required|min_length[6]|matches[repeat_password]', [
				'matches' => 'Password dont match !',
				'min_length' => 'Password too short !'
			]
		);
		$this->form_validation->set_rules(
			'repeat_password', 'repeat password', 'trim|required|matches[password]'
		);
		
		if ($this->form_validation->run() == FALSE) {
			$data['auth']  = $this->auth;
			$data['title'] = 'Register';
			$this->load->view('auth/register', $data);
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				// 'token' => base64_encode(random_bytes(100)), // urlencode($token) -> untuk mengganti tanda yang di hilagkan oleh url seperti tanda +
			];
			$this->db->insert('users', $data);
			$this->session->set_flashdata(
				'message', '<div class="alert alert-success">Registration successful, please login !</div>'
			);
			redirect('/login');
		}
	}

}