<?php defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Option extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_barang');
		$this->load->model('model_member');
		$this->load->model('model_penjualan');
		$this->load->model('model_login');
		$this->load->model('model_persenan');
		$this->load->library('Cetak_pdf');
		if (!$this->session->userdata('id')) {
			header('location:http://localhost/penjualan');
		}
	}

	public function get_barang()
	{
		$list = $this->model_barang->get_datatables();
		$data = [];
		$no = $_POST['start'];
		$n = 0;
		foreach ($list as $barang) {
			$n++;
			$row = [];
			$row[] = $n;
			$row[] = $barang->kode_barang;
			$row[] = $barang->nama_barang;

			// if ($this->session->userdata('level') == 1) {
				$row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_barang(' . "'" . $barang->id_barang . "'" . ')"><i class="far fa-edit"></i></a>
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_barang(' . "'" . $barang->id_barang . "'" . ')"><i class="far fa-trash-alt"></i></a>';
			// } else {
			// 	$row[] = '<a class="btn btn-sm btn-warning disabled" href="javascript:void(0)" title="Edit" ><i class="far fa-edit"></i></a>
			// 	<a class="btn btn-sm btn-danger disabled" href="javascript:void(0)" title="Hapus" ><i class="far fa-trash-alt"></i></a>';
			// }
			$data[] = $row;
		}
		$output = [
			"draw" => $_POST['draw'],
			// "recordsTotal" => $this->model_barang->count_all(),
			// "recordsFiltered" => $this->model_barang->count_filtered(),
			"data" => $data,
		];
		echo json_encode($output);
	}
	// ============================================ DATA AKTIVITAS LOGIN & LOGOUT
	public function data_aktivitas()
	{
		$this->load->view('super_admin/data_log_activity');
	}

	public function get_data_log_activity()
	{
		$this->load->library('pagination');
		$this->load->model('model_log_activity');
		$list = $this->model_log_activity->get_datatables();
		$data = [];
		$no = $_POST['start'];
		$n = 0;
		foreach ($list as $log_activity) {
			$n++;
			$row = [];
			$row[] = $n;
			$row[] = $log_activity->nama;
			$row[] = $log_activity->status;
			$row[] = $log_activity->login;
			$row[] = $log_activity->logout;
			if ($log_activity->status == 0) {
				$row[] = "Kasir";
			} else {
				$row[] = "Admin";
			}
			$data[] = $row;
		}
		$output = [
			"draw" => $_POST['draw'],
			// "recordsTotal" => $this->model_member->count_all(),
			// "recordsFiltered" => $this->model_member->count_filtered(),
			"data" => $data,
		];
		echo json_encode($output);
	}
	// ============================================ DATA AKTIVITAS
	public function data_log_aktivitas()
	{
		$this->load->view('super_admin/data_log_aktivitas');
	}

	public function get_data_log_aktivitas()
	{
		$this->load->model('model_log_aktivitas');
		$list = $this->model_log_aktivitas->get_datatables();
		$data = [];
		$no = $_POST['start'];
		$n = 0;
		foreach ($list as $log_aktivitas) {
			$n++;
			$row = [];
			$row[] = $n;
			$row[] = $log_aktivitas->nama;
			$row[] = $log_aktivitas->level;
			$row[] = $log_aktivitas->aktivitas;
			$row[] = $log_aktivitas->waktu;
			$data[] = $row;
		}
		$output = [
			"draw" => $_POST['draw'],
			// "recordsTotal" => $this->model_member->count_all(),
			// "recordsFiltered" => $this->model_member->count_filtered(),
			"data" => $data,
		];
		echo json_encode($output);
	}
	// ============================================ DATA PERSENAN
	public function data_persenan()
	{
		$this->load->view('super_admin/data_persenan');
	}

	public function get_data_persenan()
	{
		$this->load->model('model_persenan');
		$list = $this->model_persenan->get_datatables();
		$data = [];
		$no = $_POST['start'];
		$n = 0;
		foreach ($list as $data_persenan) {
			$n++;
			$row = [];
			$row[] = $n;
			$row[] = $data_persenan->pihak;
			$row[] = $data_persenan->persenan;
			$row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit Data" onclick="edit_data(' . "'" . $data_persenan->id . "'" . ')"><i class="far fa-edit"></i></a>';
			$data[] = $row;
		}
		$output = [
			"draw" => $_POST['draw'],
			// "recordsTotal" => $this->model_member->count_all(),
			// "recordsFiltered" => $this->model_member->count_filtered(),
			"data" => $data,
		];
		echo json_encode($output);
	}

	public function edit_data($id)
	{
		$data = $this->model_persenan->get_by_id_persenan($id);
		echo json_encode($data);
	}

	public function update_persenan()
	{
		$data = [
			'id' 				=> $this->input->post('id'),
			'pihak' 			=> $this->input->post('pihak'),
			'persenan' 			=> $this->input->post('persenan'),
		];
		$this->model_persenan->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}
	// ============================================ DATA barang
	public function data_barang()
	{
		$this->load->view('admin/barang_view');
	}

	public function hapus_barang($id_barang)
	{
		$this->load->model('model_log_aktivitas');
		$level = $this->session->userdata('level');
		if ($level === "0") {
			$level1 = "Kasir";
		} else if ($level === "1") {
			$level1 = "Admin";
		} else {
			$level1 = "Superadmin";
		}
		$data_log = [
			'nama' => $this->session->userdata('username'),
			'level' => $level1,
			'aktivitas'	 => "Menghapus data barang",
			'waktu' => date("Y-m-m h:i:s")
		];
		$this->model_log_aktivitas->input_log($data_log);
		$this->model_barang->delete_by_id_barang($id_barang);
		echo json_encode(["status" => TRUE]);
	}

	public function edit_barang($id_barang = null)
	{
		$data = $this->model_barang->get_by_id_barang($id_barang);
		echo json_encode($data);
	}

	public function update_barang()
	{
		$this->load->model('model_log_aktivitas');
		$level = $this->session->userdata('level');
		if ($level === "0") {
			$level1 = "Kasir";
		} else if ($level === "1") {
			$level1 = "Admin";
		} else {
			$level1 = "Superadmin";
		}
		$data_log = [
			'nama' => $this->session->userdata('username'),
			'level' => $level1,
			'aktivitas'	 => "Mengubah data barang '" . $this->input->post('nama_barang') . "'",
			'waktu' => date("Y-m-m h:i:s")
		];
		$this->model_log_aktivitas->input_log($data_log);
		$data = [
			'id_barang'			=> $this->input->post('id_barang'),
			'kode_barang' 		=> $this->input->post('kode_barang'),
			'nama_barang' 		=> $this->input->post('nama_barang'),
		];
		$this->model_barang->update(array('id_barang' => $this->input->post('id_barang')), $data);
		echo json_encode(array("status" => TRUE));
	}

	function simpan_barang()
	{
		$this->load->model('model_log_aktivitas');
		$level = $this->session->userdata('level');
		if ($level === "0") {
			$level1 = "Kasir";
		} else if ($level === "1") {
			$level1 = "Admin";
		} else {
			$level1 = "Superadmin";
		}
		$data_log = [
			'nama' => $this->session->userdata('username'),
			'level' => $level1,
			'aktivitas'	 => "Menambahkan data barang '" . $this->input->post('nama_barang') . "'",
			'waktu' => date("Y-m-m h:i:s")
		];
		$this->model_log_aktivitas->input_log($data_log);
		$this->_validatebarang();
		$data = [

			'id_barang' 		=> $this->input->post('id_barang'),	
			'kode_barang' 		=> $this->input->post('kode_barang'),
			'nama_barang' 		=> $this->input->post('nama_barang'),
		];

		$insert = $this->model_barang->save($data);
		echo json_encode(array("status" => TRUE));
	}

	private function _validatebarang()
	{
		$data = [];
		$data['error_string'] = [];
		$data['inputerror'] = [];
		$data['status'] = TRUE;

		if ($this->input->post('kode_barang') == '') {
			$data['inputerror'][] = 'kode_barang';
			$data['error_string'][] = 'Kode barang is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('nama_barang') == '') {
			$data['inputerror'][] = 'nama_barang';
			$data['error_string'][] = 'Nama barang is required';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}

	public function cari_barang()
	{
		$data = $this->model_barang->cari_barang($_REQUEST['keyword']);
		echo json_encode($data);
	}

	// ================================= DATA USER


	// ================================================================
	// public function data_barang(){
	// 	$this->load->view('kasir/barang_view');
	// }

	// public function hapus_barang($id_barang){
	// 	$this->model_barang->delete_by_id_barang($id_barang);
	// 	echo json_encode(["status" => TRUE]);
	// }

	// public function edit_barang($id_barang){
	// 	$data = $this->model_barang->get_by_id_barang($id_barang);
	// 	echo json_encode($data);
	// }

	// public function update_barang(){
	// 	$data =[
	// 		'id_barang'			=> $this->input->post('id_barang'),
	// 		'nama_barang' 		=> $this->input->post('nama_barang'),
	// 		'harga_beli' 		=> $this->input->post('harga_beli'),
	// 		'harga_jual' 		=> $this->input->post('harga_jual'),
	// 		// 'setok' 			=> $this->input->post('setok'),
	// 	];
	// 	$this->model_barang->update(array('id_barang' => $this->input->post('id_barang')), $data);
	// 	echo json_encode(array("status" => TRUE));
	// }

	// function simpan_barang(){
	// 	$this->_validate();
	// 	$data =[

	// 		'id_barang' 		=> $this->input->post('id_barang'),
	// 		'nama_barang' 		=> $this->input->post('nama_barang'),
	// 		'harga_beli' 		=> $this->input->post('harga_beli'),
	// 		'harga_jual' 		=> $this->input->post('harga_jual')
	// 		// 'setok' 			=> $this->input->post('setok') 
	// 	];

	// 	$insert = $this->model_barang->save($data);
	// 	echo json_encode(array("status" => TRUE));
	// }

	// private function _validate(){
	// 	$data = [];
	// 	$data['error_string'] = [];
	// 	$data['inputerror'] = [];
	// 	$data['status'] = TRUE;

	// 	if($this->input->post('nama_barang') == ''){
	// 		$data['inputerror'][] = 'nama_barang';
	// 		$data['error_string'][] = 'Nama barang is required';
	// 		$data['status'] = FALSE;
	// 	}

	// 	if($this->input->post('harga_beli') == ''){
	// 		$data['inputerror'][] = 'harga_beli';
	// 		$data['error_string'][] = 'Harga beli is required';
	// 		$data['status'] = FALSE;
	// 	}

	// 	if($this->input->post('harga_jual') == ''){
	// 		$data['inputerror'][] = 'harga_jual';
	// 		$data['error_string'][] = 'Harga jual is required';
	// 		$data['status'] = FALSE;
	// 	}

	// if($this->input->post('setok') == ''){
	//     $data['inputerror'][] = 'setok';
	//     $data['error_string'][] = 'Setok is required';
	//     $data['status'] = FALSE;
	// }

	// 	if($this->input->post('id_barang') == ''){
	// 		$data['inputerror'][] = 'id_barang';
	// 		$data['error_string'][] = 'Kode barang is required';
	// 		$data['status'] = FALSE;
	// 	}

	// 	if($data['status'] === FALSE){
	// 		echo json_encode($data);
	// 		exit();
	// 	}
	// }

	// public function cari_barang(){
	// 	$data = $this->model_barang->cari_barang($_REQUEST['keyword']);
	// 	echo json_encode( $data);
	// }

	public function add_keranjang()
	{
		$data = [
			'id' => $this->input->post('id'),
			'name' => $this->input->post('nama'),
			'jenis' => $this->input->post('jenis_promo'),
			'potongan' => $this->input->post('potongan'),
			'harga_potongan' => $this->input->post('harga_potongan'),
			'price' => str_replace('.', '', $this->input->post('harga')),
			'qty' => $this->input->post('qty')
		];
		$insert = $this->cart->insert($data);
		echo json_encode(["status" => TRUE]);
	}

	public function list_transaksi()
	{
		$data = [];
		$no = 1;
		foreach ($this->cart->contents() as $items) {
			$row = [];
			$row[] = $no;
			$row[] = $items["name"];
			// if($items["jenis"] == "minimal"){
			// 	$row[] = "min";
			// }else{
			// 	$row[] = "dis";
			// }
			//$row[] = $items["jenis"];
			// $row[] = $items["potongan"];
			// $row[] = $items["harga_potongan"];
			$row[] = 'Rp. ' . number_format($items['price'], 0, '', '.') . ',-';
			$row[] = $items["qty"];
			//$row[] = 'Rp. ' . number_format( $items['subtotal'], 0 , '' , '.' ) . ',-';
			//$row[] = 'Rp. ' . number_format( $items['qty'] * $items['price'], 0 , '' , '.' ) . ',-';
			// if($items["jenis"] == 'minimal'){
			// $induk = floor($items["qty"] / $items["potongan"]);
			// $sisa = $items["qty"] % $items["potongan"];
			$jumlah = $items['qty'];
			$hitung = $items['price'];
			// $sub = ($induk * $items["harga_potongan"]) + ($items['price'] * $sisa);

			// Kalo Ingin Menggunakan Diskon Harga Membeli banyak lebih dari 10
			// if ($jumlah >= 10){
			// 	$diskon1 = $hitung*40/100;
			// 	$diskon2 = $hitung-$diskon1;
			// 	$sub     = $diskon2*$jumlah;
			// 	$row[] = 'Rp. ' . number_format( $sub, 0 , '' , '.' ) . ',-';
			// } else {
			// 	$sub = $jumlah*$hitung;
			// 	$row[] = 'Rp. ' . number_format( $sub, 0 , '' , '.' ) . ',-';
			// }

			$sub = $jumlah * $hitung;
			$row[] = 'Rp. ' . number_format($sub, 0, '', '.') . ',-';

			// }else{
			// 	$diskon = $items['qty'] * ($items['price'] - ($items['price'] * $items['potongan']/100));
			// 	$row[] = 'Rp. ' . number_format( $diskon, 0 , '' , '.' ) . ',-';
			// }
			//add html for action
			$row[] = '<a 
			href="javascript:void()" style="color:rgb(255,128,128);
			text-decoration:none" onclick="deletebarang('
				. "'" . $items["rowid"] . "'" . ',' . "'" . $items['subtotal'] .
				"'" . ')"> <i class="fas fa-times">Batal</i></a>';
			$data[] = $row;
			$no++;
		}
		$output = [
			"data" => $data,
		];
		//$this->auto_update();
		echo json_encode($output);
	}

	public function auto_update()
	{
		$tgl = date('Y-m-d');
		$data = ['sstatus_promo' => 0];
		$this->db->where('ahir_promo <', $tgl);
		$this->db->update('barang', $data);
		return true;
	}

	public function cetak_nota()
	{
		$this->load->model('model_toko');
		$bayar = $this->input->post('bayar');
		$kembali = $this->input->post('kembali');
		$toko = $this->model_toko->get_data_toko();
		$kasir = $this->session->userdata('username');
		$photo = "http://localhost/penjualan/assets/images/koperasi.png";
		$no = 1;
		$output = '';
		$output = '
		<b><p class="text-dark" id="kolom1">' . $toko->nama_toko . '</p></b>
		<b><center><p id="kolom2">' . $toko->alamat_toko . '<br></b>
		<b>Telepon : ' . $toko->telephon_toko . '</p></center></b>
		<p id="kolom3">
		<b>Tanggal : ' . date('Y-m-d / h:i:s') . '<br>Kasir : ' . $kasir . '</b>
		</p>
		<table>
		<style>
		th, td {
			font-size: 13px;
			text-align: center;
		}
		#kolom1 {
			font-size: 15px;
			text-align: center;
			font-weight: bold;
		}
		#kolom2 {
			font-size: 13px;
		}
		#kolom3 {
			font-size: 13px;
			border-top:1px dashed;
			text-align: center;
		}
		#kolom4 {
			font-size: 13px;
		}
		</style>
		<thead>
		<tr style="border-top:1px dashed">
		<th width="30"><b>No</b></th>
		<th width="80"><b>Nama barang</b></th>
		<!-- <th width="50"><b>Harga</b></th> -->
		<th></th>
		<th></th>
		<th></th>
		<!-- <th></th> -->
		<!-- <th><b>Jumlah</b></th> -->
		<th><b>Total Harga</b></th>
		</tr>
		</thead>
		<tbody>';
		foreach ($this->cart->contents() as $row) {
			$output .= '<tr>
			<td><b>' . $no++ . '</b></td>
			<td><b>' . $row["name"] . '</b></td>
			<!-- <td><b>Rp.' . number_format($row["price"], 0, ',', '.') . '</b></td> -->
			<!-- <td><b>' . $row["qty"] . '</b></td> -->
			<td></td>
			<td></td>
			<td></td>
			<!-- <td></td> -->
			<td><b>Rp.' . number_format($row["subtotal"], 0, ',', '.') . '</b></td>
			</tr>';
		}
		$output .= '<tr style="border-top:1px dashed">
		<td colspan="4" style="text-align:right"><b>Total :</b></td>
		<td><b>Rp.' . number_format($this->cart->total(), 0, ',', '.') . '</b></td>
		</tr>
		<tr>
		<td colspan="4" style="text-align:right"><b>Bayar :</b></td>
		<td><b>Rp.' . number_format($bayar, 0, ',', '.') . '</b></td>
		</tr>
		<tr style="border-bottom:1px dashed">
		<td colspan="4" style="text-align:right"><b>Kembali :</b></td>
		<td><b>Rp.' . $kembali . '</b></td>
		</tr>
		</tbody>
		</table>
		<div style="text-align:center" id="kolom4"><b>Terimakasih Atas Kunjungan Anda</b></div>';
		echo $output;
	}

	public function shoping()
	{
		if (!empty($this->cart->contents())) {
			$data = []; //Wadah Kosong
			foreach ($this->cart->contents() as $insert) {
				$id 		= $insert['id'];
				$q 			= $insert['qty'];
				$rowid 		= $insert['rowid'];
				$kasir		= $this->session->userdata('username');
				$tgl 		= date('Y-m-d');
				$datestring = '%H:%i';
				$time 		= time();
				$waktu 		= mdate($datestring, $time);
				$total		= $insert['subtotal'];

				$data[] = [
					'kasir' => $kasir,
					'kode_brg' => $insert['id'],
					'jumlah' => $insert['qty'],
					'nama_brg' => $insert['name'],
					'harga_brg' => $insert['price'],
					'total_harga' => $insert['subtotal'],
					'tgl_transaksi' => $tgl,
					'waktu' => $waktu
				]; // isi air ke wadah
			}
			$insert =  $this->model_barang->insert_bulk_penjualan($data); //Masukan ke bak air
			if ($insert) {
				// $hasil = $this->model_barang->get_setok($id);
				// $sisa =  $hasil->setok;
				// $qty = $sisa-$q;
				// $aksi = $this->model_barang->update_setok($id,$qty);
				$this->cart->destroy();
				echo json_encode(["status" => TRUE]);
			} else {
				echo json_encode(["status" => FALSE]);
			}
		} else {
			echo ('404');
		}
	}

	public function deletebarang($rowid)
	{
		$this->cart->update([
			'rowid' => $rowid,
			'qty' => 0,
		]);
		echo json_encode(["status" => TRUE]);
	}

	public function data_penjualan()
	{
		$x['data'] = $this->model_barang->get_all_barang();
		$this->load->view('kasir/penjualan_view', $x);
	}

	public function get_penjualan()
	{
		$this->load->model('model_penjualan');
		$list = $this->model_penjualan->get_datatables();
		$data = [];
		$no = $_POST['start'];
		$n = 0;
		foreach ($list as $barang) {
			$n++;
			$row = [];
			$row[] = $n;
			$row[] = $barang->nama_brg;
			$row[] = $barang->jumlah;
			$row[] = $barang->kasir;
			$row[] = 'Rp. ' . number_format($barang->total_harga, 0, ',', '.') . '';
			$row[] = $barang->tgl_transaksi;
			$row[] = $barang->waktu;
			$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus Penjualan" onclick="delete_penjualan(' . "'" . $barang->id_penjualan . "'" . ')"><i class="far fa-trash-alt"></i></a>';
			$data[] = $row;
		}

		$output = [
			"draw" => $_POST['draw'],
			// "recordsTotal" => $this->model_penjualan->count_all(),
			// "recordsFiltered" => $this->model_penjualan->count_filtered(),
			"data" => $data,
		];
		echo json_encode($output);
	}

	public function hapus_penjualan($id_penjualan)
	{
		$this->model_penjualan->delete_by_id_penjualan($id_penjualan);
		echo json_encode(["status" => TRUE]);
	}

	public function data_toko()
	{
		$this->load->view('profil/toko_view');
	}

	public function get_data_toko()
	{
		$this->load->model('model_toko');
		$data = $this->model_toko->get_data_toko();
		echo json_encode($data);
	}

	public function simpan_data_toko()
	{
		$this->load->model('model_toko');
		$data = [
			'nama_toko' => $this->input->post('nama_toko'),
			'alamat_toko' => $this->input->post('alamat_toko'),
			'telephon_toko' => $this->input->post('telephon_toko'),
			'moto_toko' => $this->input->post('moto_toko')
		];
		$data2 = $this->model_toko->get_data_toko();
		$id = $data2->id_toko;
		if ($data2 == null) {
			$insert = $this->model_toko->simpan_data_toko($data);
		} else {
			$insert = $this->model_toko->update_data_toko($data, $id);
		}

		echo json_encode($data);
	}

	public function edit_data_toko()
	{
		$this->load->model('model_toko');
		$data = $this->model_toko->get_data_toko();
		if ($data == null) {
			$data2 = [
				'nama_toko' => 'toko',
				'alamat_toko' => 'alamat',
				'telephon_toko' => '123',
				'moto_toko' => 'moto'
			];
			echo json_encode($data2);
		} else {
			echo json_encode($data);
		}
	}

	public function laba()
	{
		$this->load->view('kasir/laba_view');
	}

	public function get_data_laba()
	{
		$this->load->model('model_laba');
		$list = $this->model_laba->get_data_laba();
		$data = [];
		$no = $_POST['start'];
		$n = 0;
		foreach ($list as $barang) {
			$n++;
			$row = [];
			$row[] = $n;
			$row[] = $barang->nama_barang;
			$row[] = $barang->jumlah;
			$row[] = number_format($barang->total_harga);
			$row[] = number_format($barang->harga_beli);
			$row[] = number_format($barang->total_harga - ($barang->jumlah * $barang->harga_beli));
			$data[] = $row;
		}

		$output = [
			"draw" => $_POST['draw'],
			// "recordsTotal" => $this->model_laba->count_all(),
			// "recordsFiltered" => $this->model_laba->count_filtered(),
			"data" => $data,
		];
		echo json_encode($output);
	}

	public function diagram()
	{
		$min = date('Y-m-') . '01';
		$max = date('Y-m-') . '31';
		$this->db->select('tgl_transaksi');
		$this->db->where('tgl_transaksi >=', $min);
		$this->db->where('tgl_transaksi <=', $max);
		$this->db->select_sum('total_harga');
		$this->db->group_by('tgl_transaksi');
		$query =    $this->db->get('penjualan');
		$data = [];
		foreach ($query->result() as $row) {
			$data[] = $row;
		}
		print json_encode($data);
	}

	public function laba_tabel()
	{
		$this->load->view('kasir/tabel_view');
	}

	public function laba_diagram()
	{
		$this->load->view('super_admin/dashboard_view');
	}

	public function cari_diagram()
	{
		$bulan = $this->input->post('bulan') + 1;
		$tahun = $this->input->post('tahun');
		$tw = 01;
		$th = 31;
		$min = $tahun . '-' . $bulan . '-' . $tw;
		$max = $tahun . '-' . $bulan . '-' . $th;
		$this->db->select('tgl_transaksi');
		$this->db->where('tgl_transaksi >=', $min);
		$this->db->where('tgl_transaksi <=', $max);
		$this->db->select_sum('total_harga');
		$this->db->group_by('tgl_transaksi');
		$query =    $this->db->get('penjualan');
		$data = [];
		foreach ($query->result() as $row) {
			$data[] = $row;
		}
		print json_encode($data);
	}

	public function logout()
	{
		$this->load->model('model_log_activity');
		$id = $this->session->userdata('id');
		$login = $this->session->userdata('login');
		$logout = date("Y-m-m h:i:s");
		$this->model_log_activity->update_logout($id, $login, $logout);
		$this->load->helper('cookie');
		delete_cookie('id');
		$this->session->sess_destroy();
		header('location:http://localhost/penjualan');
	}

	public function pengunjung()
	{
		$this->load->view('admin/pengunjung_view');
	}

	public function akun()
	{
		$this->load->model('model_member');
		$data['judul'] = 'Profil';
		$data['akun'] = $this->model_member->get_profil();
		$this->load->view('profil/profil_view', $data);
	}

	public function edit_profil()
	{
		$this->load->model('model_member');
		$data = $this->model_member->get_profil();
		echo json_encode($data);
	}

	// ========================DATA USER===========================================
	public function data_user()
	{
		$this->load->view('super_admin/data_user_view');
	}

	public function get_data_user()
	{
		$this->load->model('model_member');
		$list = $this->model_member->get_datatables();
		$data = [];
		$no = $_POST['start'];
		$n = 0;
		foreach ($list as $user) {
			$n++;
			$row = [];
			$row[] = $n;
			$row[] = $user->nama;
			$row[] = $user->email;
			$row[] = $user->password;
			$row[] = $user->telephone;
			if ($user->aktif == 1) {
				$row[] = "Aktif";
			} else {
				$row[] = "Blokir";
			}
			if ($this->session->userdata('level') == 2) {
				$row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit User" onclick="edit_user(' . "'" . $user->id . "'" . ')"><i class="far fa-edit"></i></a>
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus User" onclick="delete_user(' . "'" . $user->id . "'" . ')"><i class="far fa-trash-alt"></i></a>';
			} else {
				$row[] = '<a class="btn btn-sm btn-warning disabled" href="javascript:void(0)" title="Edit User" ><i class="far fa-edit"></i></a>
				<a class="btn btn-sm btn-danger disabled" href="javascript:void(0)" title="Hapus User" ><i class="far fa-trash-alt"></i></a>';
			}
			$data[] = $row;
		}
		$output = [
			"draw" => $_POST['draw'],
			// "recordsTotal" => $this->model_member->count_all(),
			// "recordsFiltered" => $this->model_member->count_filtered(),
			"data" => $data,
		];
		echo json_encode($output);
	}

	public function hapus_user($id)
	{
		$this->model_member->delete_by_id_user($id);
		echo json_encode(["status" => TRUE]);
	}

	public function edit_user($id)
	{
		$data = $this->model_member->get_by_id_user($id);
		echo json_encode($data);
	}

	public function update_user()
	{
		$data = [
			'id' 				=> $this->input->post('id'),
			'nama' 				=> $this->input->post('nama'),
			'email' 			=> $this->input->post('email'),
			'password' 			=> $this->input->post('password'),
			'telephone' 		=> $this->input->post('telephone'),
			'aktif' 			=> $this->input->post('aktif'),
			'level' 			=> $this->input->post('level'),
		];
		$this->model_member->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	function simpan_user()
	{
		$this->_validateuser();
		$data = [
			'id' 				=> $this->input->post('id'),
			'nama' 				=> $this->input->post('nama'),
			'email' 			=> $this->input->post('email'),
			'password' 			=> $this->input->post('password'),
			'telephone' 		=> $this->input->post('telephone'),
			'aktif' 			=> $this->input->post('aktif'),
			'level' 			=> $this->input->post('level'),
		];

		$insert = $this->model_member->save($data);
		echo json_encode(array("status" => TRUE));
	}

	private function _validateuser()
	{
		$data = [];
		$data['error_string'] = [];
		$data['inputerror'] = [];
		$data['status'] = TRUE;

		if ($this->input->post('nama') == '') {
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'Nama is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('email') == '') {
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Username is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('password') == '') {
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'Password is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('telephone') == '') {
			$data['inputerror'][] = 'telephone';
			$data['error_string'][] = 'Telepon is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('aktif') == '') {
			$data['inputerror'][] = 'aktif';
			$data['error_string'][] = 'Status is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('level') == '') {
			$data['inputerror'][] = 'level';
			$data['error_string'][] = 'Level is required';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}

	// ========================================================================= 
	public function export()
	{
		// ========================================================================= LOG AKTIVITAS
		$this->load->model('model_log_aktivitas');
		$level = $this->session->userdata('level');
		if ($level === "0") {
			$level1 = "Kasir";
		} else if ($level === "1") {
			$level1 = "Admin";
		} else {
			$level1 = "Superadmin";
		}
		$data_log = [
			'nama' => $this->session->userdata('username'),
			'level' => $level1,
			'aktivitas'	 => "Mengekspor data laporan penjualan ke Excel",
			'waktu' => date("Y-m-m h:i:s")
		];
		$this->model_log_aktivitas->input_log($data_log);
		// ========================================================================= LOG AKTIVITAS
		$barang = $this->input->post('nama_barang');
		$semua_pengguna = $this->model_penjualan->get_data($barang)->result();

		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No')
			->setCellValue('B1', 'Nama')
			->setCellValue('C1', 'Qty')
			->setCellValue('D1', 'Bayar')
			->setCellValue('E1', 'Pihak 1')
			->setCellValue('F1', 'Pihak 2')
			->setCellValue('G1', 'Pihak 3')
			->setCellValue('H1', 'Tanggal Transaksi')
			->setCellValue('I1', 'Waktu');

		$kolom = 2;
		$nomor = 1;
		foreach ($semua_pengguna as $pengguna) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $pengguna->nama_brg)
				->setCellValue('C' . $kolom, $pengguna->jumlah)
				->setCellValue('D' . $kolom, $pengguna->total_harga)
				->setCellValue('E' . $kolom, $pengguna->pihak1)
				->setCellValue('F' . $kolom, $pengguna->pihak2)
				->setCellValue('G' . $kolom, $pengguna->pihak3)
				->setCellValue('H' . $kolom, date('j F Y', strtotime($pengguna->tgl_transaksi)))
				->setCellValue('I' . $kolom, $pengguna->waktu);

			$kolom++;
			$nomor++;

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue("C$kolom", "Total");
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue("D$kolom", "=SUM(D2:D" . ($kolom - 1) . ")");
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Data Laporan Penjualan ' . date('Y-m-d') . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');

		$this->model_penjualan->hapussemua($barang)->result();
	}

	public function cetak_pdf()
	{
		$this->load->model('model_penjualan');
		$pdf = new FPDF('P', 'mm', 'A4');
		$today = new DateTime("today");
		$hariini = $today->format('d/m/Y');
		$pdf->AddPage();

		$pdf->SetFont('Times', 'B', 16);
		$pdf->Image('http://localhost/penjualan/assets/images/koperasi.png', 5, 4, 25);
		$pdf->Image('http://localhost/penjualan/assets/images/logo_inti.png', 178, 9, 25);
		$pdf->Cell(0, 7, 'LAPORAN HASIL PENJUALAN', 0, 1, 'C');
		$pdf->Cell(0, 7, 'KANTIN PUJASERA KOPERASI INTI', 0, 1, 'C');
		$pdf->Cell(0, 7, '_____________________________________________________________________________', 0, 1, 'C');
		$pdf->Ln('9');
		$pdf->SetFont('Times', '', 11);
		$pdf->Cell(25, 0, 'Nomor', 0, 0, 'L');
		$pdf->Cell(100, 0, ': ........................................', 0, 0, 'L');
		$pdf->Cell(25, 0, 'Tanggal', 0, 0, 'L');
		$pdf->Cell(100, 0, ': ' . $hariini, 0, 0, 'L');
		$pdf->Ln('10');
		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(8, 6, 'No', 1, 0, 'C');
		$pdf->Cell(35, 6, 'Nama Kasir', 1, 0, 'C');
		$pdf->Cell(50, 6, 'Nama barang', 1, 0, 'C');
		$pdf->Cell(26, 6, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(30, 6, 'Waktu', 1, 0, 'C');
		$pdf->Cell(35, 6, 'Bayar', 1, 1, 'C');

		$pdf->SetFont('Times', '', 11);
		$barang2 = "1";
		$koperasi = "2";
		$inti = "3";
		$barang1 = $this->model_persenan->get_data_barang($barang2);
		$koperasi = $this->model_persenan->get_data_koperasi($koperasi);
		$inti= $this->model_persenan->get_data_inti($inti);

		$barang = $this->input->post('nama_barang');
		$semua_pengguna = $this->model_penjualan->get_data($barang)->result();
		$this->model_penjualan->hapussemua($barang);

		$no = 1;
		$total = 0;
		$barang3 = $barang1->persenan;
		$koperasi = $koperasi->persenan;
		$inti = $inti->persenan;

		$barang4 = 0;
		$koperasi1 = 0;
		$inti1 = 0;
		foreach ($semua_pengguna as $data) {
			$total += $data->total_harga;
			$barang4 = $total * $barang3 / 100;
			$koperasi1 = $total * $koperasi / 100;
			$inti1 = $total * $inti / 100;
			$pdf->Cell(8, 6, $no, 1, 0);
			$pdf->Cell(35, 6, $data->kasir, 1, 0);
			$pdf->Cell(50, 6, $data->nama_brg, 1, 0);
			$pdf->Cell(26, 6, $data->tgl_transaksi, 1, 0);
			$pdf->Cell(30, 6, $data->waktu, 1, 0);
			$pdf->Cell(35, 6, $data->total_harga, 1, 1);

			$no++;
		}

		$pdf->Cell(149, 6, 'Total :', 1, 0);
		$pdf->Cell(35, 6, $total, 1, 1);
		$pdf->Cell(149, 6, 'barang :', 1, 0);
		$pdf->Cell(35, 6, $barang4, 1, 1);
		$pdf->Cell(149, 6, 'Koperasi :', 1, 0);
		$pdf->Cell(35, 6, $koperasi1, 1, 1);
		// $pdf->Cell(149, 6, 'INTI :', 1, 0);
		// $pdf->Cell(35, 6, $inti1, 1, 1);

		$pdf->Ln('25');
		$pdf->SetFont('Times', '', 11);
		$pdf->Cell(175, 0, 'Bandung, ..........................................', 0, 0, 'R');
		$pdf->Ln('7');
		$pdf->Cell(152, 0, 'Kasir', 0, 0, 'R');
		$pdf->Ln('27');
		$pdf->Cell(175, 0, '(...................................................)', 0, 0, 'R');
		$pdf->Output();
	}
}
