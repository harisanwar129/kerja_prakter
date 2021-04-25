<?php
class Item_m extends CI_Model
{

	var $table = "p_item";

	public function get($id = null)
	{
		$this->db->select('p_item.name, 
			p_item.barcode, 
			kategori.cname as category_name, 
			satuan.uname as unit_uname, 
			p_item.price, 
			p_item.stock, 
			p_item.item_id, 
			p_item.category_id, 
			p_item.unit_id');
		$this->db->from($this->table);
		$this->db->join('kategori', 'p_item.category_id = kategori.category_id');
		$this->db->join('satuan', 'p_item.unit_id = satuan.unit_id');
		if ($id != null) {
			$this->db->where('item_id', $id);
		}
		$this->db->order_by('barcode', 'asc');
		$query = $this->db->get();
		return $query;
	}

	function check_barcode($code, $id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('barcode', $code);
		if ($id != null) {
			$this->db->where('item_id !=', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($data)
	{
		$params = array(
			'name' => $data['name'],
			'barcode' => $data['barcode'],
			'category_id' => $data['category'],
			'unit_id' => $data['unit'],
			'price' => $data['price']
		);
		$this->db->insert($this->table, $params);
	}

	public function edit($data)
	{
		$params = array(
			'name' => $data['name'],
			'barcode' => $data['barcode'],
			'category_id' => $data['category'],
			'unit_id' => $data['unit'],
			'price' => $data['price'],
			'updated' => date('Y-m-d H:i:s')
		);
		$this->db->where('item_id', $data['id']);
		$this->db->update($this->table, $params);
	}

	public function del($id)
	{
		$this->db->where('item_id', $id);
		$this->db->delete($this->table);
	}


	function update_stock_in($data)
	{
		$qty = $data['qty'];
		$id = $data['item_id'];
		$sql = "UPDATE p_item SET stock = stock + '$qty' WHERE item_id = '$id'";
		$this->db->query($sql);
	}

	function update_stock_out($data)
	{
		$qty = $data['qty'];
		$id = $data['item_id'];
		$sql = "UPDATE p_item SET stock = stock - '$qty' WHERE item_id = '$id'";
		$this->db->query($sql);
	}
}
