<?php 

class Main extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['role']            = $this->session->userdata('role');
        $this->checkPermissions(isset($this->data['role']), [ 'Anda telah login', 'info' ], [ REDIRECT_RULES ], $this->data['role']);
    }

    public function index()
    {
        $this->data['title']    = 'Halaman Utama';
        $this->data['content']  = 'main';
        $this->load->view('main', $this->data);
    }

    public function request()
    {
        if ($this->POST('request')) {
            $this->load->model('mahasiswa_m');

            $pin = $this->__generateRandomString(8, [ 'uppercase', 'number' ]);
            $this->data['request'] = [
            'nim'    => $this->POST('nim'),
            'pin'   => $this->mahasiswa_m->passwordHash($pin)
            ];
            $this->mahasiswa_m->insert($this->data['request']);

            $this->session->set_userdata(
                [
                'email' => $this->POST('email'),
                'pin'   => $pin,
                'nim'   => $this->POST('nim')
                ]
            );

            $this->sendMail($this->POST('email'), 'Permintaan PIN Sistem Informasi Beasiswa Polsri', 'Pendaftaran akun pada Sistem Informasi Beasiswa Politeknik Negeri Sriwijaya telah berhasil. Silahkan gunakan NIM <b>' . $this->POST('nim') . '</b> dan PIN <b>' . $pin . '</b> untuk login.');
            $this->flashMessage(
                'PIN telah dikirim ke <b>' . $this->POST('email') . '</b>. Lihat di spam jika email tidak ada di kotak masuk. Jika tidak ada sama sekali, anda bisa mengirim ulang email dengan klik tombol di bawah ini.
                ' . form_open('main/request') . '
                    <input type="submit" name="resend" value="Kirim Ulang" class="btn btn-dark btn-xs">
                ' . form_close() . '
                '
            );
            redirect('main/request');
        }

        if ($this->POST('resend')) {
            $this->sendMail($this->session->userdata('email'), 'Permintaan PIN Sistem Informasi Beasiswa Polsri', 'Pendaftaran akun pada Sistem Informasi Beasiswa Politeknik Negeri Sriwijaya telah berhasil. Silahkan gunakan NIM <b>' . $this->session->userdata('nim') . '</b> dan PIN <b>' . $this->session->userdata('pin') . '</b> untuk login.');
            $this->flashMessage(
                'PIN telah dikirim ke <b>' . $this->session->userdata('email') . '</b>. Lihat di spam jika email tidak ada di kotak masuk. Jika tidak ada sama sekali, anda bisa mengirim ulang email dengan klik tombol di bawah ini.
                ' . form_open('main/request') . '
                    <input type="submit" name="resend" value="Kirim Ulang" class="btn btn-dark btn-xs">
                ' . form_close() . '
                '
            );
            redirect('main/request');
        }

        $this->data['title']    = 'Request PIN';
        $this->data['content']    = 'main/request';
        $this->template($this->data, 'main', ['sidebar', 'navbar']);
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

    public function laporan()
    {
        $this->load->view('mahasiswa/tanda_terima');
    }
}
