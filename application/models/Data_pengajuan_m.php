<?php defined('BASEPATH') || exit('No direct script allowed');

class Data_pengajuan_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'data_pengajuan';
		$this->data['primary_key'] = 'id';
	}
}

