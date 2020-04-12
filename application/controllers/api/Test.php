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

    public function index_get() {
        // http://localhost/system_login_ci/api/test/?username=fidiawan
        $username = $this->get('username');

        if ($username) {
            $user = $this->UserModel->where(['username' => $username])->row();
            if ($user) {
                $this->response([
                        'status' => true,
                        'data' => $user
                    ], REST_Controller::HTTP_OK);
            }else {
                $this->response([
                        'status' => false,
                        'message' => 'User not found !'
                    ], REST_Controller::HTTP_NOT_FOUND);
            }
        }else {
            $this->response([
                    'status' => false,
                    'message' => 'Data not found !'
                ], REST_Controller::HTTP_NOT_FOUND);
        }

    }

}