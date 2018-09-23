<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KategoriModel');  
		$this->load->model('BarangModel');  
		$this->load->model('HargaModel');  
		$this->load->library('Pdf');

	}

	public function index()
	{
		$data['barang'] = $this->BarangModel->all();

		//var_dump($data);
		$this->load->view('header', $data);
		$this->load->view('barang_index' , $data);

	}

	public function add()
	{
		$data['kategori'] = $this->KategoriModel->all();
		$data['title'] = 'Input Barang';

		// var_dump($_GET);
		$this->load->view('header', $data);
		$this->load->view('barang_add', $data);

	}

	public function submit()
	{
		// var_dump($_POST);

		//utk insert ke table barang
		$nama = $this->input->post('nama');
		$stok = $this->input->post('stok');
		$status = $this->input->post('status');
		$kategori_id = $this->input->post('kategori_id');
		$harga = $this->input->post('harga');
		$expired_date = $this->input->post('expired_date');
		$purchasing_date = $this->input->post('purchasing_date');

		$data = [
			'nama' => $nama,
			'stok' => $stok,
			'status' => $status,
			'kategori_id' => $kategori_id, 
			'harga' => $harga,
			'expired_date' => $expired_date,
			'purchasing_date' => $purchasing_date,
			'created_at' => date('Y-m-d H:i:s'), 
			'updated_at' => date('Y-m-d H:i:s'), 
		];

		$result = $this->BarangModel->insert($data);

		redirect('barang');

	}

	public function edit($id)
	{
		$barang = $this->BarangModel->get_by_id($id);
		//var_dump($barang);

		$data['kategori'] = $this->KategoriModel->all();
		$data['title'] = 'Edit Barang';

		$data['barang'] = $barang;
		$this->load->view('header', $data);
		$this->load->view('barang_edit' , $data);

	}

	public function postEdit()
	{
		
		//utk insert ke table barang
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$stok = $this->input->post('stok');
		$status = $this->input->post('status');
		$kategori_id = $this->input->post('kategori_id');
		$harga = $this->input->post('harga');
		$expired_date = $this->input->post('expired_date');
		$purchasing_date = $this->input->post('purchasing_date');

		$data = [
			'nama' => $nama,
			'stok' => $stok,
			'status' => $status,
			'kategori_id' => $kategori_id, 
			'harga' => $harga,
			'expired_date' => $expired_date,
			'purchasing_date' => $purchasing_date,
			'updated_at' => date('Y-m-d H:i:s'), 
		];

		$result = $this->BarangModel->update($id, $data);

		redirect('barang');

	}

	public function delete($id)
	{
		$data = [
			'deleted_at' => date('Y-m-d H:i:s'),
		];

		$result = $this->BarangModel->delete($id, $data);

		redirect('barang');
	}

	public function kartu_stok($id)
	{
		//ambil data barang
		$barang = $this->BarangModel->get_by_id($id);

		$pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
      
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,7,'KARTU STOK BARANG ' ,0,1,'C');
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(190,7,'Nama Barang : '. $barang['nama'],0,1,'L');
		$pdf->SetFont('Arial','B',11);
        $pdf->Cell(190,7,'Harga : Rp. '. $barang['harga'],0,1,'L');


        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,8,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,6,'TANGGAL',1,0);
        $pdf->Cell(40,6,'JENIS TRANSAKSI',1,0);
        $pdf->Cell(40,6,'JUMLAH BARANG',1,0);
        $pdf->Cell(35,6,'STOK AKHIR',1,0);
        $pdf->Cell(30,6,'TTD',1,1);
        $pdf->SetFont('Arial','',10);
        
		for ($i=0; $i < 13; $i++) { 
		        		                
		        $pdf->Cell(30,6,'',1,0);
		        $pdf->Cell(40,6,'',1,0);
		        $pdf->Cell(40,6,'',1,0);
		        $pdf->Cell(35,6,'',1,0); 
		        $pdf->Cell(30,6,'',1,1); 
		}
         
        $pdf->Output();
	}
}
