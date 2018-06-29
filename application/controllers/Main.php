<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

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
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 3;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'testdevsmail@gmail.com';                 // SMTP username
            $mail->Password = '4kuGanteng';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('beasiswa@polsri.ac.id', 'Humas Polsri');
            $mail->addAddress('arliansyah_azhary@yahoo.com', 'Joe User');     // Add a recipient

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
