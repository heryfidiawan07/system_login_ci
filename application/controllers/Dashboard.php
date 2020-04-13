<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->permissions = $this->PermissionModel->permission($axcept = ['']);
		$this->actions     = $this->ActionModel->action($axcept = ['']);
	}

	public function index() {
		$data['auth']  = $this->auth;
		$data['title'] = 'Dashboard 1';
		$data['permissions'] = $this->permissions;
		$this->load->view('dashboard1', $data);
	}

	public function dashboard_2() {
		$data['auth']  = $this->auth;
		$data['title'] = 'Dashboard 2';
		$data['permissions'] = $this->permissions;
		$this->load->view('dashboard2', $data);
	}

	public function home() {
		$this->load->model('UserModel');
		$data['auth'] 		 = $this->auth;
		$data['title'] 		 = 'Home Page';
		$data['permissions'] = $this->permissions;
		$data['users'] 		 = $this->UserModel->all();
		$data['single'] 	 = $this->UserModel->find(1);
		$data['members']  	 = $this->UserModel->where(['id >' => 0])->result();
		$data['single_data'] = $this->UserModel->where(['id >' => 0])->row();
		$this->load->view('home', $data);
	}

	public function top_navigation() {
		$data['auth']  = $this->auth;
		$data['title'] = 'Top Navigation';
		$data['permissions'] = $this->permissions;
		$this->load->view('top_navigation', $data);
	}

}