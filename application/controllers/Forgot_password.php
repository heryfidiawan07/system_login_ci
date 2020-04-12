<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends CI_Controller {

	public $auth;

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');

		$this->load->model('AuthModel');
		$this->auth = $this->AuthModel->auth();
	}	

    public function index (){
    	$data['auth']  = $this->auth;
    	$data['title'] = 'Forgot Password';
		$this->load->view('auth/forgot_password', $data);
    }
     
    public function store(){
		$this->form_validation->set_rules(
			'email', 'email', 'trim|required|valid_email'
		);
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata(
					'message', '<div class="alert alert-danger">Validation error !</div>'
				);
			redirect('forgot_password');
		}else {
			$email = $this->input->post('email');
			$user  = $this->db->get_where('users', ['email' => $email])->row();
			if ($user->email == $email) {
				$subject = 'Test subject pertama';
				$message = 'Test message pertama';
				if($this->send_mail($email, $subject, $message)) {
					$this->session->set_flashdata(
						'message', '<div class="alert alert-success">Email successfully sent</div>'
					);
					redirect('forgot_password');
				}else {
					$error = $this->email->print_debugger();
					$this->session->set_flashdata(
						'message', "<div class='alert alert-warning'>'.$error.'</div>"
					);
					redirect('forgot_password');
				}
			}else {
				$this->session->set_flashdata(
					'message', '<div class="alert alert-danger">This email is not registered !</div>'
				);
				redirect('forgot_password');
			}
		}
    }
    
    public function send_mail($email, $subject, $message){
    	$email_config = $this->load->config('email', TRUE );
		$email_config = $this->config;
		$config 	  = $email_config->config['email'];

    	$this->email->initialize($config);

        $this->email->set_newline("\r\n");

        $this->email->from('rarakirana07@gmail.com', 'System Login Codeigniter');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->set_newline("\r\n");

        if ($this->email->send()) {
            return TRUE;
        }else {
            return FALSE;
        }
    }
    

}