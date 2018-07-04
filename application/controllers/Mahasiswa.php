<?php 

class Mahasiswa extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['nim']  = $this->session->userdata('nim');
        $this->data['role'] = $this->session->userdata('role');
        $this->checkPermissions(!isset($this->data['nim'], $this->data['role']) or $this->data['role'] != 'mahasiswa', [ 'Silahkan login terlebih dahulu', 'info' ], [ REDIRECT_RULES ]);
    }

  

    public function index()
    {
        $this->data['title']    = 'Dashboard';
        $this->data['content']  = 'mahasiswa/dashboard';
        $this->template($this->data, 'mahasiswa');
    }

    public function data_diri()
    {
        $this->data['title']    = 'Data Diri';
        $this->data['content']  = 'mahasiswa/data_diri';
        $this->template($this->data, 'mahasiswa');
    }

}
