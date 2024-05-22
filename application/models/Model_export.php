<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_export extends CI_Model {  
	public function view(){    
        return $this->db->get('penjualan')->result(); // Tampilkan semua data yang ada di tabel siswa  
    }
}