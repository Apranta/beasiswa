<?php defined('BASEPATH') || exit('No direct script allowed');

class Data_keluarga_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'data_keluarga';
		$this->data['primary_key'] = 'nim';
	}
}

