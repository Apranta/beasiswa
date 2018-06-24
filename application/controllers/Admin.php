<?php 

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->data['username']      = $this->session->userdata('username');
        $this->data['role']  = $this->session->userdata('role');
        if (!isset($this->data['username'], $this->data['role']))
        {
            $this->session->sess_destroy();
            redirect('logout');
            exit;
        }
        if ($this->data['role'] != 'admin')
        {
            $this->session->sess_destroy();
            redirect('logout');
            exit;
        }
    $this->load->model([
      'User_m',
      'mahasiwa_m',
      'data_keluarga_m',
      'data_pengajuan_m'
    ]);
	}

  

  public function index($value='')
  {
    // $this->data['data'] = ;
    $this->data['title']  = 'Dashboard | ' . $this->title;
    $this->data['content']  = 'admin/';
    $this->template($this->data);
  }

  public function data_mahasiswa($value='')
  {
    $this->data['title']  = 'Dashboard | ' . $this->title;
    $this->data['content']  = 'admin/data_mahasiswa';
    $this->template($this->data);
  }

  public function detail_mahasiwa($value='')
  {
    // $this->data['data'] = ;
    $this->data['title']  = 'Dashboard | ' . $this->title;
    $this->data['content']  = 'admin/';
    $this->template($this->data);
  }

  public function data_pengajuan($value='')
  {
    // $this->data['data'] = ;
    $this->data['title']  = 'Dashboard | ' . $this->title;
    $this->data['content']  = 'admin/';
    $this->template($this->data);
  }

  public function data_jurusan($value='')
  {
    // $this->data['data'] = ;
    $this->data['title']  = 'Dashboard | ' . $this->title;
    $this->data['content']  = 'admin/';
    $this->template($this->data);
  }

  public function index($value='')
  {
    // $this->data['data'] = ;
    $this->data['title']  = 'Dashboard | ' . $this->title;
    $this->data['content']  = 'admin/';
    $this->template($this->data);
  }

}