<?php

class BarangModel extends CI_Model
{
	public function all()
	{
		$sql = "select b.id, b.nama, b.stok, b.status, k.nama as kategori, b.harga, b.expired_date, b.purchasing_date
				from barang as b
				join kategori as k on b.kategori_id = k.id
				where b.deleted_at IS NULL
				order by b.nama asc";

		return $this->db->query($sql)->result_array();
	}

	public function get_by_id($id)
	{
		$this->db->where('id', $id);

		return $this->db->get('barang')->row_array();
	}

	public function insert($data = [])
	{
		$this->db->insert('barang', $data);

		$this->db->where(['kategori_id' => $data['kategori_id'], 'created_at' => $data['created_at']]);

		return $this->db->get('barang')->row_array();
	}

	public function update($id, $data = [])
	{
		return $this->db->update('barang', $data, ['id' => $id]);
	}

	public function delete($id, $data = [])
	{
		return $this->db->update('barang', $data, ['id' => $id]);
	}

	public function get_by_kategori($id)
	{
		$sql = "select *
				from barang
				where deleted_at IS NULL and kategori_id = ?";

		return $this->db->query($sql, [$id])->result_array();
	}
}