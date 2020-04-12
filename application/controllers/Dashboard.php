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
		$this->permissions = $this->PermissionModel->permission();
		$this->actions     = $this->ActionModel->action();
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

	public function datatable() {
		$data['auth']  = $this->auth;
		$data['title'] = 'Datatable';
		$data['permissions'] = $this->permissions;
		$this->load->view('datatable', $data);
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
            $sub[]  = '<input type="button" class="btn btn-primary btn-sm edit_user" id="'.$user->username.'" data-toggle="modal" data-target="#modal-edit" value="Edit">';
            $sub[]  = '<input type="button" class="btn btn-danger btn-sm delete_user" id="'.$user->username.'" value="Delete">';
            $data[] = $sub;
        }

        $output = [
            'draw'              => intval($_POST['draw']),
            'recordsTotal'      => $this->UserModel->get_all_user(),
            'recordsFiltered'   => $this->UserModel->get_filtered_data($where),
            'data'              => $data
        ];
        // header('Content-Type: application/json');
        echo json_encode($output);
	}

}