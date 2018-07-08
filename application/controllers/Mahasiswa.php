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
        $this->load->model('mahasiswa_m');
        $this->load->model('jurusan_m');
        $this->data['jurusan'] = $this->jurusan_m->get();

        if ($this->POST('submit')) {
            $fields = [ 'nama', 'jenis_kelamin', 'agama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'kode_pos', 'telepon', 'jurusan', 'semester', 'nomor_rekening', 'prestasi' ];
            $this->data['mahasiswa'] = [];
            foreach ($fields as $field)
            {
                $this->data['mahasiswa'][$field] = $this->POST($field);
            }
            $this->mahasiswa_m->update($this->POST('nim'), $this->data['mahasiswa']);
            $this->flashMessage('Data anda berhasil diperbaharui');
            redirect('mahasiswa/data-diri');
        }

        $this->data['mahasiswa']    = $this->mahasiswa_m->get_row([ 'nim' => $this->data['nim'] ]);
        $this->data['title']        = 'Data Diri';
        $this->data['content']      = 'mahasiswa/data_diri';
        $this->template($this->data, 'mahasiswa');
    }

    public function data_keluarga()
    {
        $this->load->model('mahasiswa_m');
        $this->load->model('jurusan_m');
        $this->data['jurusan'] = $this->jurusan_m->get();

        if ($this->POST('submit')) {
            $fields = [ 'nama', 'jenis_kelamin', 'agama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'kode_pos', 'telepon', 'jurusan', 'semester', 'nomor_rekening', 'prestasi' ];
            $this->data['mahasiswa'] = [];
            foreach ($fields as $field)
            {
                $this->data['mahasiswa'][$field] = $this->POST($field);
            }
            $this->mahasiswa_m->update($this->POST('nim'), $this->data['mahasiswa']);
            $this->flashMessage('Data anda berhasil diperbaharui');
            redirect('mahasiswa/data-diri');
        }

        $this->data['mahasiswa']    = $this->mahasiswa_m->get_row([ 'nim' => $this->data['nim'] ]);
        $this->data['title']        = 'Data Diri';
        $this->data['content']      = 'mahasiswa/data_keluarga';
        $this->template($this->data, 'mahasiswa');
    }
}
