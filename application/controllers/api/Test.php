<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Test extends REST_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('UserModel');
    }

    // public function index_get() {
    // http://localhost/system_login_ci/api/test/
    // http://localhost/system_login_ci/api/test?username=fidiawan
    public function test_get() {
        $username = $this->get('username');

        if ($username === NULL) {
            // http://localhost/system_login_ci/api/test/test
            $users = $this->UserModel->all();
        }else {
            // http://localhost/system_login_ci/api/test/test?username=fidiawan
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

    public function test_post() {
        echo "TEST POST";
    }

}