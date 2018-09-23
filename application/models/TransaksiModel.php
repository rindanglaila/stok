<?php

class TransaksiModel extends CI_Model
{
	public function all()
	{
		$sql = "select t.id, b.nama, t.jenis_transaksi, t.jumlah_barang, t.stok_akhir, t.date_time, b.stok, b.expired_date
				from transaksi as t
				join barang as b on t.barang_id = b.id
				where b.deleted_at IS NULL
				order by t.id desc";

		return $this->db->query($sql)->result_array();
	}

	public function get_by_id($id)
	{
		$this->db->where('id', $id);

		return $this->db->get('transaksi')->row_array();
	}

	public function insert($data = [])
	{
		$this->db->insert('transaksi', $data);
	}
}