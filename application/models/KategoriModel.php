<?php

class KategoriModel extends CI_Model
{
	public function all()
	{
		return $this->db->get('kategori')->result_array();
	}

	public function get_by_id($id)
	{
		$this->db->where('id', $id);

		return $this->db->get('kategori')->row();
	}
}