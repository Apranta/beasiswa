<?php defined('BASEPATH') || exit('No direct script allowed');

class Mahasiswa_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'mahasiswa';
		$this->data['primary_key'] = 'nim';
	}
}

