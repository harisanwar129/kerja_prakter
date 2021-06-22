<?php
class Unit_m extends CI_Model
{

	var $table = "satuan";

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if ($id != null) {
			$this->db->where('unit_id', $id);
		}
		$this->db->order_by('uname', 'asc');
		$query = $this->db->get();
		return $query;
	}
	function check_unit($code, $id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('uname', $code);
		if ($id != null) {
			$this->db->where('unit_id !=', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($data)
	{
		$params = array(
			'uname' => $data['uname']
		);
		$this->db->insert($this->table, $params);
	}

	public function edit($data)
	{
		$params = array(
			'uname' => $data['uname'],
			'updated' => date('Y-m-d H:i:s')
		);
		$this->db->where('unit_id', $data['id']);
		$this->db->update($this->table, $params);
	}

	public function del($id)
	{
		$this->db->where('unit_id', $id);
		$this->db->delete($this->table);
	}
}
