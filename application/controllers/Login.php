<?php 

class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['role']    = $this->session->userdata('role');
        $this->checkPermissions(isset($this->data['role']), [ 'Anda telah login', 'info' ], [ REDIRECT_RULES ], $this->data['role']);
        // $this->load->library('Error_reporter/error_reporter');
        // display_errors(false); // hide error reporting
        // $this->load->model('mahasiswa_m');
        // throw Exception('hahaha', E_USER_NOTICE);
    }

    public function index()
    {
        if ($this->POST('login')) {
            $this->load->model('mahasiswa_m');
            $mahasiswa = $this->mahasiswa_m->get_row([ 'nim' => $this->POST('nim') ]);
            if (isset($mahasiswa)) {
                if ($this->mahasiswa_m->passwordVerify($this->POST('pin'), $mahasiswa->pin)) {
                    $this->session->set_userdata([ 'nim' => $mahasiswa->nim, 'role' => 'mahasiswa' ]);
                }
                else
                {
                    $this->flashMessage('NIM atau PIN yang anda masukkan salah', 'danger');
                }
            }
            else
            {
                $this->flashMessage('NIM atau PIN yang anda masukkan salah', 'danger');
            }
            redirect('login');
        }

        $this->data['title']    = 'Login';
        $this->data['content']    = 'login';
        $this->load->view('login', $this->data);
    }

}
