<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KategoriModel');  
		$this->load->model('BarangModel');  
		$this->load->model('HargaModel');  
		$this->load->model('TransaksiModel');  
		$this->load->library('Pdf');
	}

	public function index()
	{
		$data['transaksi'] = $this->TransaksiModel->all();
		$this->load->view('header', $data);
		$this->load->view('transaksi_index' , $data);
	}

	public function add()
	{
		$data['kategori'] = $this->KategoriModel->all();
		$data['title'] = 'Transaksi Stok Barang';
		$data['barang'] = $this->BarangModel->all();
		// var_dump($data['barang']);

		$this->load->view('header', $data);
		$this->load->view('transaksi_add', $data);
	}

	public function submit()
	{
		//utk insert ke table barang
		$barang_id = $this->input->post('barang_id');
		$jenis_transaksi = $this->input->post('jenis_transaksi');
		$jumlah_barang = $this->input->post('jumlah_barang');
		$date_time = $this->input->post('date_time');

		$barang = $this->BarangModel->get_by_id($barang_id);

		// var_dump($barang);

		// die();

		if ($jenis_transaksi == 0) { //barang keluar
			if ($barang['stok'] < $jumlah_barang) {
				$_SESSION['notif']['type'] = 'danger';
				$_SESSION['notif']['message'] = 'Jumlah stok tidak cukup. Jumlah stok saat ini ' . $barang['stok'];

				$_SESSION['fields']['barang_id'] = $barang_id;
				$_SESSION['fields']['jenis_transaksi'] = $jenis_transaksi;
				$_SESSION['fields']['jumlah_barang'] = $jumlah_barang;
				$_SESSION['fields']['date_time'] = $date_time;

				redirect('transaksi/add');
			}

			$stok_akhir = $barang['stok'] - $jumlah_barang;
		}

		else { //barang masuk
			$stok_akhir = $barang['stok'] + $jumlah_barang;
		}
		
		$data = [
			'barang_id' => $barang_id,
			'jenis_transaksi' => $jenis_transaksi,
			'jumlah_barang' => $jumlah_barang,
			'stok_akhir' => $stok_akhir,
			'date_time' => date('Y-m-d H:i:s'), 
		];

		$result = $this->TransaksiModel->insert($data);

		//update stok di table barang
		$data_barang = [
			'stok' => $stok_akhir,
			'updated_at' => date('Y-m-d H:i:s'), 
		];

		$result = $this->BarangModel->update($barang_id, $data_barang);

		redirect('transaksi');
	}

	public function pdf()
	{
		$pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR STOK MASUK/KELUAR BARANG ',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,8,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(35,6,'NAMA BARANG',1,0);
        $pdf->Cell(35,6,'JENIS TRANSAKSI',1,0);
        $pdf->Cell(35,6,'JUMLAH BARANG',1,0);
        $pdf->Cell(35,6,'STOK BARANG',1,0);
        $pdf->Cell(35,6,'TANGGAL',1,1);
        $pdf->SetFont('Arial','',10);
        $transaksi = $this->TransaksiModel->all();
        foreach ($transaksi as $t){
            $pdf->Cell(35,6,$t['nama'],1,0);
            $pdf->Cell(35,6,$t['jenis_transaksi'],1,0);
            $pdf->Cell(35,6,$t['jumlah_barang'],1,0);
            $pdf->Cell(35,6,$t['stok_akhir'],1,0); 
            $pdf->Cell(35,6,$t['date_time'],1,1); 
        }
         $pdf->Output();
	}
}
