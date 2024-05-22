<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_persenan extends CI_Model
{

  var $table = 'persenan';
  var $column_order = array(null, null, 'pihak');
  var $column_search = array('pihak');
  var $order = array('id' => 'desc');

  function get_datatables()
  {
    $this->_get_datatables_query();
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  private function _get_datatables_query()
  {
    $this->db->from($this->table);
    $i = 0;
    foreach ($this->column_search as $item) {
      if ($_POST['search']['value']) {
        if ($i === 0) {
          $this->db->group_start();
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }
        if (count($this->column_search) - 1 == $i)
          $this->db->group_end();
      }
      $i++;
    }

    if (isset($_POST['order'])) {
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  public function get_by_id_persenan($id)
  {
    $this->db->from($this->table);
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_data_barang($barang)
	{
		$this->db->select($this->table);
    $this->db->from('persenan');
		$this->db->where('id', $barang);
		$query = $this->db->get();
    return $query->row();
	}

  public function get_data_koperasi($koperasi)
	{
		$this->db->select($this->table);
    $this->db->from('persenan');
		$this->db->where('id', $koperasi);
		$query = $this->db->get();
    return $query->row();
	}

  public function get_data_inti($inti)
	{
		$this->db->select($this->table);
    $this->db->from('persenan');
		$this->db->where('id', $inti);
		$query = $this->db->get();
    return $query->row();
	}

  public function update($where, $data)
  {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }
}
