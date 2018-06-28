<?php 

class Mahasiswa extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['username']      = $this->session->userdata('username');
        $this->data['role']  = $this->session->userdata('role');
        if (!isset($this->data['username'], $this->data['role'])) {
            $this->session->sess_destroy();
            redirect('logout');
            exit;
        }
        if ($this->data['role'] != 'mahasiswa') {
            $this->session->sess_destroy();
            redirect('logout');
            exit;
        }
        $this->load->model(
            [
            'User_m',
            'mahasiwa_m',
            'data_keluarga_m',
            'data_pengajuan_m'
            ]
        );
    }

  

    public function index($value='')
    {
        // $this->data['data'] = ;
        $this->data['title']  = 'Dashboard | ' . $this->title;
        $this->data['content']  = 'admin/';
        $this->template($this->data);
    }

    public function data_diri($value='')
    {
        $this->data['title']  = 'Dashboard | ' . $this->title;
        $this->data['content']  = 'admin/data_mahasiswa';
        $this->template($this->data);
    }

    public function data_keluarga($value='')
    {
        // $this->data['data'] = ;
        $this->data['title']  = 'Dashboard | ' . $this->title;
        $this->data['content']  = 'admin/';
        $this->template($this->data);
    }

    public function pengajuan($value='')
    {
        // $this->data['data'] = ;
        $this->data['title']  = 'Dashboard | ' . $this->title;
        $this->data['content']  = 'admin/';
        $this->template($this->data);
    }

    public function ganti_password($value='')
    {
        // $this->data['data'] = ;
        $this->data['title']  = 'Dashboard | ' . $this->title;
        $this->data['content']  = 'admin/';
        $this->template($this->data);
    }


    public function cetak_berkas($value='')
    {
        // $this->data['data'] = ;
        $this->data['title']  = 'Dashboard | ' . $this->title;
        $this->data['content']  = 'admin/';
        $this->template($this->data);
    }

}
