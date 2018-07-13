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

    public function admin(){
        if ($this->POST('login')) {
            $this->load->model('user_m');
            $data_admin = [
                'username' => $this->POST('username'),
                'password' => md5($this->POST('password'))
            ];
            $admin = $this->user_m->login($data_admin);

            if (count($admin) > 0) {
                redirect('admin');
            }
            else
            {
                $this->flashMessage('Username atau password yang anda masukkan salah', 'danger');
                redirect('login/admin');
                exit;
            }
        }

        $this->load->view('admin/login');
    }

}
