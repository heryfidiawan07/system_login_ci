<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Test extends REST_Controller {

    public $auth;
    public $permissions;
    public $actions;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('PermissionModel');
        $this->load->model('ActionModel');

        $this->auth        = $this->AuthModel->auth();
        $this->permissions = $this->PermissionModel->permission($except = ['']);
        $this->actions     = $this->ActionModel->action($except = ['']);

        $this->load->model('UserModel');
    }

    public function index_get() {
        if (!$this->actions) {
            $this->response([
                    'status' => false,
                    'message' => 'Action permission denied !'
                ], REST_Controller::HTTP_NOT_FOUND);
        }else {
            $username = $this->get('username');

            if ($username === NULL) {
                // http://localhost/system_login_ci/api/test/
                $users = $this->UserModel->all();
            }else {
                // http://localhost/system_login_ci/api/test/?username=fidiawan
                $users = $this->UserModel->where(['username' => $username])->result();
            }

            if ($users) {
                $this->response([
                        'status' => true,
                        'data' => $users
                    ], REST_Controller::HTTP_OK);
            }else {
                $this->response([
                        'status' => false,
                        'message' => 'User not found !'
                    ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

}