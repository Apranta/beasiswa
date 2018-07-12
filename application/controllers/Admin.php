<?php 

class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->data['username']      = $this->session->userdata('username');
        // $this->data['role']  = $this->session->userdata('role');
        // if (!isset($this->data['username'], $this->data['role'])) {
        //     $this->session->sess_destroy();
        //     redirect('logout');
        //     exit;
        // }
        // if ($this->data['role'] != 'admin') {
        //     $this->session->sess_destroy();
        //     redirect('logout');
        //     exit;
        // }
        $this->load->model('user_m');
        $this->load->model('jurusan_m');
        $this->load->model('mahasiswa_m');
        $this->load->model('data_pengajuan_m');
        $this->load->model('data_keluarga_m');
    }  

    public function index()
    {
        // $this->data['data'] = ;
        $this->data['title']  = 'Dashboard | ' . $this->title;
        $this->data['content']  = 'admin/dashboard';
        $this->template($this->data, 'admin');
    }

    public function data_mahasiswa()
    {
        $nim = $this->uri->segment(3);

        if(isset($nim)){
            $this->mahasiswa_m->delete($nim);
            $this->flashMessage('Data mahasiswa berhasil dihapus');
            redirect('admin/data-mahasiswa');
            exit;
        }

        $this->data['title']    = 'Data Mahasiswa | ' . $this->title;
        $this->data['data']     = $this->mahasiswa_m->get();
        $this->data['content']  = 'admin/data_mahasiswa';
        $this->template($this->data, 'admin');
    }

    public function tambah_mahasiswa()
    {
        if($this->POST('simpan')){
            $fields = [ 'nim', 'nama', 'jenis_kelamin', 'agama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'kode_pos', 'telepon', 'jurusan', 'semester', 'nomor_rekening', 'prestasi' ];
            $this->data['mahasiswa'] = [];
            foreach ($fields as $field)
            {
                $this->data['mahasiswa'][$field] = $this->POST($field);
            }
            $this->data['mahasiswa']['pin'] = $this->mahasiswa_m->passwordHash($this->POST('pin'));

            $this->mahasiswa_m->insert($this->data['mahasiswa']);
            $this->flashMessage('Data mahasiswa berhasil disimpan');
            redirect('admin/data-mahasiswa');
            exit;
        }

        $this->data['title']    = 'Tambah Mahasiswa | ' . $this->title;
        $this->data['content']  = 'admin/tambah_mahasiswa';
        $this->data['jurusan']  = $this->jurusan_m->get();
        $this->template($this->data, 'admin');
    }


    public function edit_mahasiswa()
    {
        $nim = $this->uri->segment(3);

        if(!isset($nim)){
            $this->flashMessage('NIM mahasiswa tidak dicantumkan', 'danger');
            redirect('admin/data-mahasiswa');
            exit;
        }
        else{
            $this->data['data'] = $this->mahasiswa_m->get_row(['nim' => $nim]);
        }

        if($this->POST('simpan')){
            $fields = [ 'nama', 'jenis_kelamin', 'agama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'kode_pos', 'telepon', 'jurusan', 'semester', 'nomor_rekening', 'prestasi' ];
            $this->data['mahasiswa'] = [];
            foreach ($fields as $field)
            {
                $this->data['mahasiswa'][$field] = $this->POST($field);
            }

            if(!empty($this->POST('pin'))){
                $this->data['mahasiswa']['pin'] = $this->mahasiswa_m->passwordHash($this->POST('pin'));
            }

            $this->mahasiswa_m->update($nim, $this->data['mahasiswa']);
            $this->flashMessage('Data mahasiswa berhasil diedit');
            redirect('admin/edit-mahasiswa/'. $nim);
            exit;
        }

        $this->data['title']    = 'Edit Mahasiswa | ' . $this->title;
        $this->data['content']  = 'admin/edit_mahasiswa';
        $this->data['jurusan']  = $this->jurusan_m->get();
        $this->template($this->data, 'admin');
    }

    public function detail_mahasiswa()
    {
        $nim = $this->uri->segment(3);

        if(!isset($nim)){
            $this->flashMessage('NIM mahasiswa tidak dicantumkan', 'danger');
            redirect('admin/data-mahasiswa');
            exit;
        }
        else{
            $this->data['data'] = $this->mahasiswa_m->get_row(['nim' => $nim]);
        }

        $this->data['title']    = 'Detail Mahasiswa | ' . $this->title;
        $this->data['content']  = 'admin/detail_mahasiswa';
        $this->template($this->data, 'admin');
    }
 
    public function data_pengajuan()
    {
        $id = $this->uri->segment(3);

        if(isset($id)){
            $this->data_pengajuan_m->delete($id);
            $this->flashMessage('Data pengajuan berhasil dihapus');
            redirect('admin/data-pengajuan');
            exit;
        }

        $this->data['title']    = 'Data Pengajuan | ' . $this->title;
        $this->data['data']     = $this->data_pengajuan_m->get();
        $this->data['content']  = 'admin/data_pengajuan';
        $this->template($this->data, 'admin');
    }

    public function tambah_pengajuan()
    {
        if($this->POST('simpan')){
            $fields = [ 'nim', 'jenis_beasiswa', 'ipk_terakhir', 'status'];
            $this->data['pengajuan'] = [];
            foreach ($fields as $field)
            {
                $this->data['pengajuan'][$field] = $this->POST($field);
            }

            $this->data_pengajuan_m->insert($this->data['pengajuan']);
            $this->flashMessage('Data pengajuan berhasil disimpan');
            redirect('admin/data-pengajuan');
            exit;
        }

        $this->data['title']    = 'Tambah pengajuan | ' . $this->title;
        $this->data['data']     = $this->mahasiswa_m->get();
        $this->data['content']  = 'admin/tambah_pengajuan';
        $this->template($this->data, 'admin');
    }


    public function edit_pengajuan()
    {
        $id = $this->uri->segment(3);

        if(!isset($id)){
            $this->flashMessage('Id pengajuan tidak dicantumkan', 'danger');
            redirect('admin/data-pengajuan');
            exit;
        }
        else{
            $this->data['data'] = $this->data_pengajuan_m->get_row(['id' => $id]);
        }

        if($this->POST('simpan')){
            $fields = [ 'nim', 'jenis_beasiswa', 'ipk_terakhir', 'status'];
            $this->data['pengajuan'] = [];
            foreach ($fields as $field)
            {
                $this->data['pengajuan'][$field] = $this->POST($field);
            }

            $this->data_pengajuan_m->update($id, $this->data['pengajuan']);
            $this->flashMessage('Data pengajuan berhasil diedit');
            redirect('admin/edit-pengajuan/'. $id);
            exit;
        }

        $this->data['title']    = 'Edit Pengajuan | ' . $this->title;
        $this->data['content']  = 'admin/edit_pengajuan';
        $this->data['jurusan']  = $this->jurusan_m->get();
        $this->data['mhs']      = $this->mahasiswa_m->get();
        $this->data['beasiswa'] = [
            'PPA'               => 'PPA',
            'PKG'               => 'PKG',
            'SWADANA'           => 'SWADANA'
        ];
        $this->data['status']   = [
            'baru'              => 'baru',
            'perpanjangan'      => 'perpanjangan'
        ];
        $this->template($this->data, 'admin');
    }

    public function data_jurusan()
    {
        $id = $this->uri->segment(3);

        if(isset($id)){
            $this->jurusan_m->delete($id);
            $this->flashMessage('Data jurusan berhasil dihapus');
            redirect('admin/data-jurusan');
            exit;
        }

        $this->data['title']    = 'Data Jurusan | ' . $this->title;
        $this->data['data']     = $this->jurusan_m->get();
        $this->data['content']  = 'admin/data_jurusan';
        $this->template($this->data, 'admin');
    }

    public function tambah_jurusan()
    {
        if($this->POST('simpan')){
            $this->jurusan_m->insert(['nama' => $this->POST('nama')]);
            $this->flashMessage('Data jurusan berhasil disimpan');
            redirect('admin/data-jurusan');
            exit;
        }

        $this->data['title']    = 'Tambah Jurusan | ' . $this->title;
        $this->data['content']  = 'admin/tambah_jurusan';
        $this->template($this->data, 'admin');
    }


    public function edit_jurusan()
    {
        $id = $this->uri->segment(3);

        if(!isset($id)){
            $this->flashMessage('Id jurusan tidak dicantumkan', 'danger');
            redirect('admin/data-jurusan');
            exit;
        }
        else{
            $this->data['data'] = $this->jurusan_m->get_row(['id' => $id]);
        }

        if($this->POST('simpan')){
            $this->jurusan_m->update($id, ['nama' => $this->POST('nama')]);
            $this->flashMessage('Data jurusan berhasil diedit');
            redirect('admin/edit-jurusan/'. $id);
            exit;
        }

        $this->data['title']    = 'Edit Jurusan | ' . $this->title;
        $this->data['content']  = 'admin/edit_jurusan';
        $this->template($this->data, 'admin');
    }

    public function data_user()
    {
        $username = $this->uri->segment(3);

        if(isset($username)){
            $this->user_m->delete($username);
            $this->flashMessage('Data user berhasil dihapus');
            redirect('admin/data-user');
            exit;
        }

        $this->data['title']    = 'Data User | ' . $this->title;
        $this->data['data']     = $this->user_m->get();
        $this->data['content']  = 'admin/data_user';
        $this->template($this->data, 'admin');
    }

    public function tambah_user()
    {
        if($this->POST('simpan')){
            $fields = [ 'username', 'email', 'role'];
            $this->data['user'] = [];
            foreach ($fields as $field)
            {
                $this->data['user'][$field] = $this->POST($field);
            }
            $this->data['user']['password'] = md5($password);

            $this->user_m->insert($this->data['user']);
            $this->flashMessage('Data user berhasil disimpan');
            redirect('admin/data-user');
            exit;
        }

        $this->data['title']    = 'Tambah User | ' . $this->title;
        $this->data['content']  = 'admin/tambah_user';
        $this->template($this->data, 'admin');
    }


    public function edit_user()
    {
        $username = $this->uri->segment(3);

        if(!isset($username)){
            $this->flashMessage('Username tidak dicantumkan', 'danger');
            redirect('admin/data-user');
            exit;
        }
        else{
            $this->data['data'] = $this->user_m->get_row(['username' => $username]);
        }

        if($this->POST('simpan')){
            $fields = ['email', 'role'];
            $this->data['user'] = [];
            foreach ($fields as $field)
            {
                $this->data['user'][$field] = $this->POST($field);
            }
            
            if(!empty($this->POST('password'))){
                $this->data['user']['password'] = md5($this->POST('password'));
            }

            $this->user_m->update($username, $this->data['user']);
            $this->flashMessage('Data user berhasil diedit');
            redirect('admin/edit-user/'. $username);
            exit;
        }

        $this->data['title']    = 'Edit User | ' . $this->title;
        $this->data['content']  = 'admin/edit_user';
        $this->data['role']     = ['admin' => 'admin'];
        $this->template($this->data, 'admin');
    }

    public function data_keluarga()
    {
        $nim = $this->uri->segment(3);

        if(isset($nim)){
            $this->data_keluarga_m->delete($nim);
            $this->flashMessage('Data keluarga berhasil dihapus');
            redirect('admin/data-keluarga');
            exit;
        }

        $this->data['title']    = 'Data Keluarga | ' . $this->title;
        $this->data['data']     = $this->data_keluarga_m->get();
        $this->data['content']  = 'admin/data_keluarga';
        $this->template($this->data, 'admin');
    }

    public function tambah_keluarga()
    {
        if($this->POST('simpan')){
            $fields = ['nim', 'n_ayah', 'n_ibu', 'agama_ayah', 'agama_ibu', 'pekerjaan_ayah', 'pekerjaan_ibu', 'usia_ayah', 'usia_ibu', 'jumlah_anak', 'anak_ke', 'penghasilan', 'status_ayah', 'status_ibu', 'kepemilikan_rumah', 'daya_listrik', 'sumber_air', 'saudara', 'alamat_ayah', 'alamat_ibu' ];
            $this->data['keluarga'] = [];
            foreach ($fields as $field)
            {
                $this->data['keluarga'][$field] = $this->POST($field);
            }

            $this->data_keluarga_m->insert($this->data['keluarga']);
            $this->flashMessage('Data keluarga berhasil disimpan');
            redirect('admin/data-keluarga');
            exit;
        }

        $this->data['title']    = 'Tambah Keluarga | ' . $this->title;
        $this->data['content']  = 'admin/tambah_keluarga';
        $this->data['data']     = $this->mahasiswa_m->get();
        $this->template($this->data, 'admin');
    }


    public function edit_keluarga()
    {
        $nim = $this->uri->segment(3);

        if(!isset($nim)){
            $this->flashMessage('NIM keluarga tidak dicantumkan', 'danger');
            redirect('admin/data-keluarga');
            exit;
        }
        else{
            $this->data['data'] = $this->data_keluarga_m->get_row(['nim' => $nim]);
        }

        if($this->POST('simpan')){
           $fields = ['n_ayah', 'n_ibu', 'agama_ayah', 'agama_ibu', 'pekerjaan_ayah', 'pekerjaan_ibu', 'usia_ayah', 'usia_ibu', 'jumlah_anak', 'anak_ke', 'penghasilan', 'status_ayah', 'status_ibu', 'kepemilikan_rumah', 'daya_listrik', 'sumber_air', 'saudara', 'alamat_ayah', 'alamat_ibu' ];
            $this->data['keluarga'] = [];
            foreach ($fields as $field)
            {
                $this->data['keluarga'][$field] = $this->POST($field);
            }
            
            $this->data_keluarga_m->update($nim, $this->data['keluarga']);
            $this->flashMessage('Data keluarga berhasil diedit');
            redirect('admin/edit-keluarga/'. $nim);
            exit;
        }

        $this->data['title']    = 'Edit keluarga | ' . $this->title;
        $this->data['content']  = 'admin/edit_keluarga';
        $this->data['jurusan']  = $this->jurusan_m->get();
        $this->template($this->data, 'admin');
    }

    public function detail_keluarga()
    {
        $nim = $this->uri->segment(3);

        if(!isset($nim)){
            $this->flashMessage('NIM keluarga tidak dicantumkan', 'danger');
            redirect('admin/data-keluarga');
            exit;
        }
        else{
            $this->data['data'] = $this->data_keluarga_m->get_row(['nim' => $nim]);
        }

        $this->data['title']    = 'Detail keluarga | ' . $this->title;
        $this->data['content']  = 'admin/detail_keluarga';
        $this->template($this->data, 'admin');
    }

}
