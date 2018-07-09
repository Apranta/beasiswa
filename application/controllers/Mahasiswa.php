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
        if ($this->POST('submit')) {
            $this->load->model('data_pengajuan_m');
            $this->data['pengajuan'] = [
                'nim'               => $this->data['nim'],
                'jenis_beasiswa'    => $this->POST('jenis_beasiswa'),
                'ipk_terakhir'      => $this->POST('ipk_terakhir')
            ];
            $this->data_pengajuan_m->insert($this->data['pengajuan']);
            $this->flashMessage('Data pengajuan beasiswa berhasil disimpan');
            redirect('mahasiswa/pengajuan-beasiswa');
        }

        $this->data['title']        = 'Pengajuan Beasiswa';
        $this->data['content']      = 'mahasiswa/pengajuan_beasiswa';
        $this->template($this->data, 'mahasiswa');
    }

    public function cetak_berkas()
    {
        $this->data['title']        = 'Cetak Berkas';
        $this->data['content']      = 'mahasiswa/cetak_berkas';
        $this->template($this->data, 'mahasiswa');
    }

    public function ganti_pin()
    {
        if ($this->POST('submit')) {
            $this->load->model('mahasiswa_m');

            $pin = $this->__generateRandomString(8, [ 'uppercase', 'number' ]);
            $this->data['request'] = [
                'nim'    => $this->data['nim'],
                'pin'   => $this->mahasiswa_m->passwordHash($pin)
            ];
            $this->mahasiswa_m->update($this->data['nim'], $this->data['request']);

            $this->session->set_userdata(
                [
                'email' => $this->POST('email'),
                'pin'   => $pin,
                'nim'   => $this->data['nim']
                ]
            );

            $this->sendMail($this->POST('email'), 'Permintaan Pergantian PIN Sistem Informasi Beasiswa Polsri', 'Pergantian PIN akun anda pada Sistem Informasi Beasiswa Politeknik Negeri Sriwijaya telah berhasil. Silahkan gunakan NIM <b>' . $this->data['nim'] . '</b> dan PIN <b>' . $pin . '</b> untuk login.');
            $this->flashMessage(
                'PIN telah dikirim ke <b>' . $this->POST('email') . '</b>. Lihat di spam jika email tidak ada di kotak masuk. Jika tidak ada sama sekali, anda bisa mengirim ulang email dengan klik tombol di bawah ini.
                ' . form_open('mahasiswa/ganti-pin') . '
                    <input type="submit" name="resend" value="Kirim Ulang" class="btn btn-dark btn-xs">
                ' . form_close() . '
                '
            );
            redirect('mahasiswa/ganti-pin');
        }

        if ($this->POST('resend')) {
            $this->sendMail($this->session->userdata('email'), 'Permintaan Pergantian PIN Sistem Informasi Beasiswa Polsri', 'Pergantian PIN akun anda pada Sistem Informasi Beasiswa Politeknik Negeri Sriwijaya telah berhasil. Silahkan gunakan NIM <b>' . $this->session->userdata('nim') . '</b> dan PIN <b>' . $this->session->userdata('pin') . '</b> untuk login.');
            $this->flashMessage(
                'PIN telah dikirim ke <b>' . $this->session->userdata('email') . '</b>. Lihat di spam jika email tidak ada di kotak masuk. Jika tidak ada sama sekali, anda bisa mengirim ulang email dengan klik tombol di bawah ini.
                ' . form_open('mahasiswa/ganti-pin') . '
                    <input type="submit" name="resend" value="Kirim Ulang" class="btn btn-dark btn-xs">
                ' . form_close() . '
                '
            );
            redirect('mahasiswa/ganti-pin');
        }

        $this->data['title']        = 'Ganti PIN';
        $this->data['content']      = 'mahasiswa/ganti_pin';
        $this->template($this->data, 'mahasiswa');
    }

    private function sendMail($address, $subject, $body)
    {
        $this->load->library('CI_PHPMailer/ci_phpmailer');
        try 
        {
            $this->ci_phpmailer->setServer('smtp.gmail.com');
            $this->ci_phpmailer->setAuth('testdevsmail@gmail.com', '4kuGanteng');
            $this->ci_phpmailer->setAlias('beasiswa@polsri.ac.id', 'Humas Polsri');
            $this->ci_phpmailer->sendMessage($address, $subject, $body);    
        } 
        catch (Exception $e)
        {
            $this->ci_phpmailer->displayError();
        }
    }
}
