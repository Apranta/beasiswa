<?php 

class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['role']    = $this->session->userdata('role');
        $this->checkPermissions(isset($this->data['role']), [ 'Anda telah login', 'info' ], [ REDIRECT_RULES ], $this->data['role']);
    }

    public function index()
    {
        $this->data['title']    = 'Login';
        $this->data['content']    = 'login';
        $this->load->view('login', $this->data);
    }

    public function login_process()
    {
        if ($this->POST('login-submit')) {
            $this->load->model('user_m');
            if (!$this->user_m->required_input(['username','password'])) {
                $this->flashmsg('Data harus lengkap', 'warning');
                redirect('login');
            }
            
            $this->data = [
                'username'    => $this->POST('username'),
                'password'    => md5($this->POST('password'))
            ];

            $result = $this->user_m->login($this->data);
            if (!isset($result)) {
                $this->flashmsg('username atau password salah', 'danger');
            }
            
            redirect('admin');
        }

        redirect('login');
    }
}
