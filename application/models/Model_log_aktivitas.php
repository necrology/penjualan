<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_log_aktivitas extends CI_Model {

  var $table = 'log_aktivitas';
  var $column_order = array(null,null,'nama');
  var $column_search = array('nama');
  var $order = array('id_log' => 'desc');

  function get_datatables()
  {
    $this->_get_datatables_query();
    if($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  private function _get_datatables_query()
  {
    $this->db->from($this->table);
    $i = 0;
    foreach ($this->column_search as $item)
    {
     if($_POST['search']['value'])
     {
      if($i===0)
      {
       $this->db->group_start();
       $this->db->like($item, $_POST['search']['value']);
     }
     else
     {
       $this->db->or_like($item, $_POST['search']['value']);
     }
     if(count($this->column_search) - 1 == $i)
       $this->db->group_end();
   }
   $i++;
 }
 
 if(isset($_POST['order']))
 {
   $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
 } 
 else if(isset($this->order))
 {
   $order = $this->order;
   $this->db->order_by(key($order), $order[key($order)]);
 }
}

public function input_log($data_log)
{
  return $this->db->insert('log_aktivitas',$data_log);
}

public function update_logout($id, $login, $logout){
  $hasil = $this->db->query("UPDATE log_activity set logout='$logout' where id_user='$id' and login='$login'");
	return $hasil;
}

}
?>