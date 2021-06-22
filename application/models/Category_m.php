<?php
class Category_m extends CI_Model
{

	var $table = "kategori";

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if ($id != null) {
			$this->db->where('category_id', $id);
		}
		$this->db->order_by('cname', 'asc');
		$query = $this->db->get();
		return $query;
	}

	function check_category($code, $id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('cname', $code);
		if ($id != null) {
			$this->db->where('category_id !=', $id);
		}
		$query = $this->db->get();
		return $query;
	}


	public function add($data)
	{
		$params = array(
			'cname' => $data['cname']
		);
		$this->db->insert($this->table, $params);
	}

	public function edit($data)
	{
		$params = array(
			'cname' => $data['cname'],
			'updated' => date('Y-m-d H:i:s')
		);
		$this->db->where('category_id', $data['id']);
		$this->db->update($this->table, $params);
	}

	public function del($id)
	{
		$this->db->where('category_id', $id);
		$this->db->delete($this->table);
	}
}
