<?php

class HargaModel extends CI_Model
{

	public function get_by_barang_id($barang_id)
	{
		$this->db->where('barang_id', $barang_id);

		return $this->db->get('harga')->result_array();
	}

	public function insert($data = [])
	{
		$this->db->insert('harga', $data);

		// select *
		// from barang as b
		// where b.kategori_id = 4
		// and b.created_at = '2018-08-11 14:44:30'

		//$this->db->where(['kategori_id' => $data_harga['kategori_id'], 'created_at' => $data_harga['created_at']]);

		//return $this->db->get('barang')->row_array();
	}
}