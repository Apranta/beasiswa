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
        $this->load->model('data_keluarga_m');
        $this->data['keluarga']     = $this->data_keluarga_m->get_row([ 'nim' => $this->data['nim'] ]);

        if ($this->POST('submit')) {
            $this->data['keluarga_temp'] = $this->data['keluarga'];
            $this->data['keluarga'] = [];
            $ortu = ['ayah', 'ibu'];
            $ortuFields = ['n', 'agama', 'pekerjaan', 'usia', 'status', 'alamat'];
            $miscFields = ['jumlah_anak', 'anak_ke', 'penghasilan', 'kepemilikan_rumah', 'daya_listrik', 'sumber_air', 'saudara'];
            foreach ($ortu as $ot)
            {
                foreach ($ortuFields as $field)
                {
                    $this->data['keluarga'][$field . '_' . $ot] = $this->POST($field . '_' . $ot);
                }
            }
            foreach ($miscFields as $field)
            {
                if ($field === 'saudara') {
                    $this->data['keluarga']['saudara'] = [];
                    $nama_saudara = $this->POST('nama_saudara');
                    $usia_saudara = $this->POST('usia_saudara');
                    $status_saudara = $this->POST('status_saudara');
                    $pekerjaan_saudara = $this->POST('pekerjaan_saudara');
                    for ($i = 0; $i < count($nama_saudara); $i++)
                    {
                        if (empty($nama_saudara[$i]) or empty($usia_saudara[$i]) or empty($status_saudara[$i]) or empty($pekerjaan_saudara[$i])) {
                            break;
                        }

                        $this->data['keluarga']['saudara'] []= [
                            'nama'  => $nama_saudara[$i],
                            'usia'  => $usia_saudara[$i],
                            'status'    => $status_saudara[$i],
                            'pekerjaan' => $pekerjaan_saudara[$i]
                        ];
                    }
                    $this->data['keluarga']['saudara'] = json_encode($this->data['keluarga']['saudara']);
                }
                else
                {
                    $this->data['keluarga'][$field] = $this->POST($field);
                }
            }

            if (isset($this->data['keluarga_temp'])) {
                $this->data_keluarga_m->update($this->data['nim'], $this->data['keluarga']);
            }
            else
            {
                $this->data['keluarga']['nim'] = $this->data['nim'];
                $this->data_keluarga_m->insert($this->data['keluarga']);
            }

            $this->flashMessage('Data keluarga berhasil disimpan');
            redirect('mahasiswa/data-keluarga');
        }

        $this->data['title']        = 'Data Keluarga';
        $this->data['content']      = 'mahasiswa/data_keluarga';
        $this->template($this->data, 'mahasiswa');
    }

    public function pengajuan_beasiswa()
    {
        echo 'Pengajuan beasiswa';
    }
}
