<?php defined('BASEPATH') || exit('No direct script allowed');

class Mahasiswa_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name']  = 'mahasiswa';
        $this->data['primary_key'] = 'nim';
    }

    public function getPengajuanMahasiswa($cond = '')
    {
        $this->db->select('*')
            ->from($this->data['table_name'])
            ->join('data_pengajuan', $this->data['table_name'] . '.nim = data_pengajuan.nim', 'left')
            ->join('data_keluarga', $this->data['table_name'] . '.nim = data_keluarga.nim', 'left');
        if (!empty($cond)) {
            $this->db->where($cond);
        }
        $query = $this->db->get();
        return $query->result();
    }
}

