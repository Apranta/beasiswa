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
        $this->testMail();
        $this->data['title']    = 'Halaman Utama';
        $this->data['content']  = 'main';
        $this->load->view('main', $this->data);
    }

    public function request()
    {
        if ($this->POST('request')) {
            $this->data['request'] = [
            'nim'    => $this->POST('nim'),
            'email'    => $this->POST('email')
            ];
            redirect('main/request');
        }

        $this->data['title']    = 'Request PIN';
        $this->data['content']    = 'main/request';
        $this->template($this->data, 'main', ['sidebar', 'navbar']);
    }

    private function testMail()
    {
        // TODO: create CI_PHPMailer library
        $this->load->library('CI_PHPMailer/ci_phpmailer');
        try 
        {
            $this->ci_phpmailer->setServer('smtp.gmail.com');
            $this->ci_phpmailer->setAuth('testdevsmail@gmail.com', '4kuGanteng');
            $this->ci_phpmailer->setAlias('beasiswa@polsri.ac.id', 'Humas Polsri');
            $this->ci_phpmailer->sendMessage('arliansyah_azhary@yahoo.com', 'Subject here', 'Bodyyyyyyy here');    
        } 
        catch (Exception $e)
        {
            $this->ci_phpmailer->displayError();
        }
    }
}
