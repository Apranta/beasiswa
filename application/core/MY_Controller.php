<?php

class MY_Controller extends CI_Controller
{
    public $title = 'Sistem Informasi Beasiswa Politeknik Negeri Sriwijaya';

    public function __construct()
    {
        // compress html output to optimize page load heheheheheheh
        //ob_start([$this, 'sanitizeOutput']);

        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        
        $this->data['img_url']              = base_url('assets/img');
        $this->data['kemahasiswaan_img']    = $this->data['img_url'] . '/kemahasiswaan.jpeg';
        $this->data['pih_img']              = $this->data['img_url'] . '/pih.png';
        $this->data['polsri_img']           = $this->data['img_url'] . '/polsri.jpg';
    }

    public function template($data, $module = '', $excludedParts = [])
    {
        if (!empty($module)) { $module .= '/';
        }
        $data['module'] = $module;
        $data['excluded_parts'] = $excludedParts;
        return $this->load->view($module . 'includes/layout', $data);
    }

    public function POST($name)
    {
        return $this->input->post($name);
    }

    public function GET($name, $clean = false)
    {
        return $this->input->get($name, $clean);
    }

    public function METHOD()
    {
        return $this->input->method();
    }

    public function flashmsg($msg, $type = 'success',$name='msg')
    {
        return $this->session->set_flashdata($name, '<div class="alert alert-'.$type.' alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$msg.'</div>');
    }

    public function upload($id, $directory, $tag_name = 'userfile')
    {
        if ($_FILES[$tag_name]) {
            $upload_path = realpath(APPPATH . $directory . '/');
            @unlink($upload_path . '/' . $id . '.jpg');
            $config = [
            'file_name'         => $id . '.jpg',
            'allowed_types'        => 'jpg|png|bmp|jpeg',
            'upload_path'        => $upload_path
            ];
            $this->load->library('upload');
            $this->upload->initialize($config);
            return $this->upload->do_upload($tag_name);
        }
        return false;
    }

    public function dump($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

    protected function goBack($index) 
    {
        echo '<script type="text/javascript">window.history.go(' . $index . ');</script>'; 
    }

    protected function checkPermissions($condition, $message = [ 'Required parameter is missing', 'danger' ], $options = [], $redirect = -1)
    {
        if ($condition) {
            if (count($options) <= 0) {
                $this->flashMessage($message[0], $message[1]);
                $this->goBack($redirect);
                exit;
            }
            
            if (in_array(CLEAR_SESSIONS, $options)) {
                $this->session->sess_destroy();
            }

            $this->flashMessage($message[0], $message[1]);

            if (in_array(REDIRECT_LOGIN, $options)) {
                redirect($redirect); // set $redirect route here with your login route
            }

            if (in_array(REDIRECT_RULES, $options)) {
                $this->redirectRules($redirect);
            }

            $this->goBack($redirect);
            exit;
        }
    }

    /**
     * set your application route rules here
     */
    protected function redirectRules($value)
    {
        switch ($value)
        {
        case 'admin':
            redirect('admin');
            break;
        case 'mahasiswa':
            redirect('mahasiswa');
            break;
        default:
            $this->session->sess_destroy();
            redirect('login');
            break;
        }
    }

    protected function flashMessage($msg, $type = 'success',$name = 'msg')
    {
        return $this->session->set_flashdata($name, '<div class="alert alert-'.$type.' alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$msg.'</div>');
    }

    protected function __generateRandomID() 
    {
        return mt_rand();
    }

    protected function __generateRandomString($length = 8, $options = [ 'uppercase', 'lowercase', 'number', 'symbol' ])
    {
        $chars = '';
        if (in_array('uppercase', $options)) {
            $chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        }
        if (in_array('lowercase', $options)) {
            $chars .= 'abcdefghijklmnopqrstuvwxys';
        }
        if (in_array('number', $options)) {
            $chars .= '0123456789';
        }
        if (in_array('symbol', $options)) {
            $chars .= '!@#$%^&*';
        }

        $chars = str_split($chars);
        $charsLength = count($chars);
        $result = '';
        for ($i = 0; $i < $length; $i++)
        {
            $result .= $chars[mt_rand() % $charsLength];
        }

        return $result;
    }

    // this method is used to compress html output
    protected function sanitizeOutput($buffer)
    {

        $search = [
            '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
            '/[^\S ]+\</s',     // strip whitespaces before tags, except space
            '/(\s)+/s',         // shorten multiple whitespace sequences
            '/<!--(.|\s)*?-->/' // Remove HTML comments
        ];
        $replace = [
            '>',
            '<',
            '\\1',
            ''
        ];
        
        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $doc->loadHTML($buffer);
        $head = $doc->getElementsByTagName('head');
        if (isset($head[0])) {
            $analytics = "
        		<!-- Google Analytics -->
        		<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

				ga('create', 'UA-XXXXX-Y', 'auto');
				ga('send', 'pageview');
				</script>
				<!-- End Google Analytics -->"; // replace UA-XXXXX-Y with your tracking ID

            $fragment = $doc->createDocumentFragment();
            $fragment->appendXML($analytics);
            $head[0]->appendChild($fragment);
            $buffer = preg_replace($search, $replace, $doc->saveHTML());
        }
        
        return $buffer;
    }
}
