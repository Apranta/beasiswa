<?php defined('BASEPATH') || exit('No direct script allowed');

class User_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name']  = 'user';
        $this->data['primary_key'] = 'username';
    }

    public function login($data)
    {
        $result = $this->get_row(['username' => $data['username'], 'password' => $data['password']]);
        if (!isset($result)) {
            return $result;
        }
        $this->session->set_userdata(
            [
            'username'    => $result->username,
            'role'    => $result->role
            ]
        );
        return $result;
    }
}

